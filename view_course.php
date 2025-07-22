<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

include 'db.php';
// Handle delete
if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    mysqli_query($conn, "DELETE FROM courses WHERE id = $id");
    header("Location: view_course.php");
    exit();
}
$result = mysqli_query($conn, "SELECT * FROM courses ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Courses</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .admin-container {
            display: flex;
            min-height: 100vh;
            font-family: Arial, sans-serif;
        }
        .sidebar {
            width: 220px;
            background-color: #333;
            color: #fff;
            padding: 20px;
        }
        .sidebar h2 {
            text-align: center;
            border-bottom: 1px solid #555;
            padding-bottom: 10px;
        }
        .sidebar a {
            display: block;
            margin: 15px 0;
            padding: 10px;
            background-color: #444;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }
        .sidebar a:hover {
            background-color: #575757;
        }
        .main-content {
            flex: 1;
            padding: 40px;
            background-color: #f8f9fa;
        }
        table img {
            border-radius: 4px;
        }
        .action-links a {
            margin: 0 5px;
            text-decoration: none;
        }
        .btn-edit {
            color: #0d6efd;
        }
        .btn-delete {
            color: red;
        }
    </style>
</head>
<body>

<div class="admin-container">
    <?php include('sidebar.php'); ?>

    <div class="main-content">
        <h2 class="mb-4">📖 All Courses</h2>
        <div class="table-responsive bg-white p-3 rounded shadow-sm">
            <table class="table table-bordered align-middle">
                <thead class="table-dark text-center">
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Duration</th>
                        <th>Requirement</th>
                        <th>Fee (₹)</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php while($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?= $row['id']; ?></td>
                        <td><?= $row['title']; ?></td>
                        <td><?= $row['description']; ?></td>
                        <td><?= $row['duration']; ?></td>
                        <td><?= $row['requirement']; ?></td>
                        <td><?= $row['fee']; ?></td>
                        <td>
                            <?php if (!empty($row['image'])): ?>
                                <img src="<?= $row['image']; ?>" width="80" height="50" alt="Course Image">
                            <?php else: ?>
                                N/A
                            <?php endif; ?>
                        </td>
                         <td class="action-links">
                            <a href="add_course.php?edit_id=<?= $row['id'] ?>" class="btn-edit">✏️ Edit</a>
                            <a href="view_course.php?delete_id=<?= $row['id'] ?>" class="btn-delete" onclick="return confirm('Are you sure you want to delete this course?')">🗑️ Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>

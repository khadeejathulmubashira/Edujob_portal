<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

include 'db.php';

$result = mysqli_query($conn, "SELECT * FROM jobs ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View jobs</title>
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
            background-color: #f9f9f9;
        }
        .table-box {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 8px rgba(0,0,0,0.1);
        }
        img.thumb {
            border-radius: 5px;
            max-height: 50px;
        }
    </style>
</head>
<body>

<div class="admin-container">
    <?php include('sidebar.php'); ?>

    <div class="main-content">
        <h2 class="mb-4">📖 View All Jobs</h2>
        <div class="table-box">
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
                                <img src="<?= $row['image']; ?>" width="80" height="50" alt="Job Image">
                            <?php else: ?>
                                N/A
                            <?php endif; ?>
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

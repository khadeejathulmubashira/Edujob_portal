<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}
include 'db.php';

$msg = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $duration = mysqli_real_escape_string($conn, $_POST['duration']);
    $requirement = mysqli_real_escape_string($conn, $_POST['requirement']);
    $fee = mysqli_real_escape_string($conn, $_POST['fee']);

    // Handle image upload
    $image_name = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $image_path = 'images' . time() . '_' . basename($image_name);

    if (move_uploaded_file($image_tmp, $image_path)) {
        $sql = "INSERT INTO courses (title, description, duration, requirement, fee, image)
                VALUES ('$title', '$description', '$duration', '$requirement', '$fee', '$image_path')";

        if (mysqli_query($conn, $sql)) {
            $msg = "<div class='alert alert-success'>✅ Course added successfully!</div>";
        } else {
            $msg = "<div class='alert alert-danger'>❌ Error: " . mysqli_error($conn) . "</div>";
        }
    } else {
        $msg = "<div class='alert alert-warning'>⚠️ Image upload failed.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add Course</title>
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
    .form-box {
        background-color: white;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 0 8px rgba(0,0,0,0.1);
    }
  </style>
</head>
<body>

<div class="admin-container">
    <?php include('sidebar.php'); ?>

    <div class="main-content">
        <h2>📚 Add New Course</h2>
        <?= $msg; ?>

        <div class="form-box">
            <form method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label">Course Title</label>
                    <input type="text" name="title" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="3" required></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Duration</label>
                    <input type="text" name="duration" class="form-control" placeholder="e.g. 3 months" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Requirement</label>
                    <textarea name="requirement" class="form-control" rows="2" required></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Fee (₹)</label>
                    <input type="number" name="fee" class="form-control" step="0.01" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Course Image</label>
                    <input type="file" name="image" class="form-control" accept="image/*" required>
                </div>

                <button type="submit" class="btn btn-success">✅ Add Course</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>

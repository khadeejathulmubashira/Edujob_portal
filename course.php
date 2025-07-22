<?php
include 'db.php';
include 'header.php';

$result = mysqli_query($conn, "SELECT * FROM courses ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Courses</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: #f5f5f5;
      font-family: 'Segoe UI', sans-serif;
    }
    .course-card {
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      border: none;
      transition: transform 0.3s ease;
    }
    .course-card:hover {
      transform: translateY(-5px);
    }
    .course-img {
      height: 200px;
      object-fit: cover;
    }
    .btn-apply {
      background-color: #007bff;
      color: #fff;
    }
    .btn-apply:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>

<div class="container py-5">
  <h2 class="text-center mb-4">📚 Explore Our Courses</h2>
  <div class="row">
    <?php while($row = mysqli_fetch_assoc($result)) { ?>
      <div class="col-md-4 mb-4">
        <div class="card course-card">
          <img src="<?= $row['image']; ?>" class="card-img-top course-img" alt="<?= $row['title']; ?>">
          <div class="card-body">
            <h5 class="card-title"><?= htmlspecialchars($row['title']); ?></h5>
            <p class="card-text">
              <strong>Description:</strong> <?= htmlspecialchars($row['description']); ?><br>
              <strong>Duration:</strong> <?= htmlspecialchars($row['duration']); ?><br>
              <strong>Fee:</strong> ₹<?= htmlspecialchars($row['fee']); ?>
            </p>
            <a href="apply.php?type=course&for=<?= urlencode($row['title']) ?>" class="btn btn-primary btn-sm">Apply Now</a>

          </div>
        </div>
      </div>
    <?php } ?>
    <?php if (mysqli_num_rows($result) == 0): ?>
      <div class="col-12 text-center text-muted">No courses available at the moment.</div>
    <?php endif; ?>
  </div>
</div>

</body>
</html>

<?php
include 'db.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';

$type = $_GET['type'] ?? '';
$applyFor = $_GET['for'] ?? '';

if (!$type || !$applyFor) {
    die("Invalid application link.");
}

$msg = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name   = $_POST['name'];
    $email  = $_POST['email'];
    $phone  = $_POST['phone'];
    $token  = bin2hex(random_bytes(8));
    $status = "pending";
    date_default_timezone_set('Asia/Kolkata');
    $created_at = date("Y-m-d H:i:s");

    $stmt = $conn->prepare("INSERT INTO applications (name, email, phone, course_or_job, type, token, status, created_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssss", $name, $email, $phone, $applyFor, $type, $token, $status, $created_at);

    if ($stmt->execute()) {
        // Email using PHPMailer
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'workmubi951@gmail.com';       // ✅ Replace with your Gmail
            $mail->Password   = 'ywztqihgjohcrpxu';          // ✅ Replace with App Password
            $mail->SMTPSecure = 'tls';
            $mail->Port       = 587;

            $mail->setFrom('workmubi951@gmail.com', ' Jasons Eduport'); // ✅ Replace
            $mail->addAddress($email, $name);
            $mail->isHTML(true);

            $mail->Subject = "Application Received - $applyFor ($type)";
            $mail->Body = "
                <p>Dear <strong>$name</strong>,</p>

                <p>Thank you for applying for the <strong>$type</strong> opportunity titled <strong>$applyFor</strong>.</p>

                <p>We have successfully received your application. Our team is currently reviewing all submissions. If your profile aligns with the opportunity, we will contact you for the next steps.</p>

                <p><strong>Please note:</strong> You will receive a selection or rejection email based on our review. This process may take a few days.</p>

                <p>We appreciate your interest and wish you all the best!</p>

                <br>
                Warm regards,<br>
                <strong>EduJob Portal Team</strong><br>
                <i>Your future starts here.</i>
            ";

            $mail->send();
            $msg = "<div class='alert alert-success text-center'>Application submitted successfully for <strong>$applyFor</strong>. A confirmation email has been sent to <strong>$email</strong>.</div>";
        } catch (Exception $e) {
            $msg = "<div class='alert alert-warning text-center'>Application submitted, but email could not be sent. Error: {$mail->ErrorInfo}</div>";
        }
    } else {
        $msg = "<div class='alert alert-danger'>Failed to apply. Try again.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Apply for <?= htmlspecialchars($applyFor) ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-md-7">
        <div class="card shadow p-4">
          <h2 class="text-center text-primary mb-4">Apply for <?= htmlspecialchars($applyFor) ?> (<?= ucfirst($type) ?>)</h2>

          <?= $msg ?>

          <form method="POST">
            <div class="mb-3">
              <label class="form-label">Full Name</label>
              <input type="text" name="name" class="form-control" required>
            </div>

            <div class="mb-3">
              <label class="form-label">Email Address</label>
              <input type="email" name="email" class="form-control" required>
            </div>

            <div class="mb-3">
              <label class="form-label">Phone Number</label>
              <input type="text" name="phone" class="form-control" required pattern="[0-9]{10}" title="Enter a 10-digit phone number">
            </div>

            <button type="submit" class="btn btn-success w-100">Submit Application</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>

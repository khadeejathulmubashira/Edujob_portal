<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}
include('db.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';

$msg = "";

// Handle select/reject action
if (isset($_GET['action']) && isset($_GET['id'])) {
    $id = $_GET['id'];
    $status = $_GET['action'] === 'select' ? 'Selected' : 'Rejected';

    $res = mysqli_query($conn, "SELECT * FROM applications WHERE id = $id");
    $data = mysqli_fetch_assoc($res);

    if ($data) {
        mysqli_query($conn, "UPDATE applications SET status='$status' WHERE id=$id");

        // Send email
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'workmubi951@gmail.com'; // Replace
            $mail->Password = 'ywztqihgjohcrpxu';     // Replace
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            $mail->setFrom('workmubi951@gmail.com', 'EduJob Portal');
            $mail->addAddress($data['email'], $data['name']);
            $mail->isHTML(true);

            $mail->Subject = 'Application ' . $status;
            $mail->Body = $status === 'Selected'
    ? "<p>Dear <b>{$data['name']}</b>,<br><br> 
        We are pleased to inform you that you have been <b>selected</b> for the <b>{$data['type']}</b> position titled <b>{$data['course_or_job']}</b>.<br><br>
        After carefully reviewing your application, we found that your skills, background, and enthusiasm align well with our expectations and requirements. We believe you will be a valuable addition to our community.<br><br>
        Further details and next steps will be shared with you shortly. Please keep an eye on your inbox for future communications.<br><br>
        Congratulations once again, and we look forward to having you onboard!<br><br>
        Warm regards,<br><i>Institution Team</i></p>"
    : "<p>Dear <b>{$data['name']}</b>,<br><br>
        Thank you for your interest in the <b>{$data['type']}</b> opportunity titled <b>{$data['course_or_job']}</b>.<br><br>
        After thorough consideration of your application, we regret to inform you that you have not been selected at this time.<br><br>
        Please know that this decision does not reflect negatively on your qualifications. We received many excellent applications, and the selection process was highly competitive.<br><br>
        We truly appreciate the time and effort you invested in applying and encourage you to apply again for future opportunities.<br><br>
        Wishing you the very best in your future endeavors.<br><br>
        Sincerely,<br><i>Institution Team</i></p>";

            $mail->send();
            $msg = "<div class='alert alert-success'>Status updated and email sent!</div>";
        } catch (Exception $e) {
            $msg = "<div class='alert alert-danger'>Email error: {$mail->ErrorInfo}</div>";
        }
    }
}

$result = mysqli_query($conn, "SELECT * FROM applications ORDER BY id DESC");
?>

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
table {
    width: 100%;
    border-collapse: collapse;
    background-color: #fff;
    margin-top: 20px;
}
th, td {
    padding: 12px;
    border: 1px solid #ddd;
    text-align: left;
}
th {
    background-color: #f0f0f0;
}
.status-badge {
    padding: 4px 10px;
    border-radius: 6px;
    color: white;
    font-size: 13px;
}
.status-selected { background-color: #28a745; }
.status-rejected { background-color: #dc3545; }
.status-pending  { background-color: #6c757d; }
.action-buttons a {
    margin-right: 8px;
    padding: 6px 12px;
    text-decoration: none;
    color: white;
    border-radius: 4px;
}
.select-btn { background-color: #28a745; }
.reject-btn { background-color: #dc3545; }
</style>

<div class="admin-container">
    <?php include('sidebar.php'); ?>

    <div class="main-content">
        <h2>📝 Manage Applications</h2>
        <?= $msg; ?>

        <?php if (mysqli_num_rows($result) > 0): ?>
            <table>
                <tr>
                    <th>S.No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Course/Job</th>
                    <th>Type</th>
                    <th>Status</th>
                    <th>Applied On</th>
                    <th>Action</th>
                </tr>
                <?php $i = 1; while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td><?= htmlspecialchars($row['name']) ?></td>
                        <td><?= htmlspecialchars($row['email']) ?></td>
                        <td><?= htmlspecialchars($row['phone']) ?></td>
                        <td><?= htmlspecialchars($row['course_or_job']) ?></td>
                        <td><?= ucfirst($row['type']) ?></td>
                        <td>
                            <span class="status-badge status-<?= strtolower($row['status']) ?>">
                                <?= $row['status'] ?>
                            </span>
                        </td>
                        <td><?= date('d M Y, h:i A', strtotime($row['created_at'])) ?></td>
                        <td class="action-buttons">
                            <?php if ($row['status'] === 'pending'): ?>
                                <a href="?action=select&id=<?= $row['id'] ?>" class="select-btn">✅ Select</a>
                                <a href="?action=reject&id=<?= $row['id'] ?>" class="reject-btn">❌ Reject</a>
                            <?php else: ?>
                                -
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </table>
        <?php else: ?>
            <p>No applications yet.</p>
        <?php endif; ?>
    </div>
</div>

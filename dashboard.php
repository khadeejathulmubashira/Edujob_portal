

<?php 
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}
?>



<style>
/* Layout */
.admin-container {
    display: flex;
    min-height: 100vh;
    font-family: Arial, sans-serif;
}

/* Sidebar */
.sidebar {
    width: 220px;
    background-color: #333;
    color: #fff;
    padding: 20px;
    box-sizing: border-box;
}

.sidebar h2 {
    font-size: 20px;
    margin-bottom: 30px;
    text-align: center;
    border-bottom: 1px solid #555;
    padding-bottom: 10px;
}

.sidebar a {
    display: block;
    color: #fff;
    text-decoration: none;
    margin: 15px 0;
    padding: 10px;
    background-color: #444;
    border-radius: 4px;
    transition: background 0.3s;
}

.sidebar a:hover {
    background-color: #575757;
}

/* Main Content */
.main-content {
    flex: 1;
    padding: 40px;
    background-color: #f4f4f4;
}
</style>

<div class="admin-container">
    <!-- Sidebar -->
<?php include('sidebar.php'); ?>

    <!-- Main Content -->
    <div class="main-content">
        <h1>Welcome, Admin!</h1>
        <p>Select an option from the left menu to manage the salon system.</p>
    </div>
</div>

<?php include('footer.php'); ?>

<?php
session_start();
// Check if the session variable is set and get its value
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    // The user is logged in, retrieve the username or any other session variable
    $username = $_SESSION['email'];
    //echo "Welcome, $username!";
} else {
    // Redirect to the login page or handle unauthenticated access
    header("Location: adminLogin.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/adminStyles.css">
    <title>admil panel</title>
</head>
<body>
        <div id="admi-panel" class="admin-panel">
            <div>
                <h2 style="text-align: right; color: black">Logged in as:
                <?php echo $username?> 
            </h2>
            </div>
            <div class="header">
                  <h1>Admin Panel</h1>
                </div>
                <div class="main">
                  <h2>Welcome to MOD-AGRI's Admins Panel</h2>
                </div>
                <div class="row">
                  <div class="menu">
            <ul>
                <li><a href="subs.php">View All Subscribers</a></li>
                <li><a href="addAdmin.php" >Add new Admin</a></li>
                <li><a href="admins.php">View Admins List</a></li>
                <li><a href="messages.php">View Users Messages</a></li>
            </ul>
                  </div>
                </div>
            <div class="logout">
                <form action="logoutUser.php">
                    <button type="submit" name="logout">Logout</button>
                </form>
            </div>
        </div>
</body>
</html>
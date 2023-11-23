<?php

//if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['addAdmin'])){
    //include 'dbconnect.php'; // Include the database connection file
    $fullNames = $_POST["fullNames"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm-password"];

    // dbconnect.php - Create a database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "ict_in_agriculture"; // Change this to your database name
$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
    die("Error: " . mysqli_connect_error());
}

$showAlert = false;
$showError = false;
$exists = false;

    // Check if the username already exists
    $sql = "SELECT * FROM system_sers WHERE email='$email'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);

    if ($num == 0) {
        if ($password == $confirm_password) {
            // Hash the password before storing it
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO admins (full_names,email, password) VALUES ('$fullNames','$email', '$hash')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $showAlert = true;
            }
        } else {
            $showError = "Passwords Mismatches!!!";
        }
    } else {
        $exists = "User Already Exists!!!";
    }
}
else{
    $showError = "Connection failled!!!";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
    <?php
    if ($showAlert) {
        echo '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Admin added Successfully!.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>';
    }
    if ($showError) {
        echo '
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> ' . $showError . '
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>';
    }
    ?>
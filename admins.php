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
<html>
<head>
    <title>all subscribers</title>
    <style>
        /* CSS for styling */
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            margin: 5px 10px;
            margin-top: 0;
            position: relative;
        }
        
        #Header{
            text-align: center;
            position: fixed;
            top: 2px;
            margin-bottom: 30px;
            z-index: 222;
            background-color: #3498db;
            width: 99%;
            height: 50px;
            border-radius: 5px;
            padding: 5px 5px;
        }
        #Header:hover{
            cursor: pointer;
            opacity: 0.8;
        }
       #separator{
        margin: 100px 50px; 
       }
       table {
            border-collapse: collapse;
            width: 90%;
            margin: 20px auto;
            border: 1.5px solid;
            border-radius: 10px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
            border: 1.5px solid;
            font-size: large;
        }
        th {
            background-color: #f2f2f2;
            font-weight: bolder;
            font-size: larger;
            text-align: center;
        }
        tr:nth-child(odd){
            background-color: whitesmoke;
        }
        .panel{
            font-size: xx-large;
            text-align: center;
            margin: 50px;
        }
        .panel a{
            font-size: xx-large;
            text-decoration: none;
            color: green;
        }

    </style>
</head>
<body>

    <h1 id="Header">MOD_AGRI's All Admins</h1>
    <div id="separator"></div>
    <table>
        <tr>
            <th>Full Names</th>
            <th>Emails</th>
            <th>Registratin Dates</th>
        </tr>

        <?php
        // Database connection
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "ict_in_agriculture";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Fetch users from the database
        $sql = "SELECT * FROM admins"; // Replace 'users' with your table name
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row['full_names'] . '</td>';
                echo '<td>' . $row['email'] . '</td>';
                echo '<td>' . $row['registration_date'] . '</td>';
                echo '</tr>';
            }
        } else {
            echo '<tr><td colspan="4">No admins found</td></tr>';
        }

        $conn->close();
        ?>
    </table>
    <div class="panel">Go back to <a href="adminPanel.php">Panel</a></div>

</body>
</html>

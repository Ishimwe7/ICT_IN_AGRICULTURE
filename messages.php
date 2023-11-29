<!DOCTYPE html>
<html>
<head>
    <title>User Messages</title>
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
        .message-container {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 10px;
        }
        .sender {
            font-weight: bold;
            font-size: xx-large;
            color: #3498db;
        }
        .timestamp {
            color: #999;
            font-size: 18px;
        }
        .message {
            margin-top: 5px;
        }
        .real-message{
            font-size: larger;
            font-weight: bold;
        }
        #Header{
            text-align: center;
            position: fixed;
            top: 0;
            margin-bottom: 30px;
            z-index: 222;
            background-color: #3498db;
            width: 99%;
            height: 50px;
            border-radius: 5px;
            padding: 5px 5px;
            display: flex;
            padding-left: 480px;
            gap:300px;
        }
       #separator{
        margin: 100px 50px; 
       }

       #Header a{
        text-decoration: none;
        color: green;
       }

    </style>
</head>
<body>

    <h1 id="Header">User Sent Messages    <a href="adminPanel.php"> Go Back</a></h1>
    <div id="separator"></div>
    <div class="message-list">
        <?php
        // Database connection
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "ict_in_agriculture";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Retrieve messages from the database
        $sql = "SELECT * FROM user_messages ORDER BY sent_date DESC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo '<div class="message-container">';
                echo '<span class="sender">' . $row["lname"] . '</span>';
                echo '<span class="sender">' . "  " . '</span>';
                echo '<span class="sender">' . $row["fname"] . '</span>';
                echo '<span class="sender">' . "  " . '</span>';
                echo '<span class="timestamp">' . $row["sent_date"] . '</span>';
                echo '<div class="message">' ."Email: ". $row["email"] . '</div>';
                echo '<div class="message">' ."Province: ". $row["province"] . '</div>';
                echo '<div class="message">' ."District: ". $row["district"] . '</div>';
                echo '<div class="message">' ."Address: ". $row["address"] . '</div>';
                echo '<div class="message">' ."Specialization: ". $row["specialization"] . '</div>';
                echo '<div class="real-message">' ."Message/Query:  ".$row["message"] . '</div>';
                echo '</div>';
            }
        } else {
            echo "0 results";
        }

        $conn->close();
        ?>
    </div>

</body>
</html>

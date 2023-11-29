<!DOCTYPE html>
<html>
<head>
    <title>User Messages</title>
    <style>
        /* CSS for styling */
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .message-container {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 10px;
        }
        .sender {
            font-weight: bold;
            color: #3498db;
        }
        .timestamp {
            color: #999;
            font-size: 12px;
        }
        .message {
            margin-top: 5px;
        }
    </style>
</head>
<body>

    <h1>User Messages</h1>

    <div class="message-list">
        <?php
        // Database connection
        $servername = "localhost";
        $username = "your_username";
        $password = "your_password";
        $dbname = "your_database";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Retrieve messages from the database
        $sql = "SELECT * FROM messages ORDER BY timestamp DESC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo '<div class="message-container">';
                echo '<span class="sender">' . $row["sender"] . '</span>';
                echo '<span class="timestamp">' . $row["timestamp"] . '</span>';
                echo '<div class="message">' . $row["message"] . '</div>';
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

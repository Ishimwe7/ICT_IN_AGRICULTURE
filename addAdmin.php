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

$servername = "localhost";
$username = "root";
$password = "";
$database = "ict_in_agriculture";
$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
    die("Error: " . mysqli_connect_error());
} 
if(isset($_POST["addAdmin"])){
if(!isset($_POST['fullNames'],$_POST['email'],$_POST['password'],$_POST['confirm-password'])){
   /* echo $_POST['password'];
    echo $_POST['fname'];
    echo  $_POST['lname'];
    echo  $_POST['email'];
    echo  $_POST['address'];
    echo $_POST['province'];
    echo $_POST['district'];
    echo $_POST['specialization'];
    echo $_POST['confirm-password']; */
    $message='Empty filed(s)';
    exit();
} 
if(empty($_POST['fullNames']) ||empty($_POST['email'])||empty($_POST['password'])||empty($_POST['confirm-password'])){
    $message='There is Empty Value(s)';
    exit();
} 
if($stmt = $conn->prepare('select email from admins where email=?')){
   $stmt->bind_param('s',$_POST['email']);
   $stmt->execute();
   $stmt->store_result();
   if($stmt->num_rows>0){
    //echo 'User Already Exists!';
   // $message='User Already Exists!';
    header("Location: adminExist.php");
   }
   else{
       if($stmt = $conn->prepare('INSERT INTO admins(full_names,email, password) values(?,?,?)')) {
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $stmt->bind_param('sss',$_POST['fullNames'],$_POST['email'],$password);
        $stmt->execute();
        $message='Successfully Registered!!';
        //echo "alert('Form submitted successfully!');";
        //echo 'Successfully Registered!!';
        header("Location: welcomeAdmin.php");
       }
       else{
        $message='An expected Error occurred!';
        //echo 'An expected Error occurred!';
        header("Location: addAdminError.php");
       }
    } 
    $stmt->close();
   }
   else{
    $message='An Error Occurred!';
    //echo 'An Error Occurred!';
    header("Location: addAdminError.php");
   }
   $conn->close();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add admin</title>
    <link rel="stylesheet" href="CSS/signingStyles.css">
</head>
<body>
<div class="whole-page">
    <div id="logo">
        <div class="logo">
                 <img style="width: 70px;height:50px" src="pictures/logo.jpeg" alt="logo image">
                </div>
                <div class="log-text">
                  <h2>MOD-AGRI</h2>
              </div>
    </div>
    <div class="sign-home">
        <div class="signUp">
            <h1 id="heading1">Add New Admin here!</h1>
            <div>
                <form action="" method="POST">
                    <div class="row">
                        <label for="fullNames">Full Names:</label>
                        <input required type="text" id="fullNames" placeholder="Enter full names here..." name="fullNames">
                        <label class="required">*</label>
                        <label id="fname-required"></label>
                        <br>
                    </div>
                    <div class="row">
                        <label for="email">Email:</label>
                        <input type="email" id="email" required placeholder="Enter email here..." name="email">
                        <label class="required">*</label>
                        <label id="email-required"></label>
                         <br>
                    </div>
                 
                    <div class="row">
                        <label for="password">Password:</label>
                        <input type="password" minlength="8" maxlength="10" id="password" placeholder="Password(Between 8 and 10 chars)..." name="password">
                        <label class="required">*</label>
                        <label id="pass-required"></label>
                    </div>
                    <div class="row">
                        <label for="confirm-password">Confirm Password:</label>
                        <input type="password" minlength="8" maxlength="10" id="confirm-password" placeholder="Confirm your password..." name="confirm-password">
                        <label class="required">*</label>
                        <label id="mismatches"></label>
                    </div>
                    <div class="buttons">
                        <button id="submitButton" name="addAdmin" type="submit">Submit</button>
                        <button id="resetButton" type="reset">Clear</button>
                    </div>
                </form>
            </div>
        </div>
    <div class="home">
          <h3 style="font-size: x-large;"> Already have an account? <a href="adminLogin.php">Login here!</a><br><br>
            Go Back to
            <a href="adminPanel.php">admin panel</a>
          </h3>
        </div>
</div>
</div>
        <script src="JavaScript/signUp.js">
            //console.log("Hello",document.getElementById("province"));
        </script>
</body>
</html>
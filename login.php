<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "ict_in_agriculture";
$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
    die("Error: " . mysqli_connect_error());
} 
if(isset($_POST["login"])){
if(!isset($_POST['email'],$_POST['password'])){
    exit('Empty filed(s)');
} 
if(empty($_POST['email'])||empty($_POST['password'])){
    exit('There is Empty Value(s)');
} 
if($stmt = $conn->prepare('select email from system_sers where email=?')){
   $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
   $stmt->bind_param('s',$_POST['email']);
   $stmt->execute();
   $stmt->store_result();
   if($stmt->num_rows>0){
    //echo 'Welcome!';
    header("Location: index.php");
   }
   else{
    header("Location: invalidUserLogin.php");
    //echo 'Invalid Login';
   }
}else{
    echo 'An error occurred!';
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>log in</title>
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
      <div class="log-home">
        <div class="login">
            <div style="margin-top:50px"></div>
            <h1 id="heading1">Please Login here!</h1>
            <div>
                <form action="" method="post">
                    <div class="row">
                        <label for="email">Email:</label>
                        <input type="email" id="email" required placeholder="Enter your email..." name="email">
                        <label class="required">*</label>
                         <br>
                    </div>
                    <div class="row">
                        <label for="email">Password:</label>
                        <input type="password" id="password" required placeholder="Enter your password here..." name="password">
                        <label class="required">*</label>
                         <br>
                    </div>
                    <div class="buttons">
                        <button id="login" name="login">Login</button>
                    </div>
                </form>
            </div>
        </div>
    <div class="home">
          <h3 style="font-size: x-large;">Don't have an account? <a href="signUp.php">SignUp here!</a><br><br>
            
            Go Back
            <a href="index.php">home</a>
          </h3>
        </div>
        </div>
     </div>
        <script src="JavaScript/signUp.js">
            //console.log("Hello",document.getElementById("province"));
        </script>
</body>
</html>
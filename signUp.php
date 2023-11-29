<?php
$servername = "localhost";
$username = "root";
$password = "";
$message="Registration failled !!";
$database = "ict_in_agriculture";
$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
    die("Error: " . mysqli_connect_error());
} 
if(isset($_POST["Register"])){
if(!isset($_POST['fname'],$_POST['lname'],$_POST['email'],$_POST['province'],$_POST['district'],$_POST['address'],$_POST['specialization'],$_POST['password'],$_POST['confirm-password'])){
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
if(empty($_POST['fname']) || empty($_POST['lname'])||empty($_POST['email'])||empty($_POST['province'])||empty($_POST['district'])||empty($_POST['address'])||empty($_POST['specialization'])||empty($_POST['password'])||empty($_POST['confirm-password'])){
    $message='There is Empty Value(s)';
    exit();
} 
if($stmt = $conn->prepare('select email from system_sers where email=?')){
   $stmt->bind_param('s',$_POST['email']);
   $stmt->execute();
   $stmt->store_result();
   if($stmt->num_rows>0){
    //echo 'User Already Exists!';
   // $message='User Already Exists!';
    header("Location: userExist.php");
   }
   else{
       if($stmt = $conn->prepare('INSERT INTO system_sers(fname, lname, email, province, district, address, specialization, password) values(?,?,?,?,?,?,?,?)')) {
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $stmt->bind_param('ssssssss',$_POST['fname'],$_POST['lname'],$_POST['email'],$_POST['province'],$_POST['district'],$_POST['address'],$_POST['specialization'],$password);
        $stmt->execute();
        $message='Successfully Registered!!';
        //echo "alert('Form submitted successfully!');";
        //echo 'Successfully Registered!!';
        header("Location: welcome.php");
       }
       else{
        $message='An expected Error occurred!';
        //echo 'An expected Error occurred!';
        header("Location: error.php");
       }
    } 
    $stmt->close();
   }
   else{
    $message='An Error Occurred!';
    //echo 'An Error Occurred!';
    header("Location: error.php");
   }
   $conn->close();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
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
            <h1 id="heading1">Please sign Up here!</h1>
            <div>
                <form action="" method="POST">
                    <div class="row">
                        <label for="fname">First Name:</label>
                        <input required type="text" id="fname" placeholder="Enter your first name..." name="fname">
                        <label class="required">*</label>
                        <label id="fname-required"></label>
                        <br>
                    </div>
                    <div class="row">
                        <label for="lname">Last Name:</label>
                        <input required type="text" id="lname" placeholder="Enter your last name..." name="lname">
                        <label class="required">*</label>
                        <label id="lname-required"></label>
                        <br>
                    </div>
                    <div class="row">
                        <label for="email">Email:</label>
                        <input type="email" id="email" required placeholder="Enter your email..." name="email">
                        <label class="required">*</label>
                        <label id="email-required"></label>
                         <br>
                    </div>
                    <div class="special-row">
                        <label id="special-row" for="province">Province:</label>
                      <!--  <select name="province" id="province">
                            <option value="east" id="east">East</option>
                            <option value="west" id="west">West</option>
                            <option value="north" id="north">North</option>
                            <option value="south" id="south">South</option>
                            <option value="kigali" id="kigali">Kigali City</option>
                        </select> -->
                        <input type="radio" id="east" checked value="East" name="province">
                        <label for="east">East</label>
                        <input type="radio" id="west" value="West" name="province">
                        <label for="west">West</label>
                        <input type="radio" id="north" value="North" name="province">
                        <label for="north">North</label>
                        <input type="radio" id="south" value="South" name="province">
                        <label for="south">South</label>
                        <input type="radio" id="kigali" value="Kigali City" name="province">
                        <label for="kigali">Kigali City</label>
                    </div>
                    <div class="row">
                        <label for="district">District:</label>
                        <select name="district" id="district">
                        <label class="required">*</label>
                            <option name="district" id="dis1">Bugesera</option>
                            <option name="district" id="dis2">Gatsibo</option>
                            <option name="district" id="dis3">Kayonza</option>
                            <option name="district" id="dis4">Kirehe</option>
                            <option name="district" id="dis5">Ngoma</option>
                            <option name="district" id="dis6">Nyagatare</option>
                            <option name="district" id="dis7">Rwamagana</option>
                            <option name="district" id="dis8"></option>
                        </select>
                    </div>
                    <div class="row">
                        <label for="address">Address:</label>
                        <input type="text" id="address" placeholder="Enter your address..." name="address">
                        <label class="required">*</label>
                        <label id="address-required"></label>
                    </div>
                    <div class="row">
                        <label for="specialization">Specialization:</label>
                        <select name="specialization" id="specialization">
                            <option name="specialization" value="aquaculture">Aquaculture</option>
                            <option name="specialization" value="animalHusbandry">Animal Husbandry</option>
                            <option name="specialization" value="dairyFarming">Dairy Farming</option>
                            <option name="specialization" value="apiculture">Apiculture</option>
                            <option name="specialization" value="agroforestry">Agroforestry</option>
                            <option name="specialization" value="poultry">Poultry</option>
                            <option name="specialization" value="permanentCrops">Permanent Crops</option>
                            <option name="specialization" value="fruits_Vegetables">Fruits and Vegetables</option>
                        </select>
                    </div>
                    <div class="row">
                        <label for="password">Password:</label>
                        <input required type="password" minlength="8" maxlength="10" id="password" placeholder="Password(Between 8 and 10 chars)..." name="password">
                        <label class="required">*</label>
                        <label id="pass-required"></label>
                    </div>
                    <div class="row">
                        <label for="confirm-password">Confirm Password:</label>
                        <input required type="password" minlength="8" maxlength="10" id="confirm-password" placeholder="Confirm your password..." name="confirm-password">
                        <label class="required">*</label>
                        <label id="pass-conf-required"></label>
                        <label id="mismatches"></label>
                    </div>
                    <div class="buttons">
                        <button id="submitButton" name="Register" type="submit">Submit</button>
                        <button id="resetButton" type="reset">Clear</button>
                    </div>
                </form>
            </div>
        </div>
    <div class="home">
          <h3 style="font-size: x-large;"> Already have an account? <a href="login.php">Login here!</a><br><br>
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
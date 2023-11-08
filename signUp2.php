<?php
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

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
    //include 'dbconnect.php'; // Include the database connection file
    $fname = $_POST["firstName"];
    $lname = $_POST["lastName"];
    $email = $_POST["email"];
    $province = $_POST["province"];
    $district = $_POST["district"];
    $address = $_POST["address"];
    $specialization = $_POST["specialization"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm-password"];

    // Check if the username already exists
    $sql = "SELECT * FROM system_users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);

    if ($num == 0) {
        if ($password == $c0nfirm_password) {
            // Hash the password before storing it
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO users (fname,lname,email,province,district,address,specialization, password) VALUES ('$fname','$lname','$email','$province','$district','$address','$specialization' '$hash'";
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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/signingStyles.css">
</head>
<body>
    <?php
    if ($showAlert) {
        echo '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Your account is now created and you can login.
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
    <!-- Your HTML signup form goes here -->
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
                <form action="" method="post">
                    <div class="row">
                        <label for="fname">First Name:</label>
                        <input required type="text" id="fname" placeholder="Enter your first name..." name="firstName">
                        <label class="required">*</label>
                        <label id="fname-required"></label>
                        <br>
                    </div>
                    <div class="row">
                        <label for="lname">Last Name:</label>
                        <input required type="text" id="lname" placeholder="Enter your last name..." name="lastName">
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
                            <option value="dis1" id="dis1">Bugesera</option>
                            <option value="dis2" id="dis2">Gatsibo</option>
                            <option value="dis3" id="dis3">Kayonza</option>
                            <option value="dis4" id="dis4">Kirehe</option>
                            <option value="dis5" id="dis5">Ngoma</option>
                            <option value="dis6" id="dis6">Nyagatare</option>
                            <option value="dis7" id="dis7">Rwamagana</option>
                            <option value="dis8" id="dis8"></option>
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
                            <option value="aquaculture">Aquaculture</option>
                            <option value="animalHusbandry">Animal Husbandry</option>
                            <option value="dairyFarming">Dairy Farming</option>
                            <option value="apiculture">Apiculture</option>
                            <option value="agroforestry">Agroforestry</option>
                            <option value="poultry">Poultry</option>
                            <option value="permanentCrops">Permanent Crops</option>
                            <option value="fruits_Vegetables">Fruits and Vegetables</option>
                        </select>
                    </div>
                    <div class="row">
                        <label for="password">Password:</label>
                        <input type="password" maxlength="10" id="password" placeholder="Password(Between 8 and 10 chars)..." name="password">
                        <label class="required">*</label>
                        <label id="pass-required"></label>
                    </div>
                    <div class="row">
                        <label for="confirm-password">Confirm Password:</label>
                        <input type="password" maxlength="10" id="confirm-password" placeholder="Confirm your password..." name="confirm-password">
                        <label class="required">*</label>
                        <label id="mismatches"></label>
                    </div>
                    <div class="buttons">
                        <button id="submitButton" value="register" type="submit">Submit</button>
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
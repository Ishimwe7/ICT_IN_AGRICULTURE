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
                <form action="insertAdmin.php" method="POST">
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
                        <button id="submitButton" value="addAdmin" type="submit">Submit</button>
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
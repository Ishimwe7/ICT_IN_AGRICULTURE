<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Your head content here -->
</head>
<body>
    <div class="whole-page">
        <!-- Your logo and other page elements here -->
        <div class="sign-home">
            <div class="signUp">
                <h1 id="heading1">Please sign Up here!</h1>
                <div>
                    <form action="registration.php" method="post">
                        <div class="row">
                            <label for="fname">First Name:</label>
                            <input required type="text" id="fname" placeholder="Enter your first name..." name="firstName">
                            <label class="required">*</label>
                            <label id="fname-required"></label>
                            <br>
                        </div>
                        <!-- Add similar fields for Last Name, Email, etc. -->
                        <div class="row">
                            <label for="password">Password:</label>
                            <input type="password" id="password" placeholder="Password(Between 8 and 10 chars)..." name="password">
                            <label class="required">*</label>
                            <label id="pass-required"></label>
                        </div>
                        <div class="row">
                            <label for="confirm-password">Confirm Password:</label>
                            <input type="password" id="confirm-password" placeholder="Confirm your password..." name="confirmPassword">
                            <label class="required">*</label>
                            <label id="mismatches"></label>
                        </div>
                        <div class="buttons">
                            <button id="submitButton" type="submit">Submit</button>
                            <button id="resetButton" type="reset">Clear</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="home">
            <h3 style="font-size: x-large;"> Already have an account? <a href="login.php">Login here!</a><br><br>
            Go Back
            <a href="index.php">home</a>
            </h3>
        </div>
    </div>
</body>
</html>

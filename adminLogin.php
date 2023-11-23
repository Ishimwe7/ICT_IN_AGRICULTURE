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
                <form action="" method="POST">
                    <div class="row">
                        <label for="email">Email:</label>
                        <input type="email" id="email" required placeholder="Enter your email..." name="email">
                        <label class="required">*</label>
                         <br>
                    </div>
                    <div class="row">
                        <label for="email">Password:</label>
                        <input type="password" id="email" required placeholder="Enter your password here..." name="password">
                        <label class="required">*</label>
                         <br>
                    </div>
                    <div class="buttons">
                        <button id="log-in-button" name="login" type="submit">Login</button>
                    </div>
                </form>
            </div>
        </div>
    <div class="home">
          <h3 style="font-size: xx-large;"><br>
            
            Go to
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
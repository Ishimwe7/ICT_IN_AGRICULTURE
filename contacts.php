<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>contact us</title>
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
        <div class="address-contacts" style="display:flex; gap:40px">
            <div id="cont">
                <h1 style="text-decoration:underline">Contact Us:</h1>
                <ul style="font-size:x-large">
                    <li>Phone number: 0780876544</li>
                    <li>Email: modagri@gmail.com</li>
                    <li>LinkedIn: @modagri</li>
                    <li>Twitter: @modagri</li>
                </ul>
            </div>
            <div id="loc" >
                <h1 style="text-decoration:underline">Our Location</h1>
                <p style="font-size:x-large">Kigali, Rwanda<br>Remera,Gishushu, Near RDB</p>
            </div>
        </div>
        <div class="signUp">
            <h1 id="heading1">Fill this Form to send us your Query!</h1>
            <div>
                <form action="insert.php" method="POST">
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
                        <label for="message">Message:</label>
                        <textarea style="height: 80px;width:350px" name="message" id="message" placeholder="Type your message here." cols="30" rows="10"></textarea>
                    </div>
                    <div class="buttons">
                        <button id="submitButton" value="Send" type="submit">Send Message</button>
                        <button id="resetButton" type="reset">Clear</button>
                    </div>
                </form>
            </div>
        </div>
    <div class="home">
          <h3 style="font-size: x-large;"><br><br>
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
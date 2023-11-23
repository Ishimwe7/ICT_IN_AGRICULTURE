<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "ict_in_agriculture";
$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
    die("Error: " . mysqli_connect_error());
} 
if(!isset($_POST['fname'],$_POST['lname'],$_POST['email'],$_POST['province'],$_POST['district'],$_POST['address'],$_POST['$specialization'],$_POST['$password'],$_POST['confirm-password'])){
    echo $_POST['password'];
    echo $_POST['fname'];
    echo  $_POST['lname'];
    echo  $_POST['email'];
    echo  $_POST['address'];
    echo $_POST['province'];
    echo $_POST['district'];
    echo $_POST['specialization'];
    echo $_POST['confirm-password'];
    exit('Empty filed(s)');
} 
if(empty($_POST['fname']) || empty($_POST['lname'])||empty($_POST['email'])||empty($_POST['province'])||empty($_POST['district'])||empty($_POST['address'])||empty($_POST['$specialization'])||empty($_POST['$password'])||empty($_POST['confirm-password'])){
    exit('There is Empty Value(s)');
} 
if($stmt = $conn->prepare('select email from system_sers where email=?')){
   $stmt->bind_param('s',$_POST['email']);
   $stmt->execute();
   $stmt->store_result();
   if($stmt->num_rows>0){
    echo 'User Already Exists!';
   }
   else{
       if($stmt = $conn->prepare('INSERT INTO system_sers(fname, lname, email, province, district, address, specialization, password) values(?,?,?,?,?,?,?,?)')) {
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $stmt->bind_param('ssssssss',$_POST['fname'],$_POST['lname'],$_POST['email'],$_POST['province'],$_POST['district'],$_POST['address'],$_POST['$specialization'],$password);
        $stmt->execute();
        echo 'Successfully Registered!!';
       }
       else{
        echo 'An expected Error occurred!';
       }
    } 
    $stmt->close();
   }
   else{
    echo 'An Error Occurred!';
   }
   $conn->close();
?>
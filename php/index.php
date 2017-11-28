<?php

$user = " ";
$password = " ";
$sid = "";
$sname = "";


include 'connect.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = test_input($_POST["user"]);
  $password = test_input($_POST["password"]);
 
}
if(isset($_POST['user'])){
    $user = $_POST['user'];
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$sql = "SELECT sname FROM student WHERE sid = '$password' ";
$result = $conn->query($sql);
if($result){
    while(($row = $result->fetch_assoc())!= null) {
        $sname  = $row['sname'];
        //echo "<br> name: ". $row['sname']. "<br>";
    }
  }    
$sql = "SELECT sid FROM student WHERE sname ='$user' ";
$result = $conn->query($sql);
//if ($result->num_rows > 0) {
if($result){
        while($row = $result->fetch_assoc()){
        $sid = $row['sid'];
        //echo "<br> id: ". $sid. "<br>";
      }
  }    
$_SESSION['sname'] = $sname;
$_SESSION['sid'] = $sid;
if($user == $sname && $password == $sid){
    header("Location:profile.php");
    exit;
  echo "Done";
}
else{
  //echo "Wrong username or password. Please try again";
}


?>

<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
</head>
<body>
<h2>Welcome.Please Login in order to continue. <br>You can use your name as username and your id as password</h2>
<form method = "post" >
  Name:<br>
  <input type="text" name="user" required>
  <br>
  Password:<br>
  <input type="text" name="password" required>
  <br><br>
  <input type="submit" value="Submit">
</form> 


</body>
</html>
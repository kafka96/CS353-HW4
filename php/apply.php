<?php
include 'connect.php';
$cid = "";
$sid = $_SESSION['sid'];
$row="";
$quota = 0;
$applications = "";
$cidcount = "";	

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $cid = test_input($_POST['id']);
  
  $sql = "SELECT COUNT(*) as total FROM apply WHERE sid = '$sid'";
  $result = $conn->query($sql);
  if($result){
    while($row = $result->fetch_assoc()){
      $applications = intval($row['total']);
    }
  }

  $sql = "SELECT quota from company WHERE cid = '$cid'";
  $result = $conn->query($sql);
  if($result){
    while($row = $result->fetch_assoc()){
      $quota = intval($row['quota']);
    }
  }


   call_user_func('perform',$applications, $sid, $cid, $conn);

 
}
if(isset($_POST['id'])){
    $cid = $_POST['id'];

}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


function perform($applications, $sid, $cid, $conn){
  if(isset($applications) && $applications == 3){
    echo "<script>alert('You have reached maximum number of applications')</script>";
  }
  else {
    $sql = "INSERT INTO apply(sid, cid) VALUES('$sid','$cid')";
    $conn->query($sql);
    echo "<script>alert('Application was done successfully')</script>";
  }
}
?>
	<form method = "post" >
  Company id:<br>
  <input type="text" name="id" required>
  <br>
  <input type="submit" value="Submit">
  </form>
  <a href="profile.php">Profile</a>
    <a href="destroy.php">Logout</a>
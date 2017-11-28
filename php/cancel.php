<?php
include 'connect.php';
//$cid = "";
$cid = $_GET['cid'];
$sid = $_SESSION['sid'];
$sql = "DELETE FROM apply WHERE cid = '$cid' AND sid = '$sid'";
$conn->query($sql);
echo "<script>alert('Application was removed successfully')</script>";
?>
<a href="profile.php">Go back to your profile</a>
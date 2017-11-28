<?php
// session_start();
include 'connect.php';
$sname = $_SESSION['sname'];
$applications = "";
$sid = $_SESSION['sid'];
$sql = "SELECT * from company NATURAL JOIN apply WHERE sid = '$sid'";
$result = $conn->query($sql);
echo "<table border = '1'> <tr> <th>Company</th><th>ID</th><th>Quota</th><th>Cancel</th></tr>";
if($result){
    while(($row = $result->fetch_assoc())!= null) {
        $cid  = $row['cid'];
        echo "<tr><td width='30%'>".$row['cname']."</td><td width='30%'>".$row['cid']."</td><td width='30%'>".$row['quota']."</td><td width='30%'>". "<a href='cancel.php?cid=$cid' role = 'button' class = 'btn'>Cancel application</a>"."</tr>";
       // echo "<br>";
    }
  }
  echo "</table>";	
$sql = "SELECT COUNT(sid) as total FROM apply WHERE sid = '$sid'";
$result = $conn->query($sql);
if($result){
	while($row = $result->fetch_assoc()){
		$applications = $row['total'];
	}
}
echo "<a href = 'apply.php'>Make a new application</a>";

?>

<!DOCTYPE html>
<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
 <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
 <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
 <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />   
	<title></title>
</head>
<body>
  <br>
<a href="destroy.php">Logout</a>
</body>
</html>
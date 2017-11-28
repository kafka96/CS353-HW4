<?php
$pass = "l5taa75fu";
$servername = "dijkstra.ug.bcc.bilkent.edu.tr";
$username = "xheni.caka";
$db = "xheni_caka";
session_start();
$conn = new mysqli($servername, $username, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>
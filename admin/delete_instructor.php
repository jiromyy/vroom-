<?php
include('../includes/web.php');

$id = $_GET['id']; // get id through query string
echo $id;
mysqli_query($db,"delete from instructor where studentID = '$id'");

header("location:instructors.php");
?>
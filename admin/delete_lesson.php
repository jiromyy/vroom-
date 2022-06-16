<?php
include('../includes/web.php');

$name = $_GET['name']; // get id through query string
echo $name;
mysqli_query($db,"delete from lessons where lessonName = '$name'");

header("location:catalog.php");
?>
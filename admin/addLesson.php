<?php
include('../includes/connection.php');

$name = $_POST['lessonName'];
$price = $_POST['price'];
$hours = $_POST['hour'];
$details = $_POST['details'];

$query = "INSERT INTO lessons (lessonName, lessonDetails, price, hour) VALUES('$name', '$details', '$price', '$hours')";
mysqli_query($db, $query);

header("Location: catalog.php");

?>
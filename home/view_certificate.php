<?php

include('../includes/connection.php');

$id = $_GET['id'];
$query = "SELECT certificate FROM student_lesson WHERE bookID = '$id'";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_assoc($result);

echo "<img style='max-width: 100%; max-height: 100vh; height: auto;' src='../certificates/$id.jpg' alt='img'>";
?>
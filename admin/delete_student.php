<?php
include('../includes/web.php');

$id = $_GET['id']; // get id through query string
echo $id;
mysqli_query($db,"delete user, student from student inner join user ON student.studentID = user.userID where studentID = '$id'");

header("location:students.php");
?>
<?php

 include('../includes/web.php');
 $id = $_GET['id'];
 $regdate = date("Y-m-d H:i:s");

 $lessonname = $_GET['lesson'];
 $date = $_POST['date'];

 $photo = explode(".", $_FILES["payment"]["name"]);
 $ext = $_FILES['payment']['tmp_name'];
 $newfilename = $id . "_" . $date . "_". '.' . end($photo); 
 move_uploaded_file($ext, "../payments/" . $newfilename);

 include('../includes/connection.php');

 $query = "INSERT INTO student_lesson (studentID, lesson, date, regDate, payment) VALUES ('$id','$lessonname','$date', '$regdate', '$newfilename')";
 mysqli_query($db, $query);
 array_push($popup,"Booking successful!");

 header('Location: transactions.php');
?>
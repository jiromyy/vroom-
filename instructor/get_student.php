<?php 
  include_once('../includes/web.php');
  $id = "";
  $fname = "";
  $lname = "";


  //get ID
  $id = $_GET['id'];
  if ($id===null) {
     array_push($errors,"Please Login!");
     header('location: ../login.php');
  }

  $query = "SELECT * FROM student_lesson INNER JOIN student INNER JOIN lessons on student_lesson.studentID = student.studentID AND student_lesson.lesson = lessons.lessonName WHERE bookID ='$id'";
  $result = mysqli_query($db, $query);
  $row = mysqli_fetch_assoc($result);

  if (mysqli_num_rows($result) == 1) {
    $studID = $row['studentID'];
    $progress = $row['progress'];
    $hour = $row['hour'];
    $bookID = $row['bookID'];
    $id = $row['studentID'];
    $fname = $row['FName'];
    $lname = $row['LName'];
  }

if (isset($_POST['update_progress'])) {
    $progress = $_POST['progress'];
  
    $query = "UPDATE student_lesson SET progress = $progress WHERE bookID = $bookID";
    mysqli_query($db, $query);
    array_push($popup,"Booking successful!");
    header("Location: progress.php");
    
}

// USER LOGOUT  
if (isset($_POST['logout'])){
  session_destroy();
  header('location: ../index.php');
}

?>
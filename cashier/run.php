<?php

if (isset($_POST['approve'])){

    $ins = $_POST['instructor'];
    $query = "UPDATE student_lesson SET approve = 1, instructor = '$ins' WHERE bookID = '$id'";
    mysqli_query($db, $query);

    header('location: transactions.php');
  }

  // USER LOGOUT  
  if (isset($_POST['logout'])){
    echo "Clicked!";
    session_destroy();
    header('location: ../index.php');
  }  

?>
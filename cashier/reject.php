<?php
    include('../includes/connection.php');
    $id = $_GET['id'];

    $query = "UPDATE student_lesson SET approve=2 WHERE bookID = '$id'";
    mysqli_query($db, $query);

    header('location: transactions.php');
?>
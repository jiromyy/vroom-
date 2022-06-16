<?php
    $photo = explode(".", $_FILES["dp"]["name"]);
    $ext = $_FILES['dp']['tmp_name'];
    $newfilename = $_GET['id'] . "ID" . '.' . end($photo); 
    move_uploaded_file($ext, "../uploads/" . $newfilename);

    include('../includes/connection.php');

    $query = "UPDATE student SET pic ='$newfilename'";
    mysqli_query($db, $query);

    
    header('Location: profile.php');
?>
<?php 
  include_once('../includes/web.php');
  $id = "";
  $fname = "";
  $lname = "";
  $gender = "";
  $email = "";
  $bdate = "";
  $address = "";
  $phone = "";
  $validID = "";
  $PSA = "";

  //get ID
  $id = $_GET['id'];

  $_SESSION['id'] = $id;
  if ($id===null) {
     array_push($errors,"Please Login!");
     header('location: ../login.php');
  }

  $query = "SELECT * FROM student WHERE studentID ='$id'";
  $result = mysqli_query($db, $query);
  $row = mysqli_fetch_assoc($result);

  if (mysqli_num_rows($result) == 1) {
    $id = $row['studentID'];
    $fname = $row['FName'];
    $lname = $row['LName'];
    $gender = $row['gender'];
    $email = $row['email'];
    $bdate = $row['birthDate'];
    $address = $row['address'];
    $phone = $row['phone'];
    $validID = $row['validID'];
    $PSA = $row['PSA'];
  }

// USER LOGOUT  
if (isset($_POST['logout'])){
  session_destroy();
  header('location: ../index.php');
}

?>
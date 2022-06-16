<?php 
  include('../includes/web.php');
 
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
  $id = $_SESSION['id'];

  if ($id===null) {
    array_push($errors,"Please Login!");
    header('location: ../login.php');
  }

  $query = "SELECT * FROM student WHERE studentID ='$id'";
  $result = mysqli_query($db, $query);
  $row = mysqli_fetch_assoc($result);

  // USER LOGOUT  
if (isset($_POST['logout'])){
  echo "Clicked!";
  session_destroy();
  header('location: ../index.php');
}

?>
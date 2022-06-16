<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 
$popup = array();
$regdate = date("Y-m-d H:i:s");
$current_user = 0;

$dname = "";
$dprice = "";
$dhour = "";
$ddetail = "";

// connect to the database
include_once("connection.php");


//INITIAL REGISTRATION
if (isset($_POST['continue'])) {
  // receive all input values from the form
  $type = $_POST['type'];
  $username = $_POST['username'];
  $password_1 = $_POST['password'];
  $password_2 = $_POST['cpassword'];


   //ensure that the password is matched ...
  if ($password_1 != $password_2) {
    array_push($errors, "Passwords do not match!");	
  }

   // first check the database to make sure 
    // a user does not already exist with the same name and/or username
  $user_check_query = "SELECT * FROM user WHERE username='$username' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
    
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors,"Username already exists!");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
    $password = md5($password_1);//encrypt the password before saving in the database

    $query = "INSERT INTO user (username, password, userType, registerDate) 
              VALUES('$username', '$password', '$type', '$regdate')";
    mysqli_query($db, $query);
    
	  $query = "SELECT * FROM user WHERE username = '$username'";
	  $result = mysqli_query($db,$query);
	  $row = mysqli_fetch_assoc($result);
	  $id = $row['userID'];
    $_SESSION['id'] = $id;

    if ($type==='Student'){
      $query = "INSERT INTO student (studentID) VALUES('$id')";
      mysqli_query($db, $query);

      array_push($popup,"Registration successful");
      header("location:home/profile.php");
    }

    if ($type==='Instructor'){
      $query = "INSERT INTO instructor (studentID) VALUES('$id')";
      mysqli_query($db, $query);

      array_push($popup,"Registration successful");
      header("location:instructor/profile.php");
    }
}

}

//UPDATE USER INFORMATION
if (isset($_POST['update'])) {
  //get ID
  $usercheck =$_SESSION['id'];
	$query = "SELECT * FROM user WHERE userID = '$usercheck'";
	$result = mysqli_query($db,$query);
	$row = mysqli_fetch_assoc($result);
	$id = $row['userID'];
	echo $id;
  $type = $row['userType'];

  // receive all input values from the form
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $gender = $_POST['gender'];
  $bdate = $_POST['bday'];
  $email = $_POST['email'];
  $address = $_POST['address'];
  $phone = $_POST['phone'];

  echo $f = empty($_FILES['validID']);
  //PHOTOS
  if($type === 'Student'){
    
    if(isset($_FILES['validID'])){
      $photoID = explode(".", $_FILES["validID"]["name"]);
      $IDext = $_FILES['validID']['tmp_name'];
      $IDfilename = $type . $id . "validID" . '.png'; 
      move_uploaded_file($IDext, "../uploads/" . $IDfilename);

      $query = "UPDATE student SET validID ='$IDfilename' WHERE studentID='$id'";
      mysqli_query($db, $query);
    }
    
    if(isset($_FILES['PSA'])){
      $photoPSA = explode(".", $_FILES["PSA"]["name"]);
      $PSAext = $_FILES['PSA']['tmp_name'];
      $PSAfilename = $type . $id . "PSA" . '.png'; 
      move_uploaded_file($PSAext, "../uploads/" . $PSAfilename);

      $query = "UPDATE student SET PSA = '$PSAfilename' WHERE studentID='$id'";
      mysqli_query($db, $query);
    }

    //register user if there are no errors in the form
    if (count($errors) == 0) {
    $query = "UPDATE student SET FName='$fname', LName='$lname', gender='$gender', 
        email='$email', birthDate='$bdate', address='$address', phone='$phone' WHERE studentID='$id'";
        mysqli_query($db, $query);
        $_SESSION['id'] = $id;
        array_push($popup,"Update successful!");
    }
  }
  else{
    $photoID = explode(".", $_FILES["validID"]["name"]);
    $IDext = $_FILES['validID']['tmp_name'];
    $IDfilename = $type . $id . "validID" . '.png'; 
    move_uploaded_file($IDext, "../uploads/" . $IDfilename);
    $PSAfilename = NULL;
  
    if (count($errors) == 0) {
      $query = "UPDATE instructor SET FName='$fname', LName='$lname', gender='$gender', 
          email='$email', birthDate='$bdate', address='$address', phone='$phone',
          validID ='$IDfilename'  WHERE studentID='$id'";
          mysqli_query($db, $query);
          $_SESSION['id'] = $id;
          array_push($popup,"Update successful!");
      }
  
  }

}

// LOGIN USER
if (isset($_POST['login'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];

	if (count($errors) == 0) {
		$password = md5($password);
		$query = "SELECT * FROM user WHERE username ='$username' AND password='$password'";
		$results = mysqli_query($db, $query);
    $row = mysqli_fetch_assoc($results);
    

    if(mysqli_num_rows($results) != 1){
      array_push($errors,"Wrong username/password combination!");
    }
    else{
      
    $type = $row['userType'];
    $_SESSION['id'] = $row['userID'];
    
    if($type == "admin"){
        header('location: admin/students.php');
      }
      else if($type == "Instructor"){
        header('location: instructor/profile.php');
      }
      else if($type == "Student"){
        header('location: home/profile.php');
      }
      else if($type == "cashier"){
        header('location: cashier/transactions.php');
      }
	  }
  }
}

if (isset($_POST['getDetail'])) {
    $lessonname = $_POST['lesson']; 
    $query = "SELECT * FROM lessons WHERE lessonName ='$lessonname'";
		$results = mysqli_query($db, $query);
    $row = mysqli_fetch_assoc($results);

    $dname = $row['lessonName'];
    $dprice = $row['price'];
    $dhour = $row['hour'];
    $ddetail = $row['lessonDetails'];
    
}
?>


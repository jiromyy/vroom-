<?php
// connect to the database
//UPDATE STUDENT INFORMATION
if (isset($_POST['update_student'])){

    // receive all input values from the form
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $gender = $_POST['gender'];
    $bdate = $_POST['bday'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];

    //register user if there are no errors in the form
    if (count($errors) == 0) {
    $query = "UPDATE student SET FName='$fname', LName='$lname', gender='$gender', 
        email='$email', birthDate='$bdate', address='$address', phone='$phone'  WHERE studentID='$id'";
        mysqli_query($db, $query);
        $_SESSION['id'] = $id;
        array_push($popup,"Update successful!");
        header("Location: students.php");
    }
}

//UPDATE INSTRUCTOR INFORMATION
if (isset($_POST['update_instructor'])) {
    // receive all input values from the form
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $gender = $_POST['gender'];
    $bdate = $_POST['bday'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
  
    
    //register user if there are no errors in the form
    if (count($errors) == 0) {
      $query = "UPDATE instructor SET FName='$fname', LName='$lname', gender='$gender', 
          email='$email', birthDate='$bdate', address='$address', phone='$phone'  WHERE studentID='$id'";
          mysqli_query($db, $query);
          $_SESSION['id'] = $id;
          array_push($popup,"Update successful!");
          header("Location: instructors.php");
      }
}
?>
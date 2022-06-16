<?php 
include('../includes/web.php');

if (isset($_POST['change'])){
    //$id = $_GET['id'];
    $ppass = $_POST['ppass'];
    $npass = $_POST['npass'];
    $rnpass = $_POST['rnpass'];

    $query = "SELECT * FROM user WHERE userID ='$id'";
    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_assoc($result);
    $p = $row['password'];

    $pass = md5($ppass);

    if($p != $pass){
        array_push($errors,"Old Password Error!");
    }
    else {
        if($npass != $rnpass){
            array_push($errors,"New Password Do not Match!");
        }
        else{
            $newpass = md5($npass);
            $query = "UPDATE user SET password = '$newpass' WHERE userID ='$id'";
            mysqli_query($db, $query);
            array_push($popup,"Password changed successful!");
            header('Refresh: 3; URL=profile.php');
        }
    }
}
?>
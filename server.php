<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array();
$popup = array();
$createdat = date("Y-m-d H:i:s");
$current_user = 0;

// connect to the database
include_once("connect.php");

// REGISTER USER
if (isset($_POST['reg_user'])) {
	// receive all input values from the form
	$username = mysqli_real_escape_string($db, $_POST['name']);
	$email = mysqli_real_escape_string($db, $_POST['email']);
	$password_1 = mysqli_real_escape_string($db, $_POST['password']);
	$password_2 = mysqli_real_escape_string($db, $_POST['cpassword']);


	//ensure that the password is matched ...
	if ($password_1 != $password_2) {
	array_push($errors, "Password do not matched");
	}

	// first check the database to make sure
	// a user does not already exist with the same name and/or email
	$user_check_query = "SELECT * FROM users WHERE name='$username' OR email='$email' LIMIT 1";
	$result = mysqli_query($db, $user_check_query);
	$user = mysqli_fetch_assoc($result);

	if ($user) { // if user exists
		if ($user['name'] === $username) {
			array_push($errors,"Username already exists");
		}

		if ($user['email'] === $email) {
			array_push($errors,"Email already exists");
		}
	}

	// Finally, register user if there are no errors in the form
	if (count($errors) == 0) {
		$password = md5($password_1);//encrypt the password before saving in the database

		$query = "INSERT INTO user (name, email, password, created_at)
					VALUES('$username', '$email', '$password', '$createdat')";
		mysqli_query($db, $query);
		$_SESSION['name'] = $username;
		array_push($popup,"Registration successful");
		header('location: registered.php');
	}
}


// LOGIN USER
if (isset($_POST['login'])) {
	$email = mysqli_real_escape_string($db, $_POST['email']);
	$password = mysqli_real_escape_string($db, $_POST['password']);

	if (count($errors) == 0) {
		$password = md5($password);
		$query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
		$results = mysqli_query($db, $query);



		if (mysqli_num_rows($results) == 1) {
			$_SESSION['name'] = $email;
			header('location: posts.php');
		}else {
			array_push($errors,"Wrong username/password combination!");
		}
	}
}

// INSERT POSTS
if (isset($_POST['insert'])){
	$title = mysqli_real_escape_string($db, $_POST['title']);
	$body = mysqli_real_escape_string($db, $_POST['bod']);


	$usercheck =$_SESSION['name'];
	$query = "SELECT * FROM users WHERE email = '$usercheck'";
	$result = mysqli_query($db,$query);
	$row = mysqli_fetch_assoc($result);
	$id = $row['id'];

	$query = "INSERT INTO posts (user_id, title, body, created_at)
	VALUES('$id', '$title', '$body', '$createdat')";
		mysqli_query($db, $query);
	array_push($popup, "Successfully Added Post");
}



//UPDATE POSTS
if (isset($_POST['update'])) {
$title = mysqli_real_escape_string($db, $_POST['title']);
$body = mysqli_real_escape_string($db, $_POST['body']);
$id = mysqli_real_escape_string($db, $_POST['id']);

$sql  = "UPDATE posts SET title = '$title', body = '$body' WHERE id = '$id'";
$result = mysqli_query($db,$sql);
array_push($popup, "Successfully Updated Post");
}

//DELETE POSTS
if (isset($_POST['delete'])) {
$id = mysqli_real_escape_string($db, $_POST['id']);

$sql  = "DELETE FROM posts WHERE id = '$id'";
$result = mysqli_query($db,$sql);

array_push($popup, "Successfully Deleted Post");


}
?>
<?php
	session_start();
	$username = "";
	$password_1 = "";
	$password_2 = "";
	$email = "";
	$add = "";
	$errors = array();
	
	$db = mysqli_connect('localhost','root','','project');

	if(isset($_POST['Signup'])){
		$username = $_POST['name'];
		$email = $_POST['email'];
		$add = $_POST['add'];
		$password_1 = $_POST['password_1'];
		$password_2 = $_POST['password_2'];

		if(empty($username)){
			array_push($errors, "Username is required");
		}

		if(empty($email)){
			array_push($errors, "Email is required");
		}

		if(empty($add)){
			array_push($errors, "Address is required");
		}

		if(empty($password_1)){
			array_push($errors, "Password is required");
		}

		if($password_1 != $password_2){
			array_push($errors, "The two passwords do not match");
		}

		if(count($errors) == 0){
			$password = md5($password_1);
			$sql = "INSERT INTO user (username, email, password, address)
						VALUES ('$username','$email','$password', '$add')";
			mysqli_query($db, $sql);
			$_SESSION['username'] = $username;
			$_SESSION['success'] = "You are now logged in";
			header('location: home.php');
		}
	}

	if(isset($_POST['Signin'])){
		$username = $_POST['name'];
		$password = $_POST['password'];

		if(empty($username)){
			array_push($errors, "Username is required");
		}

		if(empty($password)){
			array_push($errors, "Password is required");
		}

		if(count($errors) == 0){
			$password = md5($password);
			$query = "SELECT * FROM user WHERE 	username='$username' AND password='$password'";
			$result = mysqli_query($db, $query);

			if (mysqli_num_rows($result) == 1) {
				$_SESSION['username'] = $username;
				$_SESSION['success'] = "You are now logged in";
				header('location: home.php');
			}
			else{
				array_push($errors, "The username/password is incorrect");
			}
		}
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['name']);
		header('location: signin.php');
	}
?>
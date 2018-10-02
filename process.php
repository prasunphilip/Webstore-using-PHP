<?php

	if(isset($_POST['Signup'])){
      $db = mysqli_connect('localhost','root','','project');
	  $username = mysqli_real_escape_string($db, $_POST["username"] );
	  $password1 = mysqli_real_escape_string($db, md5($_POST["password_1"]) );
	  $email = mysqli_real_escape_string($db, $_POST["email"] );
	  $password2 = mysqli_real_escape_string($db, md5($_POST["password_2"]) );
 
 
	  if( empty($username) || empty($password1) )
	  {
	  	echo "Username and Password are mandatory";
		exit();
	  }
 
 
 	$res = mysql_query("SELECT username FROM users WHERE username='$username'");
	  $row = mysql_fetch_row($res);
 
	  if( $row > 0 )
	    echo "Username $username has already been taken";
		else if($password1 != $password2)
			echo "The Passwords do not match";

	  else
	  {
	   	  $sql = "INSERT INTO users VALUES($username','$password','$fname','$lname')";
	    if( mysql_query($sql) )
	     echo "Inserted Successfully";
	   else
	     echo "Insertion Failed";
	}
}
?>
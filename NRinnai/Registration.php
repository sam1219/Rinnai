<?php

  session_start();

   $host = "localhost";
   $user = "root"; // your user name
   $pswd =""; // your password
   $dbnm = "rinnaidatabase"; // your database

   $connection = mysqli_connect($host,$user,$pswd,$dbnm);
   mysqli_select_db($connection,$dbnm);
    
    $username = $_POST['user'];
    $password = $_POST ['pass'];
	$error = "";
	
	$query="SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($connection,$query);
    $row = mysqli_fetch_array($result);
   
    
    if($row['username'] == $username){
		header("location: Registration.html");
	}else{
	      $sql= "insert into users(username, password) VALUES ('$username','$password')";
		  mysqli_query($connection,$sql); 
		  header("location: loginpage.html");  
	}
    	


?>
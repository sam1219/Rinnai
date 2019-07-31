<?php 
     session_start();
	  
	  
      $host = "localhost";
      $user = "root"; // your user name
      $pswd =""; // your password
      $dbnm = "rinnaidatabase"; // your database
	  
	  //connect to the server and select database 
	  $connection=mysqli_connect($host,$user,$pswd,$dbnm)or die('Failed to connect to server');//conecet database ;//conecet database 
	  mysqli_select_db($connection,$dbnm) or die('Database not available');
    
	  //get values pass from form in loginpage.html file 
      $username = $_POST['user'];
      $password = $_POST ['pass'];
	
	
	
	  //Query the database for user
	  $query="SELECT * FROM users WHERE username = '$username' && password ='$password'";
      $result = mysqli_query($connection,$query);
	  $row = mysqli_fetch_array($result);
	  
	  
      if($row['username'] == $username && $row['password'] == $password){
		  header("location: homepage.html");  
         }else{
		  header("location: loginpage1.html");
	  } 
     
?>
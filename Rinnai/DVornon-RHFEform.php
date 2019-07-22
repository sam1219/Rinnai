<html>
  <head>
     <title>Sample screen-shot of the status form</title>
	 <link rel="stylesheet" type="text/css"/>
  </head>
 <body background="blackground.jpg">
 <center><table border ="1" width ="600" height ="300">
 <tr><td  colspan="5" align="center"><img src="rinnai.png" width="200" height="75" ></td></tr>     
 
<?php	
        $serialno =$_POST['serial'];
        $gascountrolno =$_POST['gascountrol'];
		$model=$_POST['model'];
		$destination=$_POST['destination'];
		$gastype=$_POST['gastype'];
        $testno=$_POST['test'];
		$earthcontinuity=$_POST['earthcontinuity'];
		$insulation=$_POST['insulation'];
		$linepresure=$_POST['linepresure'];
        $setpressurehigh=$_POST['setpressurehigh'];
		$setpressurelow=$_POST['setpressurelow'];
		$stage1=$_POST['stage1'];
		$front1=$_POST['front1'];
		$stage=$_POST['stage'];
		$front=$_POST['front'];
		$hight1=$_POST['hight1'];
		$low1=$_POST['low1'];
		$hight=$_POST['hight'];
		$low=$_POST['low'];
		$text=$_POST['text'];
		
		$host = "localhost";
        $user = "root"; // your user name
        $pswd =""; // your password
        $dbnm = "rinnaidatabase"; // your database
	    $connection=mysqli_connect($host,$user,$pswd,$dbnm) or die('Failed to connect to server');//conecet database 
		$dbSelect=mysqli_select_db($connection,$dbnm) or die('Database not available');//open database 
      	
		
		if(!$connection){
			echo'Not connected To Server';
		}else{
		  //input vale to thae database 
		  $query ="insert into dvform (serialno, gascountrolno, model, destination, gastype,testno,earthcontinuity,insulation,linepresure,setpressurehigh,
		                              setpressurelow,stage1,front1,stage,front,hight1,low1, hight,low,text)
                                 	  values('$serialno','$gascountrolno','$model', '$destination', '$gastype','$testno','$earthcontinuity','$insulation', 
									  '$linepresure', '$setpressurehigh','$setpressurelow','$stage1','$front1', '$stage', '$front','$hight1','$low1','$hight', 
									  '$low1' ,'$text')";
		
		  //post input data to the database 
		  $result = mysqli_query($connection, $query);
	

		if(! $result) {
			echo "<tr><td>Something is wrong with ",$query,"</tr>/<td>";
		} else {
			
			echo "<tr><td>Success to database.</tr></td>";
		} 
		
		  mysqli_close($connection);
		}
		
		 
?>
  <tr><td  align="right" bgcolor="grey"><a href="searchpage.html">Search Page</a></td></tr>	
           	
  <tr><td  align="right" bgcolor="grey"><a href="homepage.html">Return to Home Page</a></td></tr>	
           
  </table></center>    
  
</body>
</html>
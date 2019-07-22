<html>
  <head>
     <title>Sample screen-shot of the status form</title>
	 <link rel="stylesheet" type="text/css"/>
  </head>
 <body background="blackground.jpg">
 <center><table border ="1" width ="600" height ="300">
 <tr><td  colspan="5" align="center"><img src="rinnai.png" width="200" height="75" ></td></tr>     
 
<?php	
        $serialno=$_POST['serial'];
        $gascountrolno =$_POST['gascountrol'];
        $testno=$_POST['test'];
		$earthcontinuity=$_POST['earthcontinuity'];
		$insulation=$_POST['insulation'];
		$ignition=$_POST['ignition'];
		$stage1=$_POST['stage1'];
		$stage3=$_POST['stage3'];
		$stage4=$_POST['stage4'];
		$stage7=$_POST['stage7'];
		$stage70=$_POST['stage70'];
		$stage10=$_POST['stage10'];
		$period=$_POST['period'];
		$confanon=$_POST['confanon'];
		$ignitiontime=$_POST['ignitiontime'];
		$response=$_POST['response'];
		$results1=$_POST['results1'];
		$results2=$_POST['results2'];
		$results3=$_POST['results3'];
		$rpm1=$_POST['rpm1'];
		$watts=$_POST['watts'];
		$watts1=$_POST['watts1'];
		$watts2=$_POST['watts2'];
		$litres=$_POST['litres'];
		$litres1=$_POST['litres1'];
		$litres2=$_POST['litres2'];
		$litres3=$_POST['litres3'];
		$litres4=$_POST['litres4'];
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
		  $query = "insert into rhftestform (serialno,gascountrolno,testno,earthcontinuity,insulation,ignition,stage1,stage3,stage4,stage7,stage70,stage10,
		                                     period,confanon,ignitiontime,response,results1,results2,results3,rpm1,watts,watts1,watts2,litres,litres1,litres2,
											 litres3,litres4,text)values('$serialno','$gascountrolno','$testno', '$earthcontinuity', '$insulation','$ignition',
											 '$stage1','$stage3','$stage4', '$stage7','$stage70','$stage10','$period', '$confanon','$ignitiontime','$response',
											 '$results1','$results2','$results3','$rpm1','$watts' ,'$watts1','$watts2','$litres','$litres1','$litres2','$litres3',
											 '$litres4','$text')";
		
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
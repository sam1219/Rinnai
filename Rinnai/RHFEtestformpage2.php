<!DOCTYPE html>                               
<html>                                        
<head>                                        
     <title>RHFE test form </title>   
	 <meta charset = "utf-8"/>                
</head> 

         <?php  
        $host = "localhost";
        $user = "root"; // your user name
        $pswd =""; // your password
        $dbnm = "rinnaidatabase"; // your database
	    $connection=mysqli_connect($host,$user,$pswd,$dbnm) or die('Failed to connect to server');//conecet database 
		$dbSelect=mysqli_select_db($connection,$dbnm) or die('Database not available');//open database 
		
		$query1 = "SELECT * FROM `dvform` ";//select data  from the database 
	    //method optins get data from the database 
		$result1 = mysqli_query($connection, $query1);
		$result2 = mysqli_query($connection, $query1);
		$result3 = mysqli_query($connection, $query1);                                  
		
		
        ?> 
                                                   
                                              
 <body background="blackground.jpg">                
                                              
	<form action="DVornon-RHFEform.php" method="POST" >
	                                            
		   <center><table border ="1 solid">
		   <tr><td  colspan="10" align="center"><img src="rinnai.png" width="300" height="90" ></td></tr>                                 
                                              
		   <tr><td colspan="10" align="center" bgcolor="grey">RHFE test form page 2</td></tr>	
		                                      
	       <tr><td align="right">serail no:</td><td><input  type = "text"  name = "serial"></td>	
           <td> gas countrol no:</td><td><input  type = "text"   name= "gascountrol"></td></tr>				   
		                                      
	       <tr><td align="right">model:</td><td>
		   <select name = "model"><?php while ($row = mysqli_fetch_array($result1)):;?>
		   <option><?php echo $row['model'];?></option>
		   <?php endwhile;?>                  
		   </select></td>
		   
		   <td align="right">destination:</td><td>
		   <select name  = "destination"><?php while ($row2 = mysqli_fetch_array($result2)):;?>
		   <option><?php echo $row2['destination'];?></option>
		   <?php endwhile;?>                  
		   </select>
		   
		   <td align="right">gse type:</td><td>
		   <select name = "gastype"><?php while ($row3 = mysqli_fetch_array($result3)):;?>
		   <option><?php echo $row3['gastype'];?></option>
		   <?php endwhile;?>                  
		   </select></td></tr>		          
                                              		                                        
           <tr><td align="right">test no:</td><td><input  type = "text"  name = "test"></td></tr>			   
	                                          
           <tr><td colspan="10"><input type="file" name="fileupload" value="fileupload" id="fileupload"></td></tr>
		   
		   <tr><td>Position</td><td>Limit</td><td>1st Reading</td><td>2nd Reading</td></tr>

           <tr><td>1</td><td> <0.8m</td><td bgcolor="grey"></td><td bgcolor="grey"></td></tr>

           <tr><td>2</td><td><0.8m</td><td><input type="text" name=""></td><td><input type="text" name=""></td></tr>

           <tr><td>3</td><td> <0.8m</td><td bgcolor="grey"></td><td bgcolor="grey"></td></tr>

           <tr><td>4</td><td> <0.8m</td><td><input type="text" name=""></td><td><input type="text" name=""></td></tr>

           <tr><td>5</td><td> <0.8m</td><td bgcolor="grey"></td><td bgcolor="grey"></td></tr>

           <tr><td>6</td><td><0.8m</td><td><input type="text" name=""></td><td><input type="text" name=""></td></tr>
		   
		   
		   <tr> <td align="right" colspan="2">NO abnormal noise or vibration:</td><td>
		   <select>
		   <option>pass</option>
		   <option>fail</option></select></td></tr>
		   
		   <tr><td align="right" colspan="2">Remote control (test operation):</td><td>
		   <select >
		   <option>pass</option>
		   <option>fail</option>                   
		   </select></td></tr>	
		   
		   <tr><td colspan="2">AIR LEAK @100pa:</td><td><input type="text" name=""></td></tr>
		   
		   <tr><td align="right" colspan="2">FLAME PICTURE:
		   <select >
		   <option>pass</option>
		   <option>fail</option>                   
		   </select></td><td><input type="file" name="fileupload" value="fileupload" id="fileupload"></td></tr>	
		   
           <tr><td rowspan=2>SPRING EXPRELIEF</td><td>TOP LEFT:<input type="text" name="">N</td><td colspan="5">TOP RIGHT:<input type="text" name="">N</td></tr>

           <tr><td>BOTTOM:<input type="text" name="">N</td><td colspan="5">BOTTOM RIGHT:<input type="text" name="">N</td></tr> 
		   
		   <tr><td colspan ="10" align="center"><a href="homepage.html">Return to Home Page</a></td></tr>
		   
		 </table></center>                    
		</form>                               
		                                      
</body>                                       
                                              
                                              
</html>  
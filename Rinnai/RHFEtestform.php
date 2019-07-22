
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
                                              
	<form action="Rhftestform.php" method="POST" >
	                                            
		   <center><table border ="1 dousolid">
		   <tr><td  colspan="10" align="center"><img src="rinnai.png" width="300" height="90" ></td></tr>                                 
                                              
		   <tr><td colspan="10" align="center" bgcolor="grey">RHFE test form page 1</td></tr>	
		                                      
	       <tr><td align="right">serail no:</td><td><input  type = "text"  name = "serial"></td></tr>	
                                              
	       <tr><td align="right"> gas countrol no:</td><td><input  type = "text"   name= "gascountrol"></td></tr>				   
		                                      
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
		   </select>
		   
		   </td></tr>		          
                                              		   
		                                      
           <tr><td align="right">test no:</td><td><input  type = "text"  name = "test"></td></tr>			   
	                                          
	                                          
	                                          
		   <tr><td colspan="10" align="center" bgcolor="grey">PAT TEST</td></tr>	
		                                      
  	       <tr><td align="right">earth continuity:</td><td><input  type = "text"  name = "earthcontinuity"></td></tr>	
                                              
	       <tr><td align="right">insulation:</td><td><input  type = "text"  name = "insulation"></td></tr>	
         
           <tr><td colspan="2" align="center"> Voltage: 230v±3</td><td  colspan="1" align="center">Frequency:50HZ</td><td  colspan="2" align="center">Flue:S-F</td></tr>		 
           
		   
		   <tr><td colspan="10" align="center" bgcolor="grey">BURNER SECONDARY PRESSURE</td></tr>	
		                                      
	       <tr><td align="right">ignition:</td><td><input  type = "text"  name = "ignition"></td></tr>		   
		                                      
	       <tr><td align="right">PL (STAGE 1):</td><td><input  type = "text"  name = "stage1"></td></tr>				   
		                                      
		   <tr><td align="right">PF (STAGE 3):</td><td><input  type = "text"  name = "stage3"></td></tr>				
		                                      
	       <tr><td align="right">PA (STAGE 4):</td><td><input  type = "text"  name = "stage4"></td></tr>				   
                                              
	       <tr><td align="right">PH (STAGE7):</td><td><input  type = "text"  name = "stage7"></td></tr>

		   
           <tr><td colspan="10" align="center" bgcolor="grey">POV CHARACTERISTIC</td></tr>	
		   
	       <tr><td align="right">STAGE 70:</td><td><input  type = "text"  name = "stage70"></td></tr>				
		                                      
	       <tr><td align="right">STAGE 10:</td><td><input  type = "text"  name = "stage10"></td></tr>				   
		                                      
		   <tr><td align="right">PRE-PURGE PERIOD:</td><td><input  type = "text"  name = "period">Sec</td></tr>			   
	                                          
	       <tr><td align="right">CONV FAN ON:</td><td><input  type = "text"  name = "confanon">Sec</td></tr>					 
		    
           <tr><td align="right">IGNITION TIME:</td><td><input  type = "text"  name = "ignitiontime">Sec</td></tr>		
	                                          
	       <tr><td align="right" >CUT OFF RESPONSE:</td><td><input  type = "text"  name = "response">Sec</td></tr>	

		   
	       <tr><td colspan="10"  align="center" bgcolor="grey">TABLE</td></tr>	
		   
           <tr><td></td><td></td><td>stage7</td><td>stage4</td><td>stage3</td><td>stage1</td><td>extralow</td></tr>

           <tr><td rowspan="2" align="right">COMBUSTION FAN RPM</td><td align="right">Standard</td><td>1810~2010</td><td bgcolor="grey"></td><td>1510~1710</td><td>980~1180</td><td bgcolor="grey"></td></tr>

           <tr><td align="right">Results</td><td><input type="text" name="results1"></td><td bgcolor="grey"></td><td><input type="text" name="results2"></td><td><input type="text" name="results3"></td><td bgcolor="grey"></td></tr>

           <tr><td rowspan="2" align="right">CONVECTIOBN FAN RPM</td><td align="right">Standard</td><td>970~1130</td><td bgcolor="grey"></td><td bgcolor="grey"></td><td bgcolor="grey"></td><td bgcolor="grey"></td></tr>

           <tr><td align="right">Results</td><td><input type="text" name="rpm1"></td><td bgcolor="grey"></td><td bgcolor="grey"></td><td bgcolor="grey"></td><td bgcolor="grey"></td></tr>

           <tr><td rowspan="2" align="right">Electric power WATTS</td><td align="right">Standard</td><td>75~90</td><td bgcolor="grey"></td><td bgcolor="grey"></td><td>53~63</td><td>42~52</td></tr>

           <tr><td align="right">Results</td><td><input type="text" name="watts"></td><td bgcolor="grey"></td><td bgcolor="grey"></td><td><input type="text" name="watts1"></td><td><input type="text" name="watts2"></td></tr>

           <tr><td rowspan="2" align="right">Gas Flow Litres/Minute</td><td align="right">Standard</td><td>16.0~19.0</td><td>12.0~14.0</td><td>9.0~12.0</td><td>4.0~6.0</td><td>0.2~1.5</td></tr>

           <tr><td align="right">Results</td><td><input type="text" name="litres"></td><td><input type="text" name="litres1"></td><td><input type="text" name="litres2"></td><td><input type="text" name="litres3"></td><td><input type="text" name="litres4"></td></tr>                                  

		                                      
	      
		                                      
           <tr><td colspan="10" align="center" bgcolor="grey">COMMENTS</td></tr>			
           <tr><td colspan ="10"><textarea  placeholder ="write comments" name = "text" /></textarea></td></tr>	
                                              
           <tr>
		   <td align="right"  colspan = "3"><input type = "button"  value = "print" onclick ="window.print()"></td>
		   <td align="left" colspan = "5"><input type = "submit"  value = "save">
		   </td></tr>	
           
		   <tr><td colspan ="12" align="center"><a href="homepage.html">Return to Home Page</a></td></tr>
		   
		 </table></center>                    
		</form>                               
		                                      
</body>                                       
                                              
                                              
</html>        
<!DOCTYPE html>                               
<html>                                        
<head>                                        
     <title>DV or non-RHFE test form</title>   
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
	                                            
		   <center><table border ="1" width ="600" height ="300">
		   <tr><td  colspan="5" align="center"><img src="rinnai.png" width="200" height="75" ></td></tr>                                 
                                              
		   <tr><td colspan="5" align="center" bgcolor="grey">DV or non-RHFE test form</td></tr>	
		                                      
	       <tr><td align="right">serail no:</td><td><input  type = "text"  name = "serial"></td></tr>	
                                              
	       <tr><td align="right"> gas countrol no:</td><td><input  type = "text"   name= "gascountrol"></td></tr>				   
		                                      
	       <tr><td align="right">model:</td><td>
		   <select name = "model"><?php while ($row = mysqli_fetch_array($result1)):;?>
		   <option><?php echo $row['model'];?></option>
		   <?php endwhile;?>                  
		   </select></td></tr>		          
                                              
	                                          
		  <tr><td align="right">destination:</td><td>
		  <select name  = "destination"><?php while ($row2 = mysqli_fetch_array($result2)):;?>
		  <option><?php echo $row2['destination'];?></option>
		  <?php endwhile;?>                  
		  </select></td></tr>				   
                                              
		   <tr><td align="right">gse type:</td><td>
		   <select name = "gastype"><?php while ($row3 = mysqli_fetch_array($result3)):;?>
		   <option> <?php echo $row3['gastype'];?></option>
		   <?php endwhile;?>                  
		   </select></td></tr>				   
		                                      
           <tr><td align="right">test no:</td><td><input  type = "text"  name = "test"></td></tr>			   
	                                          
	                                          
	                                          
		   <tr><td colspan="5" align="center" bgcolor="grey">PAT TEST</td></tr>	
		                                      
  	       <tr><td align="right">earth continuity:</td><td><input  type = "text"  name = "earthcontinuity"></td></tr>	
                                              
	       <tr><td align="right">insulation:</td><td><input  type = "text"  name = "insulation"></td></tr>			   
                                              
                                              
		   <tr><td colspan="5" align="center" bgcolor="grey">BURNER PRESSURE SETTING</td></tr>	
		                                      
	       <tr><td align="right">line presure:</td><td><input  type = "text"  name = "linepresure"></td></tr>		   
		                                      
	       <tr><td align="right">set pressure high:</td><td><input  type = "text"  name = "setpressurehigh"></td></tr>				   
		                                      
		   <tr><td align="right">set pressure low:</td><td><input  type = "text"  name = "setpressurelow"></td></tr>				
		                                      
	                                          
		   <tr><td colspan="5" align="center" bgcolor="grey">FLAME ROD CURRENT</td></tr>	
		                                      
	       <tr><td align="right">stage:</td><td><input  type = "text"  name = "stage1"></td></tr>				   
                                              
	       <tr><td align="right">front:</td><td><input  type = "text"  name = "front1"></td></tr>				   
                                              
	       <tr><td align="right">stage:</td><td><input  type = "text"  name = "stage"></td></tr>				
		                                      
	       <tr><td align="right">front</td><td><input  type = "text"  name = "front"></td></tr>				   
	                                          
		                                      
		                                      
		   <tr><td colspan="5" align="center" bgcolor="grey">RUN LEAKAGE</td></tr>	
		                                      
		   <tr><td align="right">hight:</td><td><input  type = "text"  name = "hight1"></td></tr>			   
	                                          
	       <tr><td align="right">stage:</td><td><input  type = "text"  name = "low1"></td></tr>					 
		                                      
	                                          
		   <tr><td colspan="5" align="center" bgcolor="grey">RUN CURRENT</td></tr>	
		                                      
	       <tr><td align="right">hight:</td><td><input  type = "text"  name = "hight"></td></tr>		
	                                          
	       <tr><td align="right">stage:</td><td><input  type = "text"  name = "low"></td></tr>
		                                      
           <tr><td colspan="5" align="center" bgcolor="grey">COMMENTS</td></tr>			
           <tr><td colspan ="5"><textarea  placeholder ="write comments" name = "text" /></textarea></td></tr>	
                                              
           <tr>
		   <td align="right"><input type = "button"   value = "print" onclick ="window.print()"></td>
		   <td align="left"><input type = "submit"  value = "save">
		   </td></tr>	
           
		   <tr><td colspan ="5" align="center"><a href="homepage.html">Return to Home Page</a></td></tr>
		   
		 </table></center>                    
		</form>                               
		                                      
</body>                                       
                                              
                                              
</html>                                       
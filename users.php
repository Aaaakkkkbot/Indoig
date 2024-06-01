<?php
include("phpqrcode/intechost.php");
$servername = $Serverhost;
$username = $Serverusername;
$password = $Serverpassword;
$database = $Serverdatabase;
$conn = new mysqli($servername , $username , $password , $database);
if(!$conn){
    echo " CONNECTION TO DATABSE FAILED";
    
}

$query="select * from id"; 
$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html> 
<html> 
	<head> 
		<title> USERS DETAILS </title> 
	</head> 
	<body> 
	<table align="center" border="1px" style="width:600px; line-height:40px;"> 
	<tr> 
		<th colspan="4"><h2>USERS DETAILS</h2></th> 
		</tr> 
			  <th> SNO </th> 
			  <th> USERNAME </th> 
			  <th> CHAT ID </th> 
			  <th> FUNDS </th> 
			  
		</tr> 
		
		<?php while($rows=mysqli_fetch_assoc($result)) 
		{ 
		?> 
		<tr> <td><?php echo $rows['Sno']; ?></td> 
		<td><?php echo $rows['username']; ?></td> 
		<td><?php echo $rows['chat_id']; ?></td> 
		<td><?php echo $rows['funds']; ?></td> 
		</tr> 
	<?php 
               } 
          ?> 

	</table> 
	</body> 
	</html>
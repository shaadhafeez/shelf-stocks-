<html>
	<head><title>Forgot Password</title>
	<link rel="stylesheet" type="text/css" href="css1.css">
	</head>
	<body>
		<div>
			<form action='' method='POST'><br><br>
				Enter your registered email : <input type="email" name='email'>
				<input type="submit" name='submit' value='Submit'>
			</form>
			<?php 
			session_start();			
			if(isset($_POST['submit'])){
			$email=$_POST['email'];
			$_SESSION['sess_user']=$email;   
			$conn=mysql_connect('localhost','root','');
			mysql_select_db('login');
			$sql=mysql_query("select * from login where email='".$email."'");  
			$num=mysql_num_rows($sql);
			if($num!=0){
			 while($row=mysql_fetch_assoc($sql))  
			{  
			$dbusername=$row['email'];
			$dbpassword=$row['password'];
			}  
				echo "<a href='reset.php'>Reset Password</a>";
			}		
			
			else{
			echo "Invalid email";
			
			}
			}
			?>
			<br><br><a href="login.php">Go Back</a>
		</div>
	</body>
</html>
<html>
<head><title>Reset</title>
<link rel="stylesheet" type="text/css" href="css1.css">

</head>
<body>
<div>

			<form action="" method="POST">
					<fieldset>
					<h1>Reset Password</h1><br>	
					Email<br><?php session_start(); 
					$email=$_SESSION['sess_user'];
					echo ''.$email.'';?><br><br>
					Password <br><input type="password" name="pass"><br><br>
					Confirm Password<br><input type="password" name="cpass"><br><br>
					<input type="submit" name="reset" value=Reset><br><br>	
									
											
					<br>				
					<br>	
					<?php 
					if(isset($_POST['reset']))
					{					
					if(!empty($_POST['pass']) && !empty($_POST['cpass']))
					{
					
					$pass=$_POST['pass'];
					$cpass=$_POST['cpass'];					
					
					$len=strlen($pass);
					$con=mysql_connect('localhost','root','');  
					mysql_select_db('login');  
					$sql=mysql_query("select * from login where email='".$email."'");
					$num=mysql_num_rows($sql);
					if($num==0)
					{
					echo 'Invalid email.';
					}
					else{
					if($pass==$cpass && $len>5)
					{
					$hash=password_hash($pass, PASSWORD_DEFAULT);					
					$row=mysql_fetch_assoc($sql);
    
					$dbemail=$row['email'];  
					$dbhash=$row['password'];  
					$sql="UPDATE login SET password='".$hash."' where email='".$dbemail."'";
					
					$update=mysql_query($sql,$con);
					if(!$update)
					{
					 die('Could not enter data: ' . mysql_error());
					}else
					{
					echo 'Password Updated';
					}
			
    
					}
					elseif($len<6)
					{echo 'Password should be more than 5 characters.';
					}
					else{
					echo 'Passwords do not match';}
			
					
					}
					
					}}
					
					
					
					
					?>	
				
					</fieldset>
					<a href="login.php">Login</a>
			</form>
			
</div>			
</body>
</html>
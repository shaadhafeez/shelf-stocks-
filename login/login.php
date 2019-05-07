<html>
	<head><title>Login Test</title>
	<link rel="stylesheet" type="text/css" href="cssh.css">
	</head>
	<body>
			<div>
			<form action="" method="POST">
					<fieldset>
					<h1><u>Shelf</h1></u><br>
						<h2>Login</h2>
					E-mail <br><input type="email" name="email"><br><br>
					Password <br><input type="password" name="pass"><br><br>
					<input type="submit" name="submit" value="Login"><br><br>
							
					<br><a href="fogot.php">Forgot Password?</a>				
					<br>	
				
					</fieldset>
					<?php  
if(isset($_POST["submit"])){  
  
if(!empty($_POST['email']) && !empty($_POST['pass'])) {  
    $email=$_POST['email'];  
    $pass=$_POST['pass'];  
	$hash = password_hash($pass, PASSWORD_DEFAULT);
  
    $con=mysql_connect('localhost','root','');  
    mysql_select_db('login');  
  
    $query=mysql_query("SELECT * FROM login WHERE email='".$email."'");  
    $numrows=mysql_num_rows($query);  
    if($numrows!=0)  
    {  
    $row=mysql_fetch_assoc($query);
    
    $dbemail=$row['email'];  
    $hash=$row['password'];  
    
  
    if($email == $dbemail && password_verify($pass, $hash))  
    {  
    session_start();  
    $_SESSION['sess_user']=$email;   	
    
    header("Location: home.php");  
      }
	else 
	{  
    
    }  
    } echo "Invalid email or password";
  
} else {  
    echo "All fields are required!";  
}  
}  
?>  	
					<br><p id="reg"><a href="register.php">Register</a></p>
			</form>			
		</div>		
	</body>
</html>
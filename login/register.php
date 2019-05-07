<html>
	<head><title>Registration</title>
	<link rel="stylesheet" type="text/css" href="cssh.css">
	</head>
	<body>
			<div>
			<form action="" method="POST">
					<fieldset>
					<h1>Sign Up</h1><br>					
					E-mail <br><input type="email" name="email"><br><br>
					Password <br><input type="password" name="pass"><br><br>
					<input type="submit" name="submit" value=Register><br><br>
					<p id='back'><a href='login.php'>Login</a></p>
					</fieldset>
					</form>	
<?php 
			 if(isset($_POST["submit"])){  
  
if(!empty($_POST['email']) && !empty($_POST['pass']))
 {  
    $email=$_POST['email'];  	
    $pass=$_POST['pass'];  
	$len=strlen($pass);
	if($len<6)
		{echo "Password should be more than 5 characters.";
		}
	else
		{$hash = password_hash($pass, PASSWORD_DEFAULT);
	
		$con=mysql_connect('localhost','root','');  
		mysql_select_db('login');  
  
		$query=mysql_query("SELECT * FROM login WHERE email='".$email."'");  
		$numrows=mysql_num_rows($query);  
		if($numrows!=0)  
			{  
				echo "Account already registered!<br>"  ;      
			} 
	if(!preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^",$email))
		{ 
			echo "<center>Invalid email</font></center>";
			}
	else {  
  
    $sql="INSERT INTO `login`(`email`, `password`) VALUES ('".$email."','".$hash."')"; 	
	$retval = mysql_query( $sql, $con );
   
   if(! $retval ) {
      die('Could not enter data: ' . mysql_error());
   }   
   echo "Entered data successfully\n";   
   mysql_close($conn);
	header("Location: login.php");  
	
    }  
  
}
} else 
	{  
    echo "All fields are required!";  
	}  
}
			?>					
		</div>
			
	</body
</html>
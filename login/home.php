<html>
<head><title>Update Info</title>
<link rel="stylesheet" type="text/css" href="cssh.css">
<script type="text/javascript">
var citiesByState = {
MP: ["Bhopal","Indore","Jabalpur"],
Maharashtra: ["Mumbai","Pune","Nagpur"],
Kerala: ["kochi","Kanpur"]
}
function makeSubmenu(value) {
if(value.length==0) document.getElementById("cities").innerHTML = "<option></option>";
else {
var citiesOptions = "";
for(cityId in citiesByState[value]) {
citiesOptions+="<option>"+citiesByState[value][cityId]+"</option>";
}
document.getElementById("cities").innerHTML = citiesOptions;
}
}

function resetSelection() {
document.getElementsById("states").selectedIndex = 0;
document.getElementsById("cities").selectedIndex = 0;
}
</script>

</head>
<body>
		<div>
			<form action="stocks.php" method="POST">
					<fieldset>
					<h1>Profile Setup</h1><br>					
					Name <br><input type="text" name="uname"><br><br>
					Phone Number<br><input type="text" name="phone"><br><br>
					State<br><select id="states" name='states' onchange="makeSubmenu(this.value)">
										<option value="">Select State</option>
										<option>MP</option>
										<option>Maharashtra</option>
										<option>Kerala</option>
											
									</select><br><br>
					City<br><select id="cities" name='cities' size="1" >
										<option value="" disabled selected>Select City</option>
										<option></option>
								</select><br><br>
					<input type="submit" name="submit" value=Submit><br><br>
					
							
								
					<br>	
					<?php 

if(isset($_POST['submit']))
	{
	 session_start();
	$con=mysql_connect('localhost','root','');  
	mysql_select_db('login'); 	
	$phone=$_POST['phone'];
	$uname=$_POST['uname'];
	$email=$_SESSION['sess_user'];
	$len=strlen($phone);
	$state = $_POST['states'];
	$city = $_POST['cities'];
	$sql="UPDATE login SET name = '".$uname."', city='".$city."',state='".$state."',phone='".$phone."' WHERE email='".$email."' ";
	$err=0;
	if($len!=10 || !is_numeric($phone))
		{
		echo 'Enter a valid Phone number';
		$err=1;
		}
	if(!ctype_alpha($uname))
		{
		echo '<br>Enter a valid name.';
		$err=1;
		}
	if($err==0)
		{
		$update=mysql_query($sql,$con);
					if(!$update)
					{
					 die('Could not update: ' . mysql_error());
					}else
					{
					echo 'ProfileUpdated';
					
					}
		
		}
		
	}
	




?>
				
					</fieldset>
					<a  href='logout.php'>Logout</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href='stocks.php'><span style="color:blue;">Skip to Stocks</span></a>
			</form>
		




</div>
</body>
</html>
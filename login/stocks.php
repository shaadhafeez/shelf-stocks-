<html>
<head><title>Stocks</title>
<link rel="stylesheet" type="text/css" href="css1.css">
</head>
<body>
<div>
<h2>Stocks</h2>
<form action='' method='POST'>
<table align='center'>
	<tr style='color:red;'>
		<th>Brand</th>
		<th>Category</th>
		<th>Model </th>
		<th>Quantity</th>
		<th>Price(Rs)/unit</th>
	</tr>
	<?php 
		session_start();
		$email=$_SESSION['sess_user'];		
		$con=mysql_connect('localhost','root','');  
		mysql_select_db('login'); 		
		$result=mysql_query("select * from stocks where email='".$email."'");		
		$numrows=mysql_num_rows($result);
		if($numrows!=0)
			{
			
			while($row=mysql_fetch_array($result))
			echo "<tr>
						<td>".$row['brand']."</td>
						<td>".$row['category']."</td>
						<td>".$row['model']."</td>
						<td>".$row['quantity']."</td>
						<td>".$row['price']."</td>
						</tr>
						
					";
			}
		
	?>
			
</table><br>
<a  href='logout.php'><span style="color:blue;">Logout</a></span> &nbsp;&nbsp;&nbsp;&nbsp;
<a  href='edit.php'>Edit</a>&nbsp;&nbsp;&nbsp;&nbsp;
<a  href='insert.php'>Insert</a> &nbsp;&nbsp;&nbsp;&nbsp;



</form>
</div>
</body>
</html>
<html>
<head><title>Insert Data</title>
<link rel="stylesheet" type="text/css" href="css1.css">
</head>
<body>
<div>
<h2>Insert Data</h2>
<form action='' method="POST">	
	<table align='center'>
	<tr style='color:red;'>
		<th>Brand</th>
		<th>Category</th>
		<th>Model </th>
		<th>Quantity</th>
		<th>Price(Rs)</th>
	</tr>
	<tr>
						<td><select id='brand'  name='brand' onclick="makeSubmenu(this.value)" value="">
						<option>Samsung</option>
						<option>Sony</option>
						<option>Apple</option></select></td>					
						<td><select id="cat" name='cat' onclick="makeSubmenu1(this.value)">
										<option value="" disabled selected>Select Brand</option>
										<option></option>
								</select>
						</td>
						<td><select id="model" name='model'>
										<option value="" disabled selected>Select Category</option>
										<option></option>
								</select>
						</td>
						<td><input type='text' id='quantity' name='quantity' value=''></td>
						<td><input type='text' id='price' name='price' value=''></td>
								
									
					</tr>
					<script>
					
	var catByBrand = 
	{
	Samsung: ["Mobile","TV","AC"],
	Sony: ["Mobile","TV","Headphone","Speaker"],
	Apple: ["Computer","Mobile"]
	}
	function makeSubmenu(value) 
	{
		if(value.length==0) document.getElementById("cat").innerHTML = "<option></option>";
		else 
		{
			var catOptions = "";
			for(catId in catByBrand[value]) 
				{
					catOptions+="<option>"+catByBrand[value][catId]+"</option>";		
				}
			document.getElementById("cat").innerHTML = catOptions;
		}
	}
	var ModelByCat = 
	{
	Mobile: ["3G",'4G','5G'],
	TV: ["HD","FullHD","4K"],
	AC: ["1Ton","2Ton","3Ton"],
	Headphone: ['Overhead','In-ear','Bluetooth'],
	Speaker: ['Wired','Bluetooth'],
	Computer:['MacOS-10.1','MacOS-10.2','MacOS-10.3']
	}
	function makeSubmenu1(value) 
	{
		if(value.length==0) document.getElementById("model").innerHTML = "<option></option>";
		else 
		{
			var ModelOptions = "";
			for(modelId in ModelByCat[value]) 
				{
					ModelOptions+="<option>"+ModelByCat[value][modelId]+"</option>";		
				}
			document.getElementById("model").innerHTML = ModelOptions;
		}
	}
	
    
</script>
</table>
				
<br><br>
<input type="submit" name='submit' value='Add'><br><br>
	
</form>
<?php 	
	if(isset($_POST['submit']))
	{
		
			session_start();
			$con=mysql_connect('localhost','root','');  
			mysql_select_db('login'); 				
			$email=$_SESSION['sess_user'];			
			$brand=$_POST['brand'];			
			$cat=$_POST['cat'];
			$model=$_POST['model'];
			$quantity=$_POST['quantity'];
			$price=$_POST['price'];
			
			
			
			
		
			$sql=" INSERT INTO `stocks`(`email`, `category`, `brand`, `model`, `quantity`, `price`) VALUES ('".$email."','".$cat."','".$brand."','".$model."','".$quantity."','".$price."')  ";
			$update=mysql_query($sql,$con);			
					if(!$update)
					{
				 die('Could not update: ' . mysql_error());
					}
		else
				{
				echo "<br><br>Updated stocks <br>";				
				}	
	}
	
	
?>
<a href=stocks.php>View Stocks</a>
</div>
</body>
</html>
<html>
<head><title>Stocks</title>
<link rel="stylesheet" type="text/css" href="css1.css">
</head>
<body>
<form action='' method='POST'>
<div>
<h2>Stocks</h2>
<h4>Note: Select Brand then category then model</h4>

<table align='center'>
	<tr style='color:red;'>
		<th>Brand</th>
		<th>Category</th>
		<th>Model </th>
		<th>Quantity</th>
		<th>Price(Rs)</th>
		<th>Delete</th>
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
			$serial=0;
			while($row=mysql_fetch_array($result))
				{
						
						$dbcat=$row['category'];						
						$dbbrand=$row['brand'];
						$dbmodel=$row['model'];
						$dbquantity=$row['quantity'];
						$dbprice=$row['price'];	
						$dbid[]=$row['id'];
						$c=count($dbid);						
						
						
						
						
						
						
						
					?>					
					<tr>
						<td><select id='<?php echo $serial ?>' name='brand[]' onclick="makeSubmenu(this.value,this.id)" value=""><option selected ><?php echo $dbbrand ?></option>
						<option>Samsung</option>
						<option>Sony</option>
						<option>Apple</option>			
						
						</select></td>
					<td><select id='cat<?php echo $serial ?>' name='cat[]' onclick="makeSubmenu1(this.value,this.id)" value=""><option selected><?php echo $dbcat ?></option>
						<option></option>
						</select></td>
						<td><select id='modelcat<?php echo $serial?>' name='model[]'><option selected value='<?php echo $dbmodel ?>'><?php echo $dbmodel ?></option></select></td>
						<td><input type='text' id='quan' name='quantity[]' value='<?php echo $dbquantity ?>'></td>
						<td><input type='text' id='price' name='price[]' value='<?php echo $dbprice ?>'></td>		
						<td><input type='checkbox' name='check[]' value='<?php echo $dbid[$serial] ?>'>					
					</tr>
					
					<script>
					
	var catByBrand = 
	{
	Samsung: ["Mobile","TV","AC"],
	Sony: ["Mobile","TV","Headphone","Speaker"],
	Apple: ["Computer","Mobile"]
	}
	function makeSubmenu(value,id) 
	{
		if(value.length==0) document.getElementById("cat"+id).innerHTML = "<option></option>";
		else 
		{
			var catOptions = "";
			for(catId in catByBrand[value]) 
				{
					catOptions+="<option>"+catByBrand[value][catId]+"</option>";		
				}
			document.getElementById("cat"+id).innerHTML = catOptions;
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
	function makeSubmenu1(value,id) 
	{
		if(value.length==0) document.getElementById("model"+id).innerHTML = "<option></option>";
		else 
		{
			var ModelOptions = "";
			for(modelId in ModelByCat[value]) 
				{
					ModelOptions+="<option>"+ModelByCat[value][modelId]+"</option>";		
				}
			document.getElementById("model"+id).innerHTML = ModelOptions;
		}
	}
	
    
</script>
					<?php
					$len=$serial;
					$serial++;
					
				}
				
					
				
				
			}
		
	?>
		
			
</table><br>
<input type='submit' name='submit' onclick='stocks.php' value='Update'>

<?php 
	if(isset($_POST['submit']))
	{	
		
			$brand=$_POST['brand'];			
			$cat=$_POST['cat'];
			$model=$_POST['model'];
			$quantity=$_POST['quantity'];
			$price=$_POST['price'];
			$check=$_POST['check'];
			
			$a=count($brand);
			
			for($i=0;$i<$a;$i++)
		{	
			$sql="Update stocks SET brand='".$brand[$i]."',category='".$cat[$i]."',model='".$model[$i]."',quantity='".$quantity[$i]."',price='".$price[$i]."' where id='".$dbid[$i]."'  ";
			$update=mysql_query($sql,$con);
			echo "<meta http-equiv='refresh' content='0'>";
			
			
					
		
		
		
		}
		if(!$update)
					{
				 die('Could not update: ' . mysql_error());
					}else
					{
					echo "<br><br>Updated Stocks <br>";
					
					
					}
		foreach($check as $selected)
		{
			$sql=" DELETE FROM `stocks` WHERE id='".$selected."'  ";
			$delete=mysql_query($sql,$con);
			
		}
	}
?>
<br><br><a href=stocks.php>View Stocks</a>
</div>

</form>
</body>

</html>
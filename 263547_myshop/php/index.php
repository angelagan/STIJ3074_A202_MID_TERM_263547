<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" type="image" href="../images/fairy_mart_logo.png">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="/263547_myshop/css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
	<div class="header">
		<img src="../images/fairy_mart_logo.png" />
		<h1>Fairy Mart</h1>
		<p>Welcome to Fairy Mart ! &#128512; </p>
	</div>

	<div class="navbar">
		<a href=" " class="right">Log Out <i class="fa fa-sign-out"></i></a>
	</div>

	<div>
		<h3>Featured Product</h3>
		<div class="row">
		<?php
			$conn = mysqli_connect("localhost","root","") or die("Unable to connect");
			mysqli_select_db($conn,"myshopdb");
			
			$sql ="SELECT * FROM tbl_products";
			$result=mysqli_query($conn,$sql);
			if(mysqli_num_rows($result)>0){
				while($row=mysqli_fetch_assoc($result)){
				?>
				
					<div class="column">
						<div class="card">
							<img src = "/263547_myshop/images/<?php echo $row['primage'];?>" width=100% height=100%>
							<p class="category">Product Name: &nbsp&nbsp<?php echo $row['prname']; ?></p>
							<p class="category">Product Type: &nbsp&nbsp<?php echo $row['prtype']; ?></p>
							<p class="category">Product Price (RM): &nbsp&nbsp<?php echo $row['prprice']; ?></p>
							<p class="category">Product Quantity (kg): &nbsp&nbsp<?php echo $row['prqty']; ?></p>
						</div>
					</div>
				
				<?php
				}
			}
		?>
		</div>

	<div>
		<a href="/263547_myshop/php/newproduct.php" class="float"> <i class="fa fa-plus my-float"></i>
		<span class="addproduct">Add Product</span></a>
	</div>

	<div class="footer">
		<footer>&copy; Copyright 2021 Fairy Mart. Design By Angela</footer>
	</div>
</body>

</html>
<?php
    include_once("dbconnect.php");
    if(isset($_POST['submit'])){
        $filename = $_FILES['primage']['name'];
        $filetmpname = $_FILES['primage']['tmp_name'];
        $folder  = '/home8/doubleks/public_html/263547_myshop/images/';
        $primage = $_FILES['image']['name'];
        $prname  = $_POST['prname'];
        $prtype  = $_POST['prtype'];
        $prprice = $_POST['prprice'];
        $prqty  = $_POST['prqty'];
       
        move_uploaded_file($filetmpname,$folder.$filename);

           $sqladd = "INSERT INTO tbl_products(primage,prname,prtype,prprice,prqty) VALUES('$filename','$prname','$prtype','$prprice','$prqty')";
           try{
               $conn->exec($sqladd);
               echo "<script> alert('Add Success.')</script>";
               echo "<script> window.location.replace('../php/index.php')</script>";
           }catch(PDOException $e){
               echo "<script> alert('Add Failed')</script>";
               echo "<script> window.location.replace('../php/newproduct.php')</script>";
           }
        }
   ?>

<!DOCTYPE html>
<html>

<head>
	<title>New Product Form</title>
	<link rel="shortcut icon" type="image" href="../images/fairy_mart_logo.png">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="../js/validate.js"></script>
	<link rel="stylesheet" href="../css/style.css">
</head>

<body>
	<div class="header">
		<img src="../images/fairy_mart_logo.png" />
		<h1>Fairy Mart</h1>
		<p>Welcome to Fairy Mart ! &#128512; </p>
	</div>

	<div class="navbar">
		<a href="../php/index.php" class="right">Back to Main Page <i class="fa fa-level-up"></i></a>
	</div>

	<div class="main">
		<h2>Add New Product</h2>
		<div class="container">
			<form name="newProductForm" action="../php/newproduct.php" onsubmit="return validateNewProductForm()" method="post" enctype="multipart/form-data">
			<div class="row">
                <div class="col-25">
						<i class="fa fa-camera-retro"></i>
						<label for="prname">Product Image</label>
					</div>
					<div class="col-75">
                    <input type="file" name="primage" id="idprimage"><br><br>
					</div>
                </div> 
            <div class="row">
					<div class="col-25">
						<i class="fa fa-lemon-o"></i>
						<label for="prname">Product Name</label>
					</div>
					<div class="col-75">
						<input type="text" id="idprname" name="prname" placeholder="Product Name..">
					</div>
				</div>
				<div class="row">
					<div class="col-25">
						<i class="	fa fa-shopping-basket"></i>
						<label for="prtype">Product Type</label>
					</div>
					<div class="col-75">
						<select name="prtype" id="idprtype">
							<option value="noselection">Please Select Product Type</option>
							<option value="Citrus">Citrus</option>
							<option value="Stone Fruit">Stone Fruit</option>
                            <option value="Tropical and Exotic">Tropical and Exotic</option>
                            <option value="Berries">Berries</option>
                            <option value="Melons">Melons</option>
                        </select>
					</div>
				</div>
				<div class="row">
					<div class="col-25">
						<i class="fa fa-money"></i>
						<label for="prprice">Product Price (RM) </label>
					</div>
					<div class="col-75">
						<input type="text" id="idprprice" name="prprice" placeholder="Product Price.." min="1.00" max="999.00">
					</div>
				</div>
				<div class="row">
					<div class="col-25">
						<i class="fa fa-bars"></i>
						<label for="prqty">Product Quantity (kg)</label>
					</div>
					<div class="col-75">
                    <input type="number" id="idprqty" name="prqty" placeholder="Product Quantity.." min="1" max="100">
					</div>
				</div>
                <br>
				<div class="row">
					<div><input type="submit" name="submit" value="Add New Product"></div>
				</div>

			</form>

		</div>


	</div>


	<div class="footer">
		<footer>&copy; Copyright 2021 Fairy Mart. Design By Angela</footer>
	</div>

</body>

</html>
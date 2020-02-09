<?php 
session_start();
include("includes/db.php");
include("functions/functions.php");
 ?>
 <?php 
if(isset($_GET['pro_id'])){
	$pro_id =$_GET['pro_id'];
	$get_product="select * from products where product_id='$pro_id'";
	$run_product=mysqli_query($con,$get_product);
	$row_product=mysqli_fetch_array($run_product);
	$p_cat_id=$row_product['p_cat_id'];
	$p_title=$row_product['product_title'];
	$p_price=$row_product['product_price'];
	$p_desc=$row_product['product_desc'];
	$p_img1=$row_product['product_img1'];
	$p_img2=$row_product['product_img2'];
	$p_img3=$row_product['product_img3'];
	$get_p_cat="select * from product_categories where p_cat_id='$p_cat_id'";
	$run_p_cat=mysqli_query($con,$get_p_cat);
	$row_p_cat=mysqli_fetch_array($run_p_cat);
	$p_cat_id=$row_p_cat['p_cat_id'];
	$p_cat_title=$row_p_cat['p_cat_title'];
	

}



  ?>
<!DOCTYPE html>
<html>
<head>
	<title>E Commerce Store</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="styles/style.css">
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	
</head>
<body>
	<div id="top">
		<div class="container">
			<div class="col-md-6 offer">
				<a href="#" class="btn btn-success btn-sm">
				      <?php 
					if (!isset($_SESSION['customer_email'])) {
						echo "WELCOME GUEST";
					}else{
						echo "WELCOME: ".$_SESSION['customer_email'] ." " ;
					}


					 ?>
				</a>
				<a href="#">Shoping Cart Total Price INR <?php totalPrice(); ?>, Total items <?php item(); ?></a>
			</div>
			<div class="col-md-6">
				<ul class="menu">
					<li>
						<a href="customer_registration.php">Register</a>
					</li>
					<li>
						<a href="customer/my_account.php">My Account</a>
					</li>
					<li>
						<a href="checkout.php">Goto Cart</a>
					</li>
					<li>
						<?php 
						if(!isset($_SESSION['customer_email'])){
							echo "<a href='checkout.php'>Login</a>";

						}else{
							echo "<a href='logout.php'>Logout</a>";
						} ?>
					</li>
					
				</ul>


			</div>
			
		</div>
	</div>
	<div class="navbar navbar-default" id="navbar">
		<div class="container">
			<div class="navbar-header">
				<a class="navbar-brand home" href="index.php">
					<img src="images/logo.jpg" width="70" height="40" alt="shopit" class="hidden-xs">
					<img src="images/logo-small.jpg"width="20" height="10" alt="shopit" class="visible-xs">
				</a>
				<button type="button" class="navbar-toggle" data-toggle ="collapse" data-target="#navigation">
					<span class="sr-only">Toggle Navigation</span><i class="fa fa-align-justify"></i>
				</button>
				<button type="button" class="navbar-toggle" data-toggle ="collapse" data-target="#search">
					<span class="sr-only">search</span><i class="fa fa-search"></i>
				</button>
			</div>
			<div class="navbar-collapse collapse" id="navigation">
				<div class="padding-nav"> 
					<ul class="nav navbar-nav navbar-left">
						<li>
							<a href="index.php">Home</a>
						</li>
						<li class="active" >
							<a href="shop.php">Shop</a>
						</li>
						<li >
							<a href="customer/my_account.php">My Account</a>
						</li>
						<li >
							<a href="cart.php">Shopping Cart</a>
						</li>
						<li >
							<a href="about.php">About Us</a>
						</li>
						<li >
							<a href="services.php">Services</a>
						</li>
						<li >
							<a href="contactus.php">Contact Us</a>
						</li>
						
					</ul>
				</div>
				<a href="cart.php" class="btn btn-primary navbar-btn right">
					<i class="fa fa-shopping-cart"></i>
					<span> <?php item(); ?></span>
				</a>

			
				<div  class=" navbar-collapse collapse right">
						<button class="btn navbar-btn btn-primary" type="button" data-toggle="collapse" data-target="#search">
							<span class="sr-only">Toggle Search</span>
							<i  class="fa fa-search "></i>

						</button>
				</div>
		</div>
			<div class="collapse clearfix" id="search">
				<form class="navbar-form" method="get" action="result.php">
					<div class="input-group">
						<input type="text" name="user_query" placeholder="Search" class="form-control" required="">
						<span class="input-group-btn"><button type="submit" value="Search" name="search" class="btn btn-primary">
						<i class="fa fa-search"></i>
						</button></span>
					</div>
				</form>
				
			</div>

		</div>
		<div id="content">
			<div class="container">
				<div class="col-md-12">
					<ul class="breadcrumb">
						<li><a href="home.php">Home</a></li>
						<li>Shop</li>
						<li><a href="shop.php?p_cat=<?php echo $p_cat_id; ?>"><?php echo $p_cat_title; ?></a></li>
						<li><?php echo $p_title; ?></li>
					</ul>
					
				</div>
				<div class="col-md-3">
					<?php
						include("includes/slidebar.php");

					?>
				</div>
				<div class="col-md-9">
					<div class="row" id="productmain">
						<div class="col-md-6">
							<div id="mainimage">
								<div class="carousel slide" id="myCarousel" data-ride="carousel">
									<ol class="carousel-indicators">
										<li data-target="myCarousel" data-slide-to="0" class="active"></li>
										<li data-target="myCarousel" data-slide-to="1"></li>
										<li data-target="myCarousel" data-slide-to="2"></li>
										<li data-target="myCarousel" data-slide-to="3"></li>
										
									</ol>
									<div class="carousel-inner">
										<div class="item active">
											<center>
											<img src="admin_area/product_images/<?php echo $p_img1 ?>">
											</center>
										</div>
										<div class="item"><center>
											<img src="admin_area/product_images/<?php echo $p_img2 ?>">
											 </center>
										</div>
										<div class="item"><center>
											<img src="admin_area/product_images/<?php echo $p_img3 ?>">
											 </center>
										</div>
										
										
									</div>
									<a href="#myCarousel" class="left carousel-control" data-slide="prev">
										<span class="glyphicon glyphicon-chevron-left"></span>
										<span class="sr-only">Previous</span>
									</a>
									<a href="#myCarousel" class="right carousel-control"data-slide="next">
										<span class="glyphicon glyphicon-chevron-right"></span>
										<span class="sr-only">Next</span>
									</a>
									
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="box">
								<h1 class="text-center"> <?php echo $p_title ?></h1>
								<?php addCart(); ?>
								<form action="details.php?add_cart=<?php echo $pro_id ?>" method="post" class="form-horizontal">
									<div class="form-group">
										<label class="col-md-5 control-label">
											product Quantity
										</label>
										<div class="col-md-7">
											<select name="product_qty" class="form-control">
												<option>1</option>
												<option>2</option>
												<option>3</option>
												<option>4</option>
												<option>5</option>
												
											</select>
											
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-5 control-label">
											Product size
										</label>
										<div class="col-md-7">
											<select name="product_size" class="form-control">
												<option>select Sixze</option>
												<option>small</option>
												<option>large</option>
												<option>XL</option>
												<option>XXl</option>
												
												
											</select>
											
										</div>
										
									</div>
									<p class="price">INR <?php echo $p_price ?></p>
									<p class="text-center buttons">
										<button class="btn btn-primary" type="submit"><i class="fa fa-shopping-cart"></i> Add to cart</button>
									</p>
								</form>
							</div>
							<div class="col-xs-4">
								<a href="#" class="thumb">
									<img src="admin_area/product_images/<?php echo $p_img1 ?>" class="img-responsive">
								</a>
							</div>
							<div class="col-xs-4">
								<a href="#" class="thumb">
									<img src="admin_area/product_images/<?php echo $p_img2 ?>" class="img-responsive">
								</a>
							</div>
							<div class="col-xs-4">
								<a href="#" class="thumb">
									<img src="admin_area/product_images/<?php echo $p_img3 ?>" class="img-responsive">
								</a>
							</div>
						</div>
					</div>
					<div class="box" id="details">
						<h4>Product Details</h4>
						<p><?php echo $p_desc; ?></p>
<h4>Size</h4><ul><li>Small</li><li>Large</li><li>Medium</li><li>Extra Large</li></ul>
					</div>
					<div id="same-height-row">
						<div class="col-sm-6 col-md-3">
							<div class="box same-height headline">
								<h3 class="text-center">You May like these product </h3>
								
							</div>
						</div>
						<?php 

						$get_product="select * from products order by 1 LIMIT 0,3";
						$run_product=mysqli_query($con,$get_product);
						while ($row=mysqli_fetch_array($run_product)) {
							$pro_id=$row['product_id'];
							$product_title=$row['product_title'];
							$product_price=$row['product_price'];
							$product_img1=$row['product_img1'];
							echo "
							<div class='center-responsive col-md-3 col-sm-6'>
							<div class='product same-height'>
							<a href='details.php?pro_id=$pro_id'>
							<img src='admin_area/product_images/$product_img1' class='img-responsive'></a>
							<div class='text'>
							<h3><a href='details.php?pro_id=$pro_id'>$product_title</a></h3>
							<p class='price'>$product_price</p>
							</div>
							</div>
							</div>  



							";
						}


						 ?>
						
						
					</div>
				</div>



			</div>
		</div>
	</div>




			<!-- footer -->
<?php
 include("includes/footer.php");
 ?>

		
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>


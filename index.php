<?php 
session_start();
include("includes/db.php");
include("functions/functions.php");
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
						<?php 
							if (!isset($_SESSION['customer_email'])) {
								echo "<a href='checkout.php'>My Account</a>";
							}else{
								echo "<a href='customer/my_account.php?my_order'>My Account</a>";
							}



							 ?>
					</li>
					<li>
						<a href="cart.php">Goto Cart</a>
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
						<li class="active">
							<a href="index.php">Home</a>
						</li>
						<li >
							<a href="shop.php">Shop</a>
						</li>
						<li >
							<?php 
							if (!isset($_SESSION['customer_email'])) {
								echo "<a href='checkout.php'>My Account</a>";
							}else{
								echo "<a href='customer/my_account.php?my_order'>My Account</a>";
							}



							 ?>
						</li>
						<li >
							<a href="cart.php">Shoping Cart</a>
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
					<span> <?php item(); ?> IN CART</span>
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
		
	</div>
	<div class="container" id="slider">
		<div class="col-md-12">
			<div class="carousel slide" id="myCarousel" data-ride="carousel">
				<ol class="carousel-indicators">
					<li data-target="myCarousel" data-slide-to="0" class="active"></li>
					<li data-target="myCarousel" data-slide-to="1"></li>
					<li data-target="myCarousel" data-slide-to="2"></li>
					<li data-target="myCarousel" data-slide-to="3"></li>
					
				</ol>
				<div class="carousel-inner">
					<?php 
					$get_slider="select * from slider LIMIT 0,1";
					$run_slider=mysqli_query($con,$get_slider);
					while ($row=mysqli_fetch_array($run_slider)) {
						
						$slider_image=$row['slider_image'];
						echo "<div class ='item active'>
						<img src='admin_area/slider_images/$slider_image'></div>";

					}

					 ?>
					 	<?php 
					$get_slider="select * from slider LIMIT 1,3";
					$run_slider=mysqli_query($con,$get_slider);
					while ($row=mysqli_fetch_array($run_slider)) {
						
						$slider_image=$row['slider_image'];
						echo "<div class ='item '>
						<img src='admin_area/slider_images/$slider_image'></div>";

					}

					 ?>
					
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
		<div id="advantage">
			<div class="conatiner">
				<div class="same-height-row">
					<div class="col-sm-4">
						<div class="box same-height">
							<div class="icon">
								<i class="fa fa-heart"></i>
								
							</div>
							<h3><a href="#">BEST PRICES</a></h3>
							<p>You Can Check all other sites and Compare Your stuff</p>
						</div>
						
					</div>
					<div class="col-sm-4">
						<div class="box same-height">
							<div class="icon">
								<i class="fa fa-heart"></i>
								
							</div>
							<h3><a href="#">DEALS Eyecatching</a></h3>
							<p>You Can Check all other sites and Compare Your stuff</p>
						</div>
						
					</div>
					<div class="col-sm-4">
						<div class="box same-height">
							<div class="icon">
								<i class="fa fa-heart"></i>
								
							</div>
							<h3><a href="#">FREE PRODUCTS</a></h3>
							<p>You Can Check all other sites and Compare Your stuff</p>
						</div>
						
					</div>
					
				</div>
				
			</div>
			
		</div>
	</div>
	<div id="hotbox">
		<div class="box">
			<div class="container">
				<div class="col-md-12">
					<h2>Latest this week</h2>
				</div>
				
			</div>
		</div>
		
	</div>
<div id="content" class="container">
	<div class="row">
		<?php 
			getPro();
		 ?>
		
	</div>
	
</div>
<!-- footer -->
<?php
include("includes/footer.php");
 ?>

		
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>
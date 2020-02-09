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
						<li>
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
							<a href="cart.php">Shopping Cart</a>
						</li>
						<li >
							<a href="about.php">About Us</a>
						</li>
						<li >
							<a href="services.php">Services</a>
						</li>
						<li class="active" >
							<a href="contactus.php">Contact Us</a>
						</li>
						
					</ul>
				</div>
				<a href="cart.php" class="btn btn-primary navbar-btn right">
					<i class="fa fa-shopping-cart"></i>
					<span><?php item(); ?>items in cart</span>
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
						<li>Contact Us</li>
					</ul>
					
				</div>
				<div class="col-md-3">
					<?php
						include("includes/slidebar.php");

					?>
				</div>
				<div class="col-md-9">
					<div class="box">
						<div class="box-header">
							<center>
								<h2>Contact Us</h2>
								<p class="text-muted">
									if you have any question please feel free to ask we are working 24/7 to serve you
								</p>
							</center>
						
							
						</div >
						<form action="contactus.php" method="post">
							<div class="form-group">
								<label>Name</label>
								<input type="text" name="name" class="form-control
								" required="">
							</div>
							<div class="form-group">
								<label>Email</label>
								<input type="text" name="email" class="form-control
								" required="">
							</div>
							<div class="form-group">
								<label>Subject</label>
								<input type="text" name="submit" class="form-control
								" required="">
								
							</div>
							<div class="form-group">
								<label>Message</label>
								<textarea class="form-control" name="message"></textarea>
								
							</div>
							<div class="text-center">
								<button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-user-md"></i> Send Message </button>
								
							</div>
						</form>
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


<?php 
//admin mail
if (isset($_POST['submit'])) {
	$senderName=$_POST['name'];
	$senderEmail=$_POST['email'];
	$senderSubject=$_POST['subject'];
	$senderMassage=$_POST['massage'];
	$receiverEmail ="chittoriarocks@gmail.com";
	mail($receiverEmail,$senderName,$senderSubject,$senderMassage,$senderEmail);
	//customer mail
	$email=$_POST['email'];
	$subject="Welcome To WEBSITE";
	$msg="We shall get you soon, thanks for contacting";
	$from="chittoriarocks@gmail.com";
	mail($email,$subject,$msg,$from);
	echo "<h2 align='center'>Your mail sent</h2>";
}
 ?>
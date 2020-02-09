<div class="box">
	<?php 
	$session_email=$_SESSION['customer_email'];
	$select_customer="select * from customers where customer_email='$session_email'";
	$run_cust=mysqli_query($con,$select_customer);
	$row_customer=mysqli_fetch_array($run_cust);
	$customer_id=$row_customer['customer_id'];





	 ?>

	<h1 class="text-center">Payment options</h1>
	<p class="lead text-center">
		<a href="order.php?c_id=<?php echo $customer_id ?>">Pay offline</a>
	</p>
	<center>
		<p class="lead">
			<a href="#">Pay with paypal</a>
			<img src="https://cdn-images-1.medium.com/max/1200/1*Dw4-tOJ_9myFUywLd3qzjA.png" width="500" height="270" class="img-responsive">
		</p>
	</center>
</div>
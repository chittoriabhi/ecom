<?php 
$db=mysqli_connect("localhost","root","","ecom");

function getUserIP(){
	switch (true) {
		case (!empty($_SERVER['HTTP_X_REAL_IP']))  :return $_SERVER['HTTP_X_REAL_IP'];
		case(!empty($_SERVER['HTTP_CLIENT_IP']))   :return $_SERVER['HTTP_CLIENT_IP'];
			case(!empty($_SERVER['HTTP_X_FORWARD_FOR'])) :return $_SERVER['HTTP_X_FORWARD_FOR'];
				default : return $_SERVER['REMOTE_ADDR'];
	}
}


function addCart(){
	global $db;
	if(isset($_GET['add_cart'])){
		$ip_add=getUserIP();
		$p_id=$_GET['add_cart'];
		$product_qty=$_POST['product_qty'];
		$product_size=$_POST['product_size'];
		$check_product="select * from cart where ip_add='$ip_add' AND p_id='$p_id'";
		$run_check=mysqli_query($db,$check_product);
		if (mysqli_num_rows($run_check)>0) {
			echo "<script>alert( 'THIS PRODECT IS ALREADY ADDED IN CART')</script>";
			echo "<script>window.open('details.php?pro_id=$p_id','_self')</script>";
		}else{
			$query="insert into cart(p_id,ip_add,qty,size) values('$p_id', '$ip_add','$product_qty','$product_size')";
			$run_query=mysqli_query($db,$query);
			echo "<script>window.open('details.php?pro_id=$p_id','_self')</script>";
		}
	}
}

//item count start

function item(){
	global $db;
	$ip_add=getUserIP();
	$get_items="select * from cart where ip_add='$ip_add'";
	$run_item=mysqli_query($db,$get_items);
	$count=mysqli_num_rows($run_item);
	echo $count;

}
//total price count
function totalPrice(){

global $db;
$ip_add=getUserIP();
$total=0;
$select_cart="select * from cart where ip_add='$ip_add'";
$run_cart=mysqli_query($db,$select_cart);
while ($record=mysqli_fetch_array($run_cart)) {
	$pro_id=$record['p_id'];
	$pro_qty=$record['qty'];
	$get_price="select * from products where product_id='$pro_id'";
	$run_price=mysqli_query($db,$get_price);
	while ($row=mysqli_fetch_array($run_price)) {
		$sub_total=$row['product_price']*$pro_qty;
		$total +=$sub_total;
	}

}

echo $total;

}




function getPro(){
	global $db;
	$get_product="select * from products order by 1 DESC LIMIT 0,6 ";
	$run_products=mysqli_query($db,$get_product);
	while ($row_product=mysqli_fetch_array($run_products)) {

		$pro_id=$row_product['product_id'];
		$pro_title=$row_product['product_title'];
		$pro_img1=$row_product['product_img1'];
		$pro_price=$row_product['product_price'];
		echo "<div class='col-md-4 col-sm-6' >
 	<div class='product'>
 		<a href='details.php?pro_id=$pro_id'>
 			<img src='admin_area/product_images/$pro_img1' class='img-responsive'>

 		</a>
 		<div class='text'>
 			<h3><a href='details.php?pro_id=$pro_id'>$pro_title</a></h3>
 			<p class='buttons'>
 				<a href='details.php?pro_id=$pro_id' class='btn btn-default'>View Details</a>
 				<a href='details.php?pro_id=$pro_id' class='btn btn-primary'><i class='fa fa-shopping-cart'></i> Add to cart</a>
 			</p>
 		</div>
 	</div>
 </div>";
		
	}
	}

	function getPCats(){

		global $db;
		$get_p_cats="select * from product_categories ";
		$run_p_cats=mysqli_query($db,$get_p_cats);
		while ($row_p_cats=mysqli_fetch_array($run_p_cats)) {
			$p_cat_id=$row_p_cats['p_cat_id'];
			$p_cat_title=$row_p_cats['p_cat_title'];
			echo "<li> <a href='shop.php?p_cat_id=$p_cat_id'>$p_cat_title</a></li> ";
			
		}


	}
function getCats(){

		global $db;
		$get_cats="select * from categories ";
		$run_cats=mysqli_query($db,$get_cats);
		while ($row_cats=mysqli_fetch_array($run_cats)) {
			$cat_id=$row_cats['cat_id'];
			$cat_title=$row_cats['cat_title'];
			echo "<li> <a href='shop.php?cat_id=$cat_id'>$cat_title</a></li> ";
			
		}


	}




	function getPcatPro(){
		global $db;
		if(isset($_GET['p_cat_id'])){
			$p_cat_id=$_GET['p_cat_id'];
			$get_p_cat="select * from product_categories where p_cat_id=$p_cat_id";
			$run_p_cat=mysqli_query($db,$get_p_cat);
			$row_p_cat=mysqli_fetch_array($run_p_cat);
			$p_cat_title=$row_p_cat['p_cat_title'];
			$p_cat_desc=$row_p_cat['p_cat_desc'];


			$get_products="select * from products where p_cat_id ='$p_cat_id'";
			$run_products=mysqli_query($db,$get_products);
			$count=mysqli_num_rows($run_products);

			if($count==0){
				echo "<div class='box'>
	<h1>$p_cat_title </h1>
	<p>NO Products Found in this Product Category</p>
</div>";

			}else{
				echo "<div class='box'>
	<h1>$p_cat_title </h1>
	<p>$p_cat_desc</p>
</div>";
			}

			while ($row_products=mysqli_fetch_array($run_products)) {

				$pro_id=$row_products['product_id'];
				$pro_title=$row_products['product_title'];
				$pro_price=$row_products['product_price'];
				$pro_img1=$row_products['product_img1'];
				echo "<div class='col-md-4 col-sm-6 center-responsive'>
	<div class='product'>
		<a href='details.php?pro_id=$pro_id'>
			<img src='admin_area/product_images/$pro_img1' class='img-responsive'>
		</a>
		<div class='text'>
			<h3><a href='details.php?pro_id=$pro_id'>$pro_title</a></h3>
			<p class='price'>$pro_price</p>
			<p class='buttons'>
				<a href='details.php?pro_id=$pro_id' class='btn btn-default'>View Details</a>
				<a href='details.php?pro_id=$pro_id' class='btn btn-primary'><i class='fa fa-shopping-cart'></i> Add to cart</a>
			</p>
		</div>
	</div>
</div>";
			}













		}
	}



//get catagories
	function getCatPro(){
		global $db;
		if (isset($_GET['cat_id'])) {
			$cat_id=$_GET['cat_id'];
			$get_cat="select * from categories where cat_id='$cat_id'";
			$run_cats=mysqli_query($db,$get_cat);
			$row_cat=mysqli_fetch_array($run_cats);
			$cat_title=$row_cat['cat_title'];
			$cat_desc=$row_cat['cat_desc'];
			$get_products="select * from products where cat_id='$cat_id'";
			$run_products=mysqli_query($db,$get_products);
			$count=mysqli_num_rows($run_products);
			{
				if($count==0){
				echo "<div class='box'>
	<h1>$cat_title </h1>
	<p>NO Products Found in this Product Category</p>
</div>";

			}else{
				echo "<div class='box'>
	<h1>$cat_title </h1>
	<p>$cat_desc</p>
</div>";
			}

			while ($row_products=mysqli_fetch_array($run_products)) {

				$pro_id=$row_products['product_id'];
				$pro_title=$row_products['product_title'];
				$pro_price=$row_products['product_price'];
				$pro_img1=$row_products['product_img1'];
				echo "<div class='col-md-4 col-sm-6 center-responsive'>
	<div class='product'>
		<a href='details.php?pro_id=$pro_id'>
			<img src='admin_area/product_images/$pro_img1' class='img-responsive'>
		</a>
		<div class='text'>
			<h3><a href='details.php?pro_id=$pro_id'>$pro_title</a></h3>
			<p class='price'>$pro_price</p>
			<p class='buttons'>
				<a href='details.php?pro_id=$pro_id' class='btn btn-default'>View Details</a>
				<a href='details.php?pro_id=$pro_id' class='btn btn-primary'><i class='fa fa-shopping-cart'></i> Add to cart</a>
			</p>
		</div>
	</div>
</div>";
			}
			}

			
		}
	}






 ?>

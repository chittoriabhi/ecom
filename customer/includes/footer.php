<div id="footer">
  <div class="container">
    <div class="row">
      <div class="col-md-3 col-sm-6">
        <h4>Pages</h4>
         <ul>
           <li><a href="../cart.php">Shoping cart</a></li>
           <li><a href="../contact.php">Contact Us</a></li>
           <li><a href="../shop.php">Shop</a></li>
           <li><a href="../my_account.php">My Account</a></li>
         </ul>
         <hr>
         <h4>Users Section</h4>
         <ul>
           <li><a href="../chechout.php">Login</a></li>
           <li><a href="../customer_registration.php">REGISTER</a></li>
         </ul>
         <hr class="hidden-md hidden-lg hidden-sm">
      </div>
      <div class="col-md-3 col-sm-6">
        <h4>Top Product Catagories</h4>
        <ul>
            <?php 

          $get_p_cats="select * from    product_categories";
          $run_p_cats=mysqli_query($con,$get_p_cats);
          while ($row_p_cats=mysqli_fetch_array($run_p_cats)) {
            
            $p_cat_id=$row_p_cats['p_cat_id'];
             $p_cat_title=$row_p_cats['p_cat_title'];
             echo "  <li><a href='shop.php?p_cat_id=$p_cat_id'>$p_cat_title</a></li>";

          }


           ?>
        </ul>
        <hr class="hidden-md hidden-lg">
      </div>
      <div class="col-md-3 col-sm-6">
        <h4>where to find us</h4>
        <p>
          <strong>chittoria.com</strong>
          <br>NIT Hamirpur
          <br>Himachal Pradesh
          <br>chittoriarocks@gmail.com
          <br>+91 8558903421
        </p>
        <a href="contact.php">Goto contact us page</a>
        <hr class="hidden-lg hidden-md">
      </div>
      <div class="col-md-3 col-sm-6">
        <h4>Get the news</h4>
        <p class="text-muted">
          subscribe here for getting news of NIT hamirpur
        </p>
          <form action="" method="post">
            <div class="input-group">
              <input type="text" name="email" class="form-control">
              <span class="input-group-btn">
                <input type="submit" class="btn btn-default" value="subscribe">
              </span>
              
            </div>
            
          </form><hr>
          <h4>Stay in touch</h4>
          <p class="social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-instagram"></i></a>
            <a href="#"><i class="fa fa-google-plus"></i></a>
            <a href="#"><i class="fa fa-envelope"></i></a>
          </p>
      </div>
      
    </div>
    
  </div>
  
</div>
<div id="copyright">
  <div container>
    <div class="col-md-6">
      <p class="pull-left">
        &copy; 2020 Abhimanyu Singh Chittoria
      </p>
      
    </div>
    <div class="col-md-6">
      <p class="pull-right">
        Template By: <a href="www.bootstrap.com">Bootstrap Learning</a>
      </p>
      
    </div>
  </div>
  
</div>
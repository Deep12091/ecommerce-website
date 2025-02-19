<?php

include('server/connection.php');

if(isset($_GET['product_id'])){
	
	$product_id = $_GET['product_id'];
	
	$stmt = $conn->prepare("SELECT * FROM products  WHERE product_id = ?");
	$stmt->bind_param("i",$product_id);

	$stmt->execute();


	$products = $stmt->get_result();
	
	

	
//no product id was given
}else{
	
	header('location: index.php');
	
}
?>




<?php include('layouts/header.php'); ?>
	 
	<!--single-->
	<section class="container single-product my-5 pt-5">
		<div class="row mt-5">
		<?php while($row = $products->fetch_assoc()){ ?>
		
		
			<div class="col-lg-5 col-md-6 col-sm-12">
				
				<img class="img-fluid w-100 pb-1" src="assets/imgs/<?php echo $row['product_image']; ?>" id="mainImg"/>
				<div class="small-img-group">
					<div class="small-img-col">
						<img src="assets/imgs/<?php echo $row['product_image']; ?>" width="100%" class="small-img"/>
					</div>
					<div class="small-img-col">
						<img src="assets/imgs/<?php echo $row['product_image2']; ?>" width="100%" class="small-img"/>
					</div>
					<div class="small-img-col">
						<img src="assets/imgs/<?php echo $row['product_image3']; ?>" width="100%" class="small-img"/>
					</div>
					<div class="small-img-col">
						<img src="assets/imgs/<?php echo $row['product_image4']; ?>" width="100%" class="small-img"/>
					</div>
				</div>
			</div>
			
			
		
			
			<div class="col-lg-6 col-md-12 col-sm-12">
				<h6><?php echo $row['product_category']; ?><h6>
				<h3 class="py-4"><?php echo $row['product_name']; ?></h3>
				<h2><?php echo $row['product_price']; ?></h2>
				<h6>Size : <?php echo $row['product_size']; ?><h6>
				
					<form method="POST" action="cart.php">
					<input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>" />
					<input type="hidden" name="product_image" value="<?php echo $row['product_image']; ?>" />
					<input type="hidden" name="product_name" value="<?php echo $row['product_name']; ?>" />
					<input type="hidden" name="product_price" value="<?php echo $row['product_price']; ?>" />
					<input type="hidden" name="product_size" value="<?php echo $row['product_size']; ?>" />
					
				<input type="number" name="product_quantity" value="1"/>


			
				




				<button class="buy-btn" type="submit" name="add_to_cart">Add to cart</button>
				</form>
				<h4 class="mt-5 mb-5">Product Details</h4>
				<span><?php echo $row['product_description']; ?>
				</span>
			</div>
			
			<?php } ?>
			
			
			
		</div>
	</section>

	<button class="buy-btn" type="submit"><a href="feedback.php">Click for Feedback</a></button>

	<section>
		<?php include('display_feedback.php');?>
	</section>
	
	

<!--related products-->
<section id="featured" class="my-5 pb5">
  <div class="container text-center mt-5 py-5">
    <h3>Our Featured</h3>
    <hr class="mx-auto">
    <p>Here you can check out our featured products</p>
  </div>
  <div class="row mx-auto container-fluid">

  <?php include('server/get_featured_products.php'); ?>


  <?php while($row= $featured_products->fetch_assoc()) {  ?>


    <div class="product text-center col-lg-3 col-md-4 col-sm-12">
      <img class="img-fluid mb-3" src="assets/imgs/<?php echo $row['product_image']; ?>"/>
      <div class="star">
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
      </div>
      <h5 class="p-name"><?php echo $row['product_name']; ?></h5>
      <h4 class="p-price">Rs. <?php echo $row['product_price']; ?></h4>
      <a href="<?php echo "singleproduct.php?product_id=". $row['product_id']; ?>"><button class="buy-btn">Buy Now</button></a>
    </div>

    <?php } ?>
  </div>
</section>
	
	
	<!--Footer-->
<footer class="mt-5 py-5">
  <div class="row container mx-auto pt-51">
    <div class=" footer-one col-lg-3 col-md-6 col-sm-12">
      <img class="logo" src="assets/imgs/logo.jpg" />
      <p class="pt-3">We Provide the Best products for the most affordable Prices</p>
    </div>
    <div class=" footer-one col-lg-3 col-md-6 col-sm-12">
    <h5 class="pb-2">Featured</h5>
    <ul class="text-uppercase">
      <li><a href="#">men</a></li>
      <li><a href="#">Women</a></li>
      <li><a href="#">Boys</a></li>
      <li><a href="#">Girls</a></li>
      <li><a href="#">New Arrival</a></li>
      <li><a href="#">Clothes</a></li>
    </ul>
    </div>
	
	<div class=" footer-one col-lg-3 col-md-6 col-sm-12">
	<h5 class="pb-2">Contact Us</h5>
		<div>
			<h6 class="text-uppercase">Address</h6>
			<p>1234 Street Name, City</p>
		</div>
		<div>
			<h6 class="text-uppercase">Phone</h6>
			<p>180 045 7878</p>
		</div>
		<div>
			<h6 class="text-uppercase">Email</h6>
			<p>abc@gmail.com</p>
		</div>
	</div>
	<div class=" footer-one col-lg-3 col-md-6 col-sm-12">
	<h5 class="pb-2">Instagram</h5>
	<div class="row">
		<img src="assets/imgs/feature1.jpg" class="img-fluid w-25 h-100 m-2"/>
		<img src="assets/imgs/feature4.jpg" class="img-fluid w-25 h-100 m-2"/>
		<img src="assets/imgs/watch3.jpg" class="img-fluid w-25 h-100 m-2"/>
		<img src="assets/imgs/shoes1.jpg" class="img-fluid w-25 h-100 m-2"/>
		<img src="assets/imgs/feature2.jpg" class="img-fluid w-25 h-100 m-2"/>
	</div>
	</div>
  </div>
  
  <div class="copyright mt-5">
	<div class="row container mx-auto">
		<div class="col-lg-3 col-md-5 col-sm-12 mb-4">
			<img src="assets/imgs/payment1.png"/>
		</div>
		<div class="col-lg-3 col-md-5 col-sm-12 mb-4 text-nowrap mb-2">
			<p>ecommerce @ 2024 ALL Right Reserved</p>
		</div>
		<div class="col-lg-3 col-md-5 col-sm-12 mb-4">
			<a href="https://www.facebook.com/profile.php?id=100030139447507&mibextid=ZbWKwl"><i class="fab fa-facebook"></i></a>
			<a href="https://www.instagram.com/deep_patel_12091?igsh=YWkwaG9vcXUy0W8w"><i class="fab fa-instagram"></i></a>
			
			
		</div>
	</div>
  </div>
  
</footer>
  
  
  
  
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script>
	var mainImg = document.getElementById("mainImg");
	var smallImg = document.getElementsByClassName("small-img");
	
	
	for(let i=0; i<4; i++){
				smallImg[i].onclick = function(){
				mainImg.src = smallImg[i].src;
			}
	}
	

	
	
  </script>
  </body>
</html>
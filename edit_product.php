<?php include('header.php'); ?>


<?php


    if(isset($_GET['product_id'])){

        $product_id = $_GET['product_id'];
        $stmt = $conn->prepare("SELECT * FROM products WHERE product_id=?");
        $stmt->bind_param('i',$product_id);
        $stmt->execute();

        $products = $stmt->get_result();

    }else if(isset($_POST['edit-btn'])){

            $product_id = $_POST['product_id'];
            $title = $_POST['title'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $offer = $_POST['offer'];
            $color = $_POST['color'];
            $category = $_POST['category'];
			$size = $_POST['size'];
            
            $stmt = $conn->prepare("UPDATE products SET product_name=?, product_description=?, product_price=?,
                                    product_special_offer=?, product_color=?, product_category=?, product_size=? WHERE product_id = ?");
            $stmt->bind_param('ssssssis',$title,$description,$price,$offer,$color,$category,$size,$product_id);

            
            if($stmt->execute()){ 
                header('location: products.php?edit_success_message=Product has been updated Successfully');  
            }else{
                header('location: products.php?edit_failure_message=Something went Wrong');
            }
       
           
    
    }else{
        header('location: products.php');
        exit;
    }

?>

<div  class="container-fluid">
    <div class="row" style="min-height:1000px">

    <?php include('sidemenu.php');?>



    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3  border-bottom">
            <h1 class="h2">Dashboard</h2>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group me-2"></div>
            </div>

        </div>


        <h2>Edit Product</h2>
        <div class="table-responsive">

        <div class="mx-auto container">
		    <form id="edit-form" method="POST" action="edit_product.php">
			    <p style="color: red;"><?php if(isset($_GET['error'])){ echo $_GET['error']; }?></p>
                <div class="form-group mt-2">

            <?php foreach($products as $product){ ?>

                    <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>" />

                    <label>Title</label>
				    <input type="text" class="form-control" id="product-name" value="<?php echo $product['product_name']; ?>" name="title" placeholder="Title" required/>
			    </div> 
                <div class="form-group mt-2">
                    <label>Description</label>
				    <input type="text" class="form-control" id="product-description" value="<?php echo $product['product_description']; ?>" name="description" placeholder="Description" required/>
			    </div>
                <div class="form-group mt-2">
                    <label>Price</label>
				    <input type="number" class="form-control" id="product-price" value="<?php echo $product['product_price']; ?>" name="price" placeholder="Price" required/>
			    </div>
                <div class="form-group mt-2">
                    <label>Category</label>
				    <select class="form-select" required name="category">
                        <option value="shoes">Shoes</option>
                        <option value="watches">Watches</option>
                        <option value="phone">Phone</option>
                        <option value="laptop">laptop</option>
                        <option value="coats">coats</option>
                    </select>
			    </div>
                <div class="form-group mt-2">
                    <label>Colour</label>
				    <input type="text" class="form-control" id="product-color" value="<?php echo $product['product_color']; ?>" name="color" placeholder="Colour" required/>
			    </div>
				<div class="form-group mt-2">
                    <label>Size</label>
				    <input type="text" class="form-control" id="product-size" value="<?php echo $product['product_size']; ?>" name="size" placeholder="size" required/>
			    </div>
                <div class="form-group mt-2">
                    <label>Special Offer Price</label>
				    <input type="text" class="form-control" id="product-special-offer" value="<?php echo $product['product_special_offer']; ?>" name="offer" placeholder="sale %" required/>
			    </div>

                <div class="form-group mt-3">
                <input type="submit" class="btn btn-primary" name="edit-btn" value="Edit"/>
			    </div>

            <?php } ?>

            </form>
        </div>
    </main>
</div>
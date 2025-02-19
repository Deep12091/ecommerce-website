<?php include('header.php'); ?>


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


        <h2>Add Product</h2>
        <div class="table-responsive">

        <div class="mx-auto container">
		    <form id="create-form" enctype="multipart/form-data" method="POST" action="create_product.php">
			    <p style="color: red;"><?php if(isset($_GET['error'])){ echo $_GET['error']; }?></p>
                <div class="form-group mt-2">
                <label>Title</label>
				    <input type="text" class="form-control" id="product-name" value="" name="name" placeholder="Title" required/>
			    </div> 
                <div class="form-group mt-2">
                    <label>Description</label>
				    <input type="text" class="form-control" id="product-description" value="" name="description" placeholder="Description" required/>
			    </div>
                <div class="form-group mt-2">
                    <label>Price</label>
				    <input type="number" class="form-control" id="product-price" value="" name="price" placeholder="Price" required/>
			    </div>
                <div class="form-group mt-2">
                    <label>Special Offer Price</label>
				    <input type="number" class="form-control" id="product-price" value="" name="offer" placeholder="sale %" required/>
			    </div>

                <div class="form-group mt-2">
                    <label>Category</label>
				    <select class="form-select" required name="category">
                        <option value="bags">Shoes</option>
                        <option value="shoes">Watches</option>
                        <option value="watches">Phone</option>
                        <option value="laptop">laptop</option>
                        <option value="coats">coats</option>
                    </select>
			    </div>
				
				<div class="form-group mt-2">
                    <label>Size</label>
				    <input type="text" class="form-control" id="product-size" value="" name="size" placeholder="size" required/>
			    </div>


                <div class="form-group mt-2">
                    <label>Color</label>
				    <input type="text" class="form-control" id="product-color" value="" name="color" placeholder="Color" required/>
			    </div>

                <div class="form-group mt-2">
                    <label>Image 1</label>
				    <input type="file" class="form-control" id="product_image1" value="" name="image1" placeholder="image 1" required/>
			    </div>

                <div class="form-group mt-2">
                    <label>Image 2</label>
				    <input type="file" class="form-control" id="product_image2" value="" name="image2" placeholder="image 2" required/>
			    </div>

                <div class="form-group mt-2">
                    <label>Image 3</label>
				    <input type="file" class="form-control" id="product_image3" value="" name="image3" placeholder="image 3" required/>
			    </div>

                <div class="form-group mt-2">
                    <label>Image 4</label>
				    <input type="file" class="form-control" id="product_image4" value="" name="image4" placeholder="image 4" required/>
			    </div>

                <div class="form-group mt-3">
                <input type="submit" class="btn btn-primary" name="create-product" value="Create"/>
			    </div>

            </form>
        </div>



    </div>
</main>
</div>
</div>
<?php include('header.php'); ?>

<?php

    if(!isset($_SESSION['admin_logged_in'])){
        header("Location: login.php");
        exit;
    }

?>


<div  class="container-fluid">
    <div class="row" style="min-height:1000px">

    <?php include('sidemenu.php');?>



    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3  border-bottom">
            <h1 class="h2">Help</h2>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group me-2">

                </div>
            </div>

        </div>

        <div class="container">

        <h3>Contact Us</h3>
			<hr class="mx-auto">
			<p class="w-50 mx-auto">
				<i class="fas fa-phone"><span>1800 049 888</span></i>
			</p>
			<p class="w-50 mx-auto">
				<i class="fas fa-envelope"><span>admin@gmail.com</span></i>
			</p>
			<p class="w-50 mx-auto">
				we work 24/7 to answer your Questions
			</p>


        </div>


        </div>
    </main>
</div>

</div>
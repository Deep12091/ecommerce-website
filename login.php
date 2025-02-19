<?php include('header.php'); ?>

<?php



include('../server/connection.php');

if(isset($_SESSION['admin_logged_in'])){
  header('location: index.php');
  exit;
}

if(isset($_POST['login_btn'])){

  $email = $_POST['email'];
  $password = md5($_POST['password']);

  $stmt = $conn->prepare("SELECT admin_id,admin_name, admin_email, admin_password FROM admins WHERE admin_email = ? AND admin_password = ? LIMIT 1");

  $stmt->bind_param('ss',$email,$password);

  if($stmt->execute()){
      $stmt->bind_result($admin_id,$admin_name,$admin_email,$admin_password);
      $stmt->store_result();

      if($stmt->num_rows() == 1){
        $stmt->fetch();

        $_SESSION['admin_id'] = $admin_id;
        $_SESSION['admin_name'] = $admin_name;
        $_SESSION['admin_email'] = $admin_email;
        $_SESSION['admin_logged_in'] = true;

        header('location: index.php?message=logged in successfully');

      }else{
        header('location: login.php?error=could not verify your account');
      }

  }else{
    //error
    header('location: login.php?error=Something Went  wrong! Try Again Later');

  }


}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ecommerce website</title>
    <link rel="stylesheet" href="assets/css/style.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>

  </head>
  <body>

<!--login-->
<section class="my-5 py-5">
	<div class="container text-center mt-3 pt-5">
		<h2 class="form-weight-bold">Admin Login<h2>
		<hr class="mx-auto">
	</div>
	<div class="mx-auto container">
		<form id="login-form" enctype="multipart/form-data" action="login.php" method="POST">
      <p style="color:red" class="text_center"><?php if(isset($_GET['error'])){echo $_GET['error'];} ?></p>
			<div class="form-group mt-2">
				<label>Email</label>
				<input type="email" class="form-control" id="login-email" name="email" placeholder="Email" required/>
			</div>
			<div class="form-group mt-2">
				<label>Password</label>
				<input type="password" class="form-control" id="login-password" name="password" placeholder="password" required/>
			</div>
			<div class="form-group mt-3">
				<input type="submit" class="btn btn-primary" id="login-btn" name="login_btn" value="Login"/>
			</div>
			
		</form>
	</div>
  </section>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
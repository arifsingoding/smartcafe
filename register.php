<?php include('database/server.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="login/style.css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="">
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style type="text/css">
		
	background-size: cover;
	height: 350px;
	width: 100%;
    font-family: "Lato", sans-serif  
}
.banner {
    background-image: url(images/background/arona.jpg);
	background-size: cover;
    height: 350px;
	width:100%;
	color: gray;
}
    </style>
</head>
<style>
	.error {
		width: 92%;
		margin: 0px auto;
		padding: 10px;
		border: 1px solid #a94442;
		color: #a94442;
		background: #f2dede;
		border-radius: 5px;
		text-align: left;
	}
	.select {
		display: block;
  		width: 100%;
  		height: calc(1.5em + 0.75rem + 2px);
		color: #495057;
		font-size: 1rem;
  		font-weight: 400;
  		line-height: 1.5;
		background-color: #fff;
		background-clip: padding-box;
		padding: 0.375rem 0.75rem;
		border-radius: 0.25rem;
	}
</style>
<body>
	
	<div class="card p-5 mb-5">
	<section class="ftco-section p-3 mb-2 bg-warning text-dark">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
		      	<h3 class="mb-4 text-center">Selamat Datang<br>Member baru</h3>
		      	<form action="register.php" method="post" class="signin-form">
				  <?php include('database/errors.php'); ?>
		      		<div class="form-group">
		      			<input type="text" class="form-control" name="username" placeholder="Username">
		      		</div>
					<div class="form-group">
						<input type="text" class="form-control" name="email" placeholder="Email">
					</div>
					<div class="form-group">
						<input type="password" class="form-control" name="password_1" placeholder="Password">
					</div>
					<div class="form-group">
						<input type="password" class="form-control" name="password_2" placeholder="Confirm Password">
					</div>
					<div>
						<input type="hidden" value="pelanggan" name="level">
					</div>
	            	<div class="form-group">
	            		<button type="submit" class="form-control btn btn-primary submit px-3" name="reg_user">Daftar!</button>
	            	</div>
	          	</form>
		      </div>
				</div>
			</div>
		</div>
		<center>
		<p>
			Sudah Punya Akun?
			<a href="index.php"><br>
				Klik Login Sekarang!
			</a>
		</p>
		</center>
	</section>

	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
</body>
</html>
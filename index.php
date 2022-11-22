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
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
body {background-image: url("https://decorindoperkasa.com/wp-content/uploads/2021/02/Tips-Memilih-Wallpaper-untuk-Cafe-yang-Menarik-Pelanggan.jpg");
	background-size: cover;
	height: 350px;
	width: 100%;
    font-family: "Lato", sans-serif  
}

.mySlides {display: none}
.logo{
        margin: auto;
        width: fit-content;
        padding-top: 30px;
    }
</style>
<body>
<div class="logo">
    
</div>
<center>
	<div class="card text mt-5" style= "width: 24rem;">
	<div class=" banner card-header fw-bold py-4">
           <h2 style="color:blue;"><b>LOGIN</b><h2>
        </div>
		<div class="card-body p-3 mb-2 bg-light text-dark">
		<hr>
		<form action="index.php" method="post" class="signin-form">
			<table>
				<tr>
					<td>Username  :</td><td><input type="text" class="form-control" name="username" size="20" autocomplete="off"></td>
				</tr>
				<tr>
					<td>Password  :</td><td><input id="password-field" type="password" class="form-control" name="password" size="20" autocomplete="off"></td>
				</tr>
			</table>
			<br>
			<div class="form-group">
	            	<button type="submit" class="form-control btn btn-primary submit px-3" name="login_user">Log In</button>
	            </div>
		</form>
</div>
<center>
		<p>
			Member baru?
			<a href="register.php"><br>
				Klik Daftar Sekarang Juga!
			</a>
		</p>
		</center>
</div>

	<br>

    <script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
</body>
</html>
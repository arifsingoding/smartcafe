<?php
include 'database/koneksi.php';
// Starting the session, to use and
// store data in session variable
session_start();

// If the session variable is empty, this
// means the user is yet to login
// User will be sent to 'login.php' page
// to allow the user to login
if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You have to log in first";
    header('location: login.php');
}

// Logout button will destroy the session, and
// will unset the session variables
// User will be headed to 'login.php'
// after logging out
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
}

if (isset($_POST['simpan'])) {
  $product_name = $_POST['product_name'];
  $product_price = $_POST['product_price'];
  $kategori = $_POST['kategori'];
  $product_qty = $_POST['product_qty'];
  $product_image = $_POST['product_image'];

  $query = "INSERT INTO product (product_name, product_price, kategori, product_qty, product_image) VALUES ('$product_name', '$product_price', '$kategori', '$product_qty', '$product_image')";
  $sql = mysqli_query($conn, $query);

  if ($sql)  {
    header('Location: daftar_menu.php?sukses');
  } else {
    echo "<script>alert('Data gagal ditambahkan')</script>";
  }
}
   ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="index.css">
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">

    <title>Tambah Menu</title>
    <link rel="stylesheet" href="produk/style.css">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css' />
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />
  <link rel="stylesheet"href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css"/>
    <style>
    li {list-style: none;
        margin: 20px 0 20px 0;}

    a {text-decoration: none;}
    .sidebar {
        width: 250px;
        height: 100vh;
        position: fixed;
        margin-left: -300px;
        transition: 0.4s;
    }

    .active-main-content {
        margin-left: 250px;
    }

    .active-sidebar {
        margin-left: 0;
    }

    #main-content {
        transition: 0.4s;
    }
</style>
</head>
<body >
<div> 
  <div class="fixed-top">
        <div class="sidebar p-4 bg-dark" id="sidebar">
            <h4 class="mb-5 text-white">MENU</h4>
            <li>
              <a class="text-white" href="halaman_pelanggan">
                <i class="bi bi-house mr-2"></i>
                HOME
              </a>
            </li>
            <li>
              <a class="text-white" href="daftar_menu.php">
                <i class="bi bi-newspaper mr-2"></i>
                DAFTAR MENU
              </a>
            </li>
            <li>
              <a class="text-white" href="transaksi.php">
                <i class="fas fa-shopping-cart mr-2"></i>
                KERANJANG
              </a>
            </li>
            <li>
              <a class="text-white" href="logout.php">
                <i class="bi bi-door-closed mr-2"></i>
                LOG OUT
              </a>
            </li>
          </div>
        </div>
  <!-- Navbar start -->
  <nav class="navbar navbar-expand-md bg-dark navbar-dark">
    <a class="navbar-brand" href="halaman_pelanggan.php">&nbsp;&nbsp;Cafe Kaseo</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav ml-auto">
        <button class="btn btn-dark navbar-brand" id="button-toggle">
            <i class="bi bi-list"></i>
        </button>
        <li class="nav-item">
          <a class="nav-link"><?php echo $_SESSION['username']?></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="daftar_menu.php">Kembali</a>
        </li>
      </ul>
    </div>
  </nav>
  <!-- Navbar end -->
  <center>
  <div class="card text mt-5 " style= "width: 35rem;">
		<form action="" method="post">
		<div class ="card-header fw-bold py-4">
           <b>TAMBAH MENU</b>
        </div>
		<div class="card-body">
			<hr>
			<table cellpadding="5" cellspacing="0">
				<tr><td>Nama Menu </td><td>:</td><td><input type="text" name="product_name" size="20"></td></tr>
				<tr><td>Harga </td><td>:</td><td><input type="text" name="product_price" size="20"></td></tr>
				<tr><td>Kategori </td><td>:</td><td><input type="text" name="kategori" size="20"></td></tr>
        <input type="hidden" name="product_qty" value="1">
                <tr><td>Foto </td><td>:</td><td><input type="file" name="product_image" required /></td>
 		    </tr>
			<tr align="right">
			    <td colspan="3"><input type="submit" value="simpan" name="simpan"> <input type="reset" name="reset"></td>
			</tr>
			</table>
        </div>
    </div>
</center>

    <!-- Awal Footer -->
    <hr class="footer">
      <div class="container">
        <div class="row footer-body">
          <div class="col-md-6">
          <div class="copyright">
            <strong>Copyright</strong> <i class="far fa-copyright"></i> 2022 -  Designed by arifsingoding</p>
          </div>
          </div>

          <div class="col-md-6 d-flex justify-content-end">
          
          </div>
        </div>
      </div>
  <!-- Akhir Footer -->





    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.js"></script>
</body>
<script>
    // event will be executed when the toggle-button is clicked
    document.getElementById("button-toggle").addEventListener("click", () => {

        // when the button-toggle is clicked, it will add/remove the active-sidebar class
        document.getElementById("sidebar").classList.toggle("active-sidebar");

        // when the button-toggle is clicked, it will add/remove the active-main-content class
        document.getElementById("main-content").classList.toggle("active-main-content");
    });
</script>
</html>
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
	header('location: index.php');
}

// Logout button will destroy the session, and
// will unset the session variables
// User will be headed to 'login.php'
// after logging out
if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['username']);
	header("location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet"href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="index.css">
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
    <title>TRANSAKSI</title>
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
  <style>
  .jumbotron {
	background-image: url(images/background/bgcafe2.jpg);
	background-size: cover;
	height: 350px;
	width: 100%;
	color: white;
}
.well {
   background-color: rgba(2, 2, 2, 0.4);
   background-size: cover;
}
  </style>
<body>
<div>
      <div class="fixed-top">
        <div class="sidebar p-4 bg-dark" id="sidebar">
            <h4 class="mb-5 text-white">MENU</h4>
            <li>
              <a class="text-white" href="halaman_admin.php">
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
                <i class="bi bi-cart mr-2"></i>
                TRANSAKSI
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
    <a class="navbar-brand" href="halaman_admin.php">&nbsp;&nbsp;Cafe Kaseo</a>
    <form action="" method="get">
	      <input type="text" name="kata_cari" placeholder="Search.." value="<?php if(isset($_GET['kata_cari'])) { echo $_GET['kata_cari']; } ?>"  />
	      <button type="submit" class=" btn-success"><i class="bi bi-search"></i></button>
      </form>
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
          <a class="nav-link" href="halaman_admin.php">Kembali</a>
        </li>
      </ul>
    </div>
  </nav>
  <!-- Navbar end -->

  
  <table class="table table-bordered" id="example">
        <thead class="thead-light">
          <tr>
            <th scope="col">NO</th>
            <th scope="col">ID</th>
            <th scope="col">Nama Pelanggan</th>
            <th scope="col">Pesanan</th>
            <th scope="col">Total Harga</th>
            <th scope="col">Status</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
        <tr align="center" >
            <?php
            $stmt = $conn->prepare('SELECT * FROM orders');
            $stmt->execute();
            $result = $stmt->get_result();
            if(isset($_GET['kata_cari'])) {
              $kata_cari = $_GET['kata_cari'];
              $query = "SELECT * FROM orders WHERE name like '%".$kata_cari."%' OR status like '%".$kata_cari."%' ORDER BY id ASC";
            } else {
              $query = "SELECT * FROM orders ORDER BY id ASC";
            }
            
            $result = mysqli_query($conn, $query);
    
            if(!$result) {
              die("Query Error : ".mysqli_error($conn)." - ".mysqli_error($conn));
            }
            $no = 0;
            $query = mysqli_query($conn, "SELECT * from orders");
            while ($data = $result->fetch_assoc()):
                $no++;
            ?>
            <tr align="center" class="box7">
                <td><?php echo $no; ?></td>
                <td><?php echo $data['id']; ?></td>
                <td><?php echo $data['name']; ?></td>
                <td><?php echo $data['products']; ?></td>
                <td><?php echo $data['paid']; ?></td>
                <td><?php echo $data['status']; ?></td>
                <td>
                <a href='bayar.php?id="<?= $data['id'] ?>"' class="btn btn-success btn-xm bi bi-pen">BAYAR</a>
               </td>
            </tr>
            <?php endwhile; ?>
        </tr>
        </tbody>
      </table>  


  <hr class="footer">
      <div class="container">
        <div class="row footer-body">
          <div class="mt-6">
          <div class="copyright">
            <strong>Copyright</strong> <i class="far fa-copyright"></i> 2022 -  Designed by arifsingoding</p>
          </div>
          </div>

          <div class="col-md-9 d-flex justify-content-end">
          
          </div>
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
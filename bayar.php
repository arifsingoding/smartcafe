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
if ($_GET['id']) {
    $id =$_GET['id'];
    $query = "SELECT * FROM orders WHERE id=$id";
    $sql = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($sql); 
    if (mysqli_num_rows($sql) < 1) {
      echo "<script>alert('Data tidak ditemukan')</script>";
    }
if (isset($_POST['simpan'])) {
  $name = $_POST['name'];
  $products = $_POST['products'];
  $paid = $_POST['paid'];
  $status = $_POST['status'];

  $query = mysqli_query($conn, "UPDATE orders SET name='$name', products='$products', paid='$paid', status='$status' WHERE id=$id");

  if ($query)  {
    header('Location: transaksi.php');
  } else {
    echo "<script>alert('Data gagal diedit')</script>";
  }
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BAYAR TRANSAKSI</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet"href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="index.css">
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
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
<body>
    <!-- Navbar start -->
  <nav class="navbar navbar-expand-md bg-dark navbar-dark">
    <a class="navbar-brand" href="halaman_admin.php">&nbsp;&nbsp;Cafe Kaseo</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link"><?php echo $_SESSION['username']?></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="transaksi.php"><b>Kembali</b></a>
        </li>
      </ul>
    </div>
  </nav>
  <!-- Navbar end -->
<div>
  <table class="table table-bordered" id="example">
  <form action="" method="post">
        <thead class="thead-light">
          <tr>
            <th scope="col">NO</th>
            <th scope="col">ID</th>
            <th scope="col">Nama Pelanggan</th>
            <th scope="col">Pesanan</th>
            <th scope="col">Total Harga</th>
            <th scope="col">Status</th>
            <th scope="col">Konfirmasi Pembayaran</th>
          </tr>
        </thead>
        <tbody>
        <tr align="center" >
            <?php
            $no = 0;

                $no++;
            ?>
            <tr align="center" class="box7">
                <td><?php echo $no; ?></td>
                <td><?php echo $data['id']; ?></td>
                <td><input type="text" name="name" size="20" value="<?php echo $data['name'];?>" class="border-0" readonly="readonly" /></td>
                <td><input type="text" name="products" size="20" value="<?php echo $data['products'];?>" class="border-0" readonly="readonly" /></td>
                <td><input type="text" name="paid" size="20" value="<?php echo $data['paid'];?>" class="border-0" readonly="readonly" /></td>
                <td><select name="status" id="color">
	                <option value="">Belum Bayar</option>
	                <option value="sudah">Sudah Bayar</option>
                </select></td>
                <td>
                    <a href="transaksi.php" class="btn btn-warning btn-sm">Kembali</a>
                    <input type="submit" class="btn btn-success btn-sm" value="BAYAR" name="simpan">
               </td>
            </tr>
        </tr>
        </tbody>
        </form>
      </table> 
</div> 
<div class="col-md-5">
<a href='cetak1.php?id="<?= $data['id'] ?>"' class="btn btn-warning btn-sm" target="_BLANK">PRINT</a>
</div>

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
</body>
</html>
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
</style>
</head>
<body>
    <br>
    <div class="mt-4" align="center">
        <h1><b>BUKTI PEMBAYARAN</b></h1>
        <h5>CAFE KASEO</h5>
    </div>
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
          </tr>
        </thead>
        <tbody>
        <tr align="center" >
        <?php
        if ($_GET['id']) {
            $id =$_GET['id'];
            $no = 0;
            $query = mysqli_query($conn, "SELECT * FROM orders WHERE id=$id");
            while ($data=mysqli_fetch_array($query)){
              $no++;
            ?>
            <tr align="center" class="box7">
                <td><?php echo $no; ?></td>
                <td><?php echo $data['id']; ?></td>
                <td><?php echo $data['name']; ?></td>
                <td><?php echo $data['products']; ?></td>
                <td><?php echo $data['paid']; ?></td>
                <td>TUNAS</td>
            </tr>
            <?php
            }
        }
            ?>
        </tr>
        </tbody>
        </form>
      </table>
</div>
<div>
    <h6 style="color:lightgray;"><b>*</b>Struk Belanja</h6>
</div>
<script>
		window.print();
</script>
</body>
</html>
<?php
session_start();

if (!isset($_SESSION['username'])) {
	$_SESSION['msg'] = "You have to log in first";
	header('location: login.php');
}

if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['username']);
	header("location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="author" content="Sahil Kumar">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Keranjang</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css' />
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />
  <link rel="stylesheet" href="../produk/style.css">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css' />
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />
  <link rel="stylesheet"href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css"/>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="index.css">
  <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
  <title>Daftar Menu</title>
  <style>
  .jumbotron {
	background-image: url(../images/background/bgcafe.jpg);
	background-size: cover;
	height: 350px;
	width: 100%;
	color: white;
}
.well {
   background-color: rgba(7, 7, 7, 0.4);
   background-size: cover;
}
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

<body class="bg-secondary p-3 mb-2 bg-success text-white">
<div> 
  <div class="fixed-top">
        <div class="sidebar p-4 bg-dark" id="sidebar">
            <h4 class="mb-5 text-white">MENU</h4>
            <li>
              <a class="text-white" href="halaman_pelanggan.php">
                <i class="bi bi-house mr-2"></i>
                HOME
              </a>
            </li>
            <li>
              <a class="text-white" href="menu.php">
                <i class="bi bi-newspaper mr-2"></i>
                DAFTAR MENU
              </a>
            </li>
            <li>
              <a class="text-white" href="cart.php">
                <i class="fas fa-shopping-cart mr-2"></i>
                KERANJANG
              </a>
            </li>
            <li>
              <a class="text-white" href="../logout.php">
                <i class="bi bi-door-closed mr-2"></i>
                LOG OUT
              </a>
            </li>
          </div>
        </div>
  <!-- Navbar start -->
  <nav class="navbar navbar-expand-md bg-dark navbar-dark">
    <!-- Brand -->
    <a class="navbar-brand" href="halaman_pelanggan.php">&nbsp;&nbsp;Cafe Kaseo</a>
    <!-- Toggler/collapsibe Button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <!-- Navbar links -->
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav ml-auto">
      <button class="btn btn-dark navbar-brand" id="button-toggle">
            <i class="bi bi-list"></i>
        </button>
        <li li class="nav-item">
          <a class="nav-link"><?php echo $_SESSION['username']?></a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="halaman_pelanggan.php">Menu</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="checkout.php"></i>Checkout</a>
        </li>
      </ul>
    </div>
  </nav>
  <!-- Jumbotron -->
  <div class="jumbotron jumbotron-fluid text-center" style="height: 400px;" >
        <div class="well">
          <h1 class="display-4"><span class="font-weight-bold">KASEO</span></h1>
          <p class="lead font-weight-bold">Keranjang </p>
          <table class="table table-bordered table-striped text-center" style="color:white;">
            <thead>
              <tr>
                <td colspan="7">
                  <h4 class="text-center text-light">Produk Pesanan Anda!</h4>
                </td>
              </tr>
              <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Produk</th>
                <th>Harga</th>
                <th>Quantity</th>
                <th>Total Harga</th>
                <th>
                  <a href="action.php?clear=all" class="badge-danger badge p-1" onclick="return confirm('Are you sure want to clear your cart?');"><i class="fas fa-trash"></i>&nbsp;&nbsp;Clear Cart</a>
                </th>
              </tr>
            </thead>
            <tbody>
              <?php
                require '../database/koneksi.php';
                $stmt = $conn->prepare('SELECT * FROM cart');
                $stmt->execute();
                $result = $stmt->get_result();
                $grand_total = 0;
                while ($row = $result->fetch_assoc()):
              ?>
              <tr>
                <td><?= $row['id'] ?></td>
                <input type="hidden" class="pid" value="<?= $row['id'] ?>">
                <td><img src="../assets/<?= $row['product_image'] ?>" width="50"></td>
                <td><?= $row['product_name'] ?></td>
                <td>
                  <i>Rp</i>&nbsp;<?= number_format($row['product_price'],2); ?>
                </td>
                <input type="hidden" class="pprice" value="<?= $row['product_price'] ?>">
                <td>
                  <input type="number" class="form-control itemQty" value="<?= $row['qty'] ?>" style="width:75px;">
                </td>
                <td><i>Rp</i>&nbsp;<?= number_format($row['total_price'],2); ?></td>
                <td>
                  <a href="../database/action.php?remove=<?= $row['id'] ?>" class="text-danger lead" onclick="return confirm('Are you sure want to remove this item?');"><i class="fas fa-trash-alt"></i></a>
                </td>
              </tr>
              <?php $grand_total += $row['total_price']; ?>
              <?php endwhile; ?>
              <tr>
                <td colspan="3">
                  <a href="menu.php" class="btn btn-success"><i class="fas fa-cart-plus"></i>&nbsp;&nbsp;Lanjut Belanja</a>
                </td>
                <td colspan="2"><b>Total Harga</b></td>
                <td><b><i>Rp</i>&nbsp;<?= number_format($grand_total,2); ?></b></td>
                <td>
                  <a href="checkout.php" class="btn btn-info <?= ($grand_total > 1) ? '' : 'disabled'; ?>"><i class="far fa-credit-card"></i>&nbsp;&nbsp;Checkout</a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
  <!-- Akhir Jumbotron -->

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <div style="display:<?php if (isset($_SESSION['showAlert'])) {
  echo $_SESSION['showAlert'];
} else {
  echo 'none';
} unset($_SESSION['showAlert']); ?>" class="alert alert-success alert-dismissible mt-3">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong><?php if (isset($_SESSION['message'])) {
  echo $_SESSION['message'];
} unset($_SESSION['showAlert']); ?></strong>
        </div>
        <div class="table-responsive mt-2">
          
        </div>
      </div>
    </div>
  </div>
    <!-- Awal Footer -->
    <hr class="footer" style="padding-top: 50px;">
      <div class="container" style="color:lightgray;">
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

  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>

  <script type="text/javascript">
  $(document).ready(function() {

    // Change the item quantity
    $(".itemQty").on('change', function() {
      var $el = $(this).closest('tr');

      var pid = $el.find(".pid").val();
      var pprice = $el.find(".pprice").val();
      var qty = $el.find(".itemQty").val();
      location.reload(true);
      $.ajax({
        url: 'action.php',
        method: 'post',
        cache: false,
        data: {
          qty: qty,
          pid: pid,
          pprice: pprice
        },
        success: function(response) {
          console.log(response);
        }
      });
    });

    // Load total no.of items added in the cart and display in the navbar
    load_cart_item_number();

    function load_cart_item_number() {
      $.ajax({
        url: 'action.php',
        method: 'get',
        data: {
          cartItem: "cart_item"
        },
        success: function(response) {
          $("#cart-item").html(response);
        }
      });
    }
  });
  </script>
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
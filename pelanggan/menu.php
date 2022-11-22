<?php
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
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Daftar Menu</title>
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
      body {bg-color: dark;
	        width: 100%;
          font-family: "Lato", sans-serif  
}
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

<body class="bg-secondary">
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
          <a class="nav-link" href="checkout.php">Checkout</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fas fa-shopping-cart"></i> <span id="cart-item" class="badge badge-danger"></span></a>
        </li>
      </ul>
    </div>
  </nav>
  <!-- Navbar end -->
  <!-- Jumbotron -->
  
  <!-- Akhir Jumbotron -->
  
  <!-- Displaying Products Start -->
  <br>
  <div class="container">
    <div class="p-3 mb-2 bg-dark text-white">
    <center>
      <h4><b>NIKMATI-LAH MENU SESUKA HATIMU</b></h4>
      </center>
      <form action="" method="get">
	      <input type="text" name="kata_cari" class="btn bg-light" placeholder="Search.." value="<?php if(isset($_GET['kata_cari'])) { echo $_GET['kata_cari']; } ?>"  />
	      <button type="submit" class="btn btn-success"><i class="bi bi-search"></i></button>
      </form>
    </div>
    <div id="message"></div>
    <div class="row mt-2 pb-3">
      <?php
  			include '../database/koneksi.php';
  			$stmt = $conn->prepare('SELECT * FROM product');
  			$stmt->execute();
  			$result = $stmt->get_result();
        if(isset($_GET['kata_cari'])) {
					$kata_cari = $_GET['kata_cari'];
					$query = "SELECT * FROM product WHERE product_name like '%".$kata_cari."%' OR kategori like '%".$kata_cari."%' ORDER BY id ASC";
				} else {
					$query = "SELECT * FROM product ORDER BY id ASC";
				}
				
				$result = mysqli_query($conn, $query);

				if(!$result) {
					die("Query Error : ".mysqli_error($conn)." - ".mysqli_error($conn));
				}
  			while ($row = $result->fetch_assoc()):
  		?>
      <div class="col-sm-6 col-md-4 col-lg-3 mb-2">
        <div class="card-deck">
        <div class="card">
	<div class="content">
		<div class="imgBx">
			<img src="../assets/<?= $row['product_image'] ?>">
		</div>
		<div class="contentBx">
			<h3><?= $row['product_name'] ?></h3>
			<h3><a>Rp</a>&nbsp;<?= number_format($row['product_price'],2) ?>/-</h3>
      <h6 class="text-light"><?= $row['kategori'] ?></h3>
		</div>
	</div>
	<ul class="sci">
		<li>
		  <form action="" class="form-submit">
        <br>
        <div class="row p-2">
          <div>
            <b> Quantity : </b>
          </div>
          <div class="col-md-6">
            <input type="number" class="form-control pqty" value="<?= $row['product_qty'] ?>">
          </div>
        </div>
        <input type="hidden" class="pid" value="<?= $row['id'] ?>">
        <input type="hidden" class="pname" value="<?= $row['product_name'] ?>">
        <input type="hidden" class="pprice" value="<?= $row['product_price'] ?>">
        <input type="hidden" class="pimage" value="<?= $row['product_image'] ?>">
        <input type="hidden" class="pcode" value="<?= $row['product_code'] ?>">
        <button class="btn btn-info btn-block addItemBtn"><i class="fas fa-cart-plus"></i>&nbsp;&nbsp;Add to cart</button>
      </form>
    </li>
	</ul>
</div>
        </div>
      </div>
      <?php endwhile; ?>
    </div>
  </div>
  <!-- Displaying Products End -->
    <!-- Awal Footer -->
    <hr class="footer">
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

    // Send product details in the server
    $(".addItemBtn").click(function(e) {
      e.preventDefault();
      var $form = $(this).closest(".form-submit");
      var pid = $form.find(".pid").val();
      var pname = $form.find(".pname").val();
      var pprice = $form.find(".pprice").val();
      var pimage = $form.find(".pimage").val();
      var pcode = $form.find(".pcode").val();

      var pqty = $form.find(".pqty").val();

      $.ajax({
        url: '../database/action.php',
        method: 'post',
        data: {
          pid: pid,
          pname: pname,
          pprice: pprice,
          pqty: pqty,
          pimage: pimage,
          pcode: pcode
        },
        success: function(response) {
          $("#message").html(response);
          window.scrollTo(0, 0);
          load_cart_item_number();
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
<?php 
include 'database/koneksi.php';
if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$query = mysqli_query($conn, "DELETE FROM product WHERE id = $id");
	if ($query) {
		header("Location: daftar_menu.php?message=delete");
	}
}
 ?>
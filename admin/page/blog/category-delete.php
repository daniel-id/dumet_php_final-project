<?php 
if(isset($_GET["category-delete"])) {
	$id_category	= $_GET["category-delete"];
	mysqli_query($connect, "DELETE FROM category WHERE id = '$id_category'");
	header("location:index.php?category");
}
?>
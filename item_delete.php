<?php
	session_start();

	//remove the ID from our cart array
	$key = array_search($_GET['ID'], $_SESSION['cart']);	
	unset($_SESSION['cart'][$key]);

	unset($_SESSION['qty_array'][$_GET['index']]);
	//rearrange array after unset
	$_SESSION['qty_array'] = array_values($_SESSION['qty_array']);

	$_SESSION['message'] = "Product deleted from cart";
	header('location: cart_view.php');
?>
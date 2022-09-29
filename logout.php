<?php
include('cart.php');
unset($items);
unset($_SESSION['cart']);
session_destroy();
header('location:login.php');
?>
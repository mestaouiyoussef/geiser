<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['update']) && isset($_POST['index']) && isset($_POST['quantity'])) {
        $index = (int)$_POST['index'];
        $quantity = (int)$_POST['quantity'];
        
        if (isset($_SESSION['cart'][$index])) {
            $_SESSION['cart'][$index]['quantity'] = $quantity;
        }
    } elseif (isset($_POST['delete']) && isset($_POST['index'])) {
        $index = (int)$_POST['index'];
        if (isset($_SESSION['cart'][$index])) {
            unset($_SESSION['cart'][$index]);
            $_SESSION['cart'] = array_values($_SESSION['cart']);
        }
    }
}

header('Location: cart.php');
exit;
?>
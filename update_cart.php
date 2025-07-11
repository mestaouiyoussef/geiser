<?php
session_start();

if (isset($_POST['index'])) {
    $index = $_POST['index'];

    // Supprimer
    if (isset($_POST['delete'])) {
        unset($_SESSION['cart'][$index]);
        $_SESSION['cart'] = array_values($_SESSION['cart']); // Réindexer
    }

    // Modifier la quantité
    if (isset($_POST['update']) && isset($_POST['quantity']) && $_POST['quantity'] > 0) {
        $_SESSION['cart'][$index]['quantity'] = intval($_POST['quantity']);
    }
}

header("Location: cart.php");
exit;

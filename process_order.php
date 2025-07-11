<?php
session_start();
include("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $address = mysqli_real_escape_string($conn, $_POST["address"]);

    $total = 0;
    foreach ($_SESSION['cart'] as $item) {
        $qty = $item['quantity'];
        $total += $item['price'] * $qty;
    }

    // Si l'utilisateur n'est pas connecté, il n'y a pas besoin d'ID
    // On peut utiliser l'email uniquement pour enregistrer la commande
    $insertOrder = "INSERT INTO orders (name, email, address, total) 
                    VALUES ('$name', '$email', '$address', '$total')";
    mysqli_query($conn, $insertOrder);
    $order_id = mysqli_insert_id($conn); // Récupère l'ID de la commande insérée

    // Ajout des produits dans la table order_items
    foreach ($_SESSION['cart'] as $item) {
        $product_name = mysqli_real_escape_string($conn, $item['name']);
        $price = $item['price'];
        $qty = $item['quantity'];
        mysqli_query($conn, "INSERT INTO order_items (order_id, product_name, quantity, price)
                             VALUES ('$order_id', '$product_name', '$qty', '$price')");
    }

    // Réinitialiser le panier
    $_SESSION['cart'] = [];

    // Rediriger vers la page de confirmation avec l'ID de la commande
    header("Location: confirmation.php?order_id=$order_id");
    exit;
}

?>

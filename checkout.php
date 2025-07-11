<?php
session_start();
include("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $address = mysqli_real_escape_string($conn, $_POST["address"]);

    // Calculer le total de la commande
    $total = 0;
    foreach ($_SESSION['cart'] as $item) {
        $qty = $item['quantity'];
        $total += $item['price'] * $qty;
    }

    // Si l'utilisateur est connecté, récupère son ID, sinon utilise l'email
    $order_id = isset($_GET['order_id']) ? $_GET['order_id'] : null;


    // Insérer la commande dans la base de données
    $insertOrder = "INSERT INTO orders (user_id, name, email, address, total) 
                    VALUES ('$user_id', '$name', '$email', '$address', '$total')";
    if (mysqli_query($conn, $insertOrder)) {
        $order_id = mysqli_insert_id($conn);

        // Insérer les articles de la commande
        foreach ($_SESSION['cart'] as $item) {
            $name = mysqli_real_escape_string($conn, $item['name']);
            $price = $item['price'];
            $qty = $item['quantity'];
            mysqli_query($conn, "INSERT INTO order_items (order_id, product_name, quantity, price)
                                 VALUES ('$order_id', '$name', '$qty', '$price')");
        }

        // Vider le panier
        $_SESSION['cart'] = [];

        // Afficher le message de succès
        $_SESSION['success_message'] = "Votre commande a été passée avec succès. Numéro de commande : #$order_id";

        // Rediriger vers la page de confirmation
        header("Location: confirmation.php?order_id=$order_id");
        exit;
    } else {
        echo "Erreur lors de la validation de la commande.";
    }
}
?>

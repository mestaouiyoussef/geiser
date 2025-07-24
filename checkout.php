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

    // Insertion dans la table commandes (table admin)
    foreach ($_SESSION['cart'] as $item) {
        $produit = mysqli_real_escape_string($conn, $item['name']);
        $quantite = $item['quantity'];
        $prix_total = $item['price'] * $quantite;
        
        $insert = "INSERT INTO commandes (nom_client, email_client, produit, quantite, prix_total, date_commande, statut)
                   VALUES ('$name', '$email', '$produit', '$quantite', '$prix_total', NOW(), 'En attente')";
        mysqli_query($conn, $insert);
    }

    // Insertion dans la table orders (suivi client)
    $insertOrder = "INSERT INTO orders (name, email, address, total) 
                    VALUES ('$name', '$email', '$address', '$total')";
    if (mysqli_query($conn, $insertOrder)) {
        $order_id = mysqli_insert_id($conn);

        foreach ($_SESSION['cart'] as $item) {
            $name_item = mysqli_real_escape_string($conn, $item['name']);
            $price = $item['price'];
            $qty = $item['quantity'];
            mysqli_query($conn, "INSERT INTO order_items (order_id, product_name, quantity, price)
                                 VALUES ('$order_id', '$name_item', '$qty', '$price')");
        }

        $_SESSION['cart'] = [];
        $_SESSION['success_message'] = "Votre commande a été passée avec succès. Numéro de commande : #$order_id";
        header("Location: confirmation.php?order_id=$order_id");
        $_SESSION['new_order'] = true;

        exit;
    } else {
        echo "Erreur lors de la validation de la commande.";
    }
}
?>

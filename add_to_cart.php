<?php
session_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_id = $_POST['product_id'] ?? null;
    $product_name = $_POST['product_name'] ?? null;
    $price = $_POST['price'] ?? null;
    $image = $_POST['image'] ?? null;

    if ($product_name && $price) {
        $found = false;

        // On cherche dans le panier un produit avec le même nom
        foreach ($_SESSION['cart'] as &$item) {
            if ($item['product'] === $product_name) {
                $item['quantity'] += 1; // Incrémente la quantité
                $found = true;
                break;
            }
        }

        // Si pas trouvé, on ajoute un nouveau produit
        if (!$found) {
            $_SESSION['cart'][] = [
                'id' => $product_id,
                'product' => $product_name,
                'price' => (float)$price,
                'quantity' => 1,
                'image' => $image
            ];
        }
    }
}

header("Content-Type: application/json");
echo json_encode([
    "success" => true,
    "cart_count" => count($_SESSION['cart'])
]);
exit;

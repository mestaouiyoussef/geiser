<?php
session_start();
include("connection.php");

// Vérifier si le panier est vide
if (empty($_SESSION['cart'])) {
    header("Location: cart.php");
    exit;
}

// Traitement du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validation des données
    $errors = [];
    
    
    $name = mysqli_real_escape_string($conn, trim($_POST["name"] ?? ''));
    $email = mysqli_real_escape_string($conn, trim($_POST["email"] ?? ''));
    $address = mysqli_real_escape_string($conn, trim($_POST["address"] ?? ''));
    
    // Validation des champs
    if (empty($name)) {
        $errors[] = "Le nom est requis";
    }
    
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Email invalide";
    }
    
    if (empty($address)) {
        $errors[] = "L'adresse est requise";
    }
    
    // Si pas d'erreurs, procéder au traitement
    if (empty($errors)) {
        // Calcul du total
        $total = 0;
        foreach ($_SESSION['cart'] as $item) {
            $total += ($item['price'] ?? 0) * ($item['quantity'] ?? 1);
        }

        mysqli_begin_transaction($conn);

        try {
            // Insertion dans orders (suivi client)
            $insertOrder = "INSERT INTO orders (name, email, address, total, created_at) 
                           VALUES (?, ?, ?, ?, NOW())";
            $stmt = mysqli_prepare($conn, $insertOrder);
            mysqli_stmt_bind_param($stmt, "sssd", $name, $email, $address, $total);
            mysqli_stmt_execute($stmt);
            $order_id = mysqli_insert_id($conn);

            // Insertion des articles de commande
            $insertItems = "INSERT INTO order_items (order_id, product_name, quantity, price)
                           VALUES (?, ?, ?, ?)";
            $itemStmt = mysqli_prepare($conn, $insertItems);

            foreach ($_SESSION['cart'] as $item) {
                $product_name = mysqli_real_escape_string($conn, $item['product'] ?? 'Produit sans nom');
                $price = $item['price'] ?? 0;
                $quantity = $item['quantity'] ?? 1;

                mysqli_stmt_bind_param($itemStmt, "isid", $order_id, $product_name, $quantity, $price);
                mysqli_stmt_execute($itemStmt);

                // Insertion dans commandes (table admin)
                $insertAdmin = "INSERT INTO commandes (nom_client, email_client, produit, quantite, prix_total, date_commande, statut)
                               VALUES (?, ?, ?, ?, ?, NOW(), 'En attente')";
                $adminStmt = mysqli_prepare($conn, $insertAdmin);
                mysqli_stmt_bind_param($adminStmt, "sssid", $name, $email, $product_name, $quantity, $price);
                mysqli_stmt_execute($adminStmt);
            }

            mysqli_commit($conn);

            // Préparer les infos pour confirmation
            $_SESSION['order_info'] = [
                'order_id' => $order_id,
                'order_number' => $order_id,
                'total' => $total
            ];

            // Vider le panier et rediriger
            $_SESSION['cart'] = [];
            header("Location: confirmation.php");
            exit;

        } catch (Exception $e) {
            mysqli_rollback($conn);
            $errors[] = "Une erreur est survenue lors du traitement de votre commande: " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validation de commande</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">
    <style>
        .error { color: red; }
        .summary-card { border-left: 4px solid #0d6efd; }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="row">
            <div class="col-md-8">
                <h2 class="mb-4">Informations de livraison</h2>
                
                <?php if (!empty($errors)): ?>
                    <div class="alert alert-danger">
                        <h5>Erreurs :</h5>
                        <ul>
                            <?php foreach ($errors as $error): ?>
                                <li><?= htmlspecialchars($error) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
                
                <form method="post">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nom complet</label>
                        <input type="text" class="form-control" id="name" name="name" 
                               value="<?= htmlspecialchars($name ?? '') ?>" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email"
                               value="<?= htmlspecialchars($email ?? '') ?>" required>
                    </div>
                    
                    <div class="mb-4">
                        <label for="address" class="form-label">Adresse de livraison</label>
                        <textarea class="form-control" id="address" name="address" rows="3" required><?= htmlspecialchars($address ?? '') ?></textarea>
                    </div>
                    
                    <button type="submit" class="btn btn-primary btn-lg">
                        <i class="bi bi-check-circle"></i> Valider la commande
                    </button>
                </form>
            </div>
            
            <div class="col-md-4">
                <div class="card summary-card shadow-sm">
                    <div class="card-header bg-light">
                        <h5 class="mb-0">Récapitulatif de la commande</h5>
                    </div>
                    <div class="card-body">
                        <h6>Articles :</h6>
                        <ul class="list-group mb-3">
                            <?php foreach ($_SESSION['cart'] as $item): ?>
                                <li class="list-group-item d-flex justify-content-between">
                                    <span><?= htmlspecialchars($item['product'] ?? 'Produit') ?> × <?= $item['quantity'] ?? 1 ?></span>
                                    <span><?= number_format(($item['price'] ?? 0) * ($item['quantity'] ?? 1), 2) ?> TND</span>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                        
                        <div class="d-flex justify-content-between fw-bold fs-5 border-top pt-2">
                            <span>Total :</span>
                            <span>
                                <?php
                                $total = 0;
                                foreach ($_SESSION['cart'] as $item) {
                                    $total += ($item['price'] ?? 0) * ($item['quantity'] ?? 1);
                                }
                                echo number_format($total, 2) . ' TND';
                                ?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
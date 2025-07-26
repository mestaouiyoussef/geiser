<?php
session_start();

// Vérifier si une commande a bien été passée
if (empty($_SESSION['order_info'])) {
    header("Location: cart.php");
    exit;
}

// Récupérer les infos de la commande
$order_info = $_SESSION['order_info'];
unset($_SESSION['order_info']); // Supprimer après affichage

include("connection.php");

// Récupérer les détails de la commande depuis la base
$order_id = $order_info['order_id'];
$query = "SELECT * FROM order_items WHERE order_id = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "i", $order_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$order_items = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Confirmation de commande</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container py-5">
        <div class="card shadow">
            <div class="card-header bg-success text-white">
                <h2 class="mb-0">Commande confirmée !</h2>
            </div>
            <div class="card-body">
                <div class="alert alert-success">
                    <h4 class="alert-heading">Merci pour votre commande !</h4>
                    <p>Votre commande <strong>#<?= htmlspecialchars($order_info['order_number']) ?></strong> a bien été enregistrée.</p>
                </div>
                
                <div class="row">
                    <div class="col-md-6">
                        <h4>Récapitulatif</h4>
                        <ul class="list-group mb-4">
                            <?php foreach ($order_items as $item): ?>
                                <li class="list-group-item">
                                    <?= htmlspecialchars($item['product_name']) ?> × 
                                    <?= $item['quantity'] ?> - 
                                    <?= number_format($item['price'] * $item['quantity'], 2) ?> TND
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Total</h4>
                                <p class="display-6"><?= number_format($order_info['total'], 2) ?> TND</p>
                                <p class="text-muted">Numéro de commande: <?= $order_info['order_number'] ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="mt-4">
                    <a href="produits.php" class="btn btn-primary">Retour à la boutique</a>
                    <a href="profile.php?view=orders" class="btn btn-outline-secondary">Voir mes commandes</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
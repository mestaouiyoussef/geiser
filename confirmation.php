<?php
session_start();
$order_id = isset($_GET['order_id']) ? $_GET['order_id'] : null;
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Commande confirmée</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Merci pour votre commande !</h2>

    <!-- Afficher le message de succès -->
    <?php if (isset($_SESSION['success_message'])): ?>
        <div class="alert alert-success" role="alert">
            <?= htmlspecialchars($_SESSION['success_message']); ?>
        </div>
        <?php unset($_SESSION['success_message']); // Supprimer le message après affichage ?>
    <?php endif; ?>

    <p>Votre numéro de commande est : <strong>#<?= htmlspecialchars($order_id) ?></strong></p>
    <a href="home.php" class="btn btn-primary mt-3">Retour à l'accueil</a>
</div>
</body>
</html>


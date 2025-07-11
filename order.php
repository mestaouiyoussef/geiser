<?php
// Utilisation de isset() si l'opérateur ?? n'est pas supporté
$order_id = isset($_GET['order_id']) ? $_GET['order_id'] : null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Commande confirmée</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Merci pour votre commande !</h2>
    <p>Votre numéro de commande est : <strong>#<?= htmlspecialchars($order_id) ?></strong></p>
    <a href="homepage.php" class="btn btn-primary mt-3">Retour à l'accueil</a>
</div>
</body>
</html>


<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Panier</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Votre Panier</h2>

    <?php if (!empty($_SESSION['cart'])): ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Produit</th>
                    <th>Prix</th>
                    <th>Quantité</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $total = 0; ?>
                <?php foreach ($_SESSION['cart'] as $index => $item): ?>
                    <tr>
                        <form method="post" action="update_cart.php">
                            <td><?= htmlspecialchars($item['product']) ?></td>
                            <td><?= number_format($item['price'], 2) ?> €</td>
                          
                            <td>
                                <input type="number" name="quantity" value="<?= isset($item['quantity']) ? $item['quantity'] : 1 ?>" min="1" class="form-control" style="width: 80px;">
                            </td>
                            <td>
                                <input type="hidden" name="index" value="<?= $index ?>">
                                <button type="submit" name="update" class="btn btn-warning btn-sm">Modifier</button>
                                <button type="submit" name="delete" class="btn btn-danger btn-sm">Supprimer</button>
                            </td>
                        </form>
                    </tr>
                    <?php
                        $qty = isset($item['quantity']) ? $item['quantity'] : 5;
                        $total += $item['price'] * $qty;
                    ?>
                <?php endforeach; ?>
                <tr>
                    <td colspan="2" class="text-end"><strong>Total :</strong></td>
                    <td><strong><?= number_format($total, 3) ?> </strong></td>
                </tr>
            </tbody>
        </table>
    <?php else: ?>
        <p>Votre panier est vide.</p>
    <?php endif; ?>
</div>

<!-- Formulaire de validation -->
<form method="post" action="checkout.php" class="container mb-5">
    <div class="row mb-3">
        <div class="col">
            <input type="text" name="name" class="form-control" placeholder="Votre nom" required>
        </div>
        <div class="col">
            <input type="email" name="email" class="form-control" placeholder="Votre email" required>
        </div>
    </div>
    <button type="submit" class="btn btn-success">Valider la commande</button>
    <a href="home.php" class="btn btn-secondary">Retour à l'accueil</a>
</form>

</body>
</html>

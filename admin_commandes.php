<?php
session_start();
include "connection.php";

// Vérification admin
if (!isset($_SESSION['username']) || $_SESSION['type'] !== 'admin') {
    header("Location: login.php?type=admin");
    exit();
}

// Mise à jour du statut de la commande
if (isset($_GET['valider'])) {
    $id = intval($_GET['valider']);
    mysqli_query($conn, "UPDATE commandes SET statut='Validée' WHERE id=$id");
    header("Location: admin_commandes.php");
    exit();
}

if (isset($_GET['annuler'])) {
    $id = intval($_GET['annuler']);
    mysqli_query($conn, "UPDATE commandes SET statut='Annulée' WHERE id=$id");
    header("Location: admin_commandes.php");
    exit();
}

// Récupération des commandes
$result = mysqli_query($conn, "SELECT * FROM commandes ORDER BY date_commande DESC");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Admin - Commandes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Liste des Commandes Clients</h2>
    <a href="admin_dashboard.php" class="btn btn-secondary mb-3">← Retour Dashboard</a>

    <table class="table table-bordered table-hover">
        <thead class="table-warning">
            <tr>
                <th>ID</th>
                <th>Client</th>
                <th>Email</th>
                <th>Produit</th>
                <th>Quantité</th>
                <th>Total</th>
                <th>Date</th>
                <th>Statut</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= htmlspecialchars($row['nom_client']) ?></td>
                <td><?= htmlspecialchars($row['email_client']) ?></td>
                <td><?= htmlspecialchars($row['produit']) ?></td>
                <td><?= $row['quantite'] ?></td>
                <td><?= number_format($row['prix_total'], 2) ?> TND</td>
                <td><?= $row['date_commande'] ?></td>
                <td>
                    <?php
                    $status = $row['statut'];
                    $color = ($status === 'Validée') ? 'success' : (($status === 'Annulée') ? 'danger' : 'secondary');
                    ?>
                    <span class="badge bg-<?= $color ?>"><?= $status ?></span>
                </td>
                <td>
                    <?php if ($status === 'En attente') : ?>
                        <a href="?valider=<?= $row['id'] ?>" class="btn btn-success btn-sm">Valider</a>
                        <a href="?annuler=<?= $row['id'] ?>" class="btn btn-danger btn-sm">Annuler</a>
                    <?php else : ?>
                        -
                    <?php endif; ?>
                </td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
</div>
</body>
</html>

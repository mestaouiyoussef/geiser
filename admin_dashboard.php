<?php
session_start();

// Redirection si non connecté OU si ce n’est pas un admin
if (!isset($_SESSION['username']) || $_SESSION['type'] !== 'admin') {
    header("Location: login.php?type=admin");
    exit();
}
// Vérifie si une notification est présente
if (isset($_SESSION['new_order'])) {
    echo '<div class="alert alert-success text-center">📦 Nouvelle commande reçue !</div>';
    unset($_SESSION['new_order']); // Efface la notif après affichage
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Bienvenue, <?php echo $_SESSION['username']; ?> (Admin)</h2>
        <p>Voici votre espace d'administration.</p>

        <div class="row mt-4">
            <div class="col-md-4">
                <div class="card text-bg-warning mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Gérer Produits</h5>
                        <p class="card-text">Ajouter, modifier ou supprimer des produits.</p>
                        <a href="admin_produits.php" class="btn btn-dark">Accéder</a>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card text-bg-warning mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Voir Commandes</h5>
                        <p class="card-text">Afficher les commandes des clients.</p>
                        <a href="admin_commandes.php" class="btn btn-dark">Accéder</a>
                    </div>
                </div>
            </div>
        </div>

        <a href="logout.php" class="btn btn-outline-danger">Se déconnecter</a>
    </div>
</body>
</html>


<?php
session_start();
if (!isset($_SESSION['admin_logged'])) {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard - Geiser</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/admin.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>
<body style="font-family: 'Roboto', sans-serif; background-color: #f8f9fa;">
<?php include 'includes/header.php'; ?>

<div class="container py-4">
    <h2 class="mb-4 text-orange">Tableau de bord administrateur</h2>
    <div class="row g-4">
        <div class="col-md-3">
            <a href="commandes.php" class="btn btn-warning w-100"><i class="bi bi-cart-check"></i> Commandes</a>
        </div>
        <div class="col-md-3">
            <a href="messages.php" class="btn btn-warning w-100"><i class="bi bi-envelope"></i> Messages</a>
        </div>
        <div class="col-md-3">
            <a href="produits.php" class="btn btn-warning w-100"><i class="bi bi-box"></i> Produits</a>
        </div>
        <div class="col-md-3">
            <a href="logout.php" class="btn btn-dark w-100"><i class="bi bi-box-arrow-right"></i> Déconnexion</a>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
</body>
</html>

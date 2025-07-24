
<?php
session_start();
include "connection.php";

// Vérification que l'utilisateur est un admin
if (!isset($_SESSION['username']) || $_SESSION['type'] !== 'admin') {
    header("Location: login.php?type=admin");
    exit();
}

// Traitement : Ajouter un produit
if (isset($_POST['add_product'])) {
    $nom = $_POST['nom'];
    $description = $_POST['description'];
    $prix = $_POST['prix'];
    $categorie = $_POST['categorie'];

    // Gestion image (facultatif)
    $image = $_FILES['image']['name'];
    $target = "uploads/" . basename($image);
    move_uploaded_file($_FILES['image']['tmp_name'], $target);

    $sql = "INSERT INTO produits (nom, description, prix, image, categorie) VALUES ('$nom', '$description', '$prix', '$image', '$categorie')";
    mysqli_query($conn, $sql);
    header("Location: admin_produits.php");
    exit();
}

// Traitement : Supprimer un produit
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM produits WHERE id=$id");
    header("Location: admin_produits.php");
    exit();
}

// Récupération des produits
$result = mysqli_query($conn, "SELECT * FROM produits ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Admin - Produits</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Gestion des Produits</h2>
    <a href="admin_dashboard.php" class="btn btn-secondary mb-3">← Retour Dashboard</a>

    <!-- Formulaire d'ajout -->
    <form method="post" enctype="multipart/form-data" class="mb-4">
        <div class="row g-3">
            <div class="col-md-3">
                <input type="text" name="nom" class="form-control" placeholder="Nom du produit" required>
            </div>
            <div class="col-md-3">
                <input type="text" name="categorie" class="form-control" placeholder="Catégorie">
            </div>
            <div class="col-md-2">
                <input type="number" step="0.01" name="prix" class="form-control" placeholder="Prix" required>
            </div>
            <div class="col-md-2">
                <input type="file" name="image" class="form-control">
            </div>
            <div class="col-md-2">
                <button type="submit" name="add_product" class="btn btn-success w-100">Ajouter</button>
            </div>
            <div class="col-md-12">
                <textarea name="description" class="form-control" rows="2" placeholder="Description du produit"></textarea>
            </div>
        </div>
    </form>

    <!-- Tableau des produits -->
    <table class="table table-bordered table-hover">
        <thead class="table-warning">
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Catégorie</th>
                <th>Prix</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= htmlspecialchars($row['nom']) ?></td>
                <td><?= htmlspecialchars($row['categorie']) ?></td>
                <td><?= number_format($row['prix'], 2) ?> TND</td>
                <td>
                    <?php if ($row['image']) : ?>
                        <img src="uploads/<?= $row['image'] ?>" width="50">
                    <?php else : ?>
                        -
                    <?php endif; ?>
                </td>
                <td>
                    <a href="admin_produits.php?delete=<?= $row['id'] ?>" onclick="return confirm('Supprimer ce produit ?')" class="btn btn-danger btn-sm">Supprimer</a>
                </td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
</div>
</body>
</html>


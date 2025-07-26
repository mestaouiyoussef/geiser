<?php
session_start();
include("connection.php");

// Protection de la page
if (!isset($_SESSION['username'])) {
    header("location:login.php");
    exit;
}

// Initialiser le panier si besoin
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Récupérer les produits depuis la BDD
$produits_query = mysqli_query($conn, "SELECT * FROM produits ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Nos produits</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous" />

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" />

    <link rel="stylesheet" href="css/style.css" />
</head>

<body>

    <!-- NAVBAR -->
    <header class="navbar-section">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand d-flex align-items-center" href="#">

                    <img src="images/geiser.png" alt="Geiser"
                        style="height: 50px; width: 80px; border-radius: 50%; margin-top: 4px; filter: none !important;" />
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto align-items-center">
                        <li class="nav-item"><a class="nav-link" href="home.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#services">services</a></li>
                        <li class="nav-item"><a class="nav-link" href="#about">about us</a></li>
                        <li class="nav-item"><a class="nav-link" href="#projects">projects</a></li>
                        <li class="nav-item"><a class="nav-link" href="#contact">contact</a></li>

                        <!-- Compteur Panier -->
                        <li class="nav-item">
                            <a class="nav-link position-relative" href="cart.php" id="cart-link">
                                <i class="bi bi-cart"></i> Panier
                                <span id="cart-count" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                    <?= array_sum(array_column($_SESSION['cart'], 'quantity')) ?>
                                </span>
                            </a>
                        </li>

                        <!-- Profil utilisateur -->
                        <li class="nav-item dropdown">
                            <?php
                            $id = $_SESSION['id'];
                            $user_query = mysqli_query($conn, "SELECT * FROM users WHERE id = $id");
                            $user_result = mysqli_fetch_assoc($user_query);
                            ?>
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-person"></i> <?= htmlspecialchars($_SESSION['username']) ?>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                <li><a class="dropdown-item" href="edit.php?id=<?= $_SESSION['id'] ?>">Modifier profil</a></li>
                                <li><a class="dropdown-item" href="logout.php">Déconnexion</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Message de bienvenue -->
    <div class="name text-center mt-3" id="welcome-message">
        Welcome <?= htmlspecialchars($_SESSION['username']); ?> !
    </div>

    <script>
        setTimeout(() => {
            document.getElementById("welcome-message").style.display = "none";
        }, 4000);
    </script>

    <!-- SECTION PRODUITS -->
    <section class="project-section" id="projects">
        <div class="container">
            <div class="row text mb-5">
                <div class="col-lg-6 col-md-12">
                    <h3>Nos produits</h3>
                    <h1>Derniers produits ajoutés</h1>
                    <hr>
                </div>
                <div class="col-lg-6 col-md-12">
                    <p>Découvrez nos produits informatiques sélectionnés avec soin.</p>
                </div>
            </div>

            <div class="row project justify-content-center">
                <?php while ($product = mysqli_fetch_assoc($produits_query)) : ?>
                    <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                        <div class="card h-100">
                            <img src="uploads/<?= htmlspecialchars($product['image']) ?>" class="card-img-top" alt="<?= htmlspecialchars($product['nom']) ?>" />
                            <div class="card-body text-center d-flex flex-column">
                                <h4 class="card-title"><?= htmlspecialchars($product['nom']) ?></h4>
                                <p class="card-text"><?= htmlspecialchars($product['description']) ?></p>
                                <p class="mt-auto"><strong><?= number_format($product['prix'], 2) ?> TND</strong></p>
                                <form method="post" action="add_to_cart.php" class="add-to-cart-form">
                                    <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                                    <input type="hidden" name="product_name" value="<?= htmlspecialchars($product['nom']) ?>">
                                    <input type="hidden" name="price" value="<?= $product['prix'] ?>">
                                    <input type="hidden" name="image" value="uploads/<?= htmlspecialchars($product['image']) ?>">
                                    <button type="submit" class="btn btn-orange w-100">Ajouter au panier</button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>

    <!-- SECTION PROJETS -->
    <section class="project-section">
        <div class="container">
            <div class="row text mb-5">
                <div class="col-lg-6 col-md-12">
                    <h3>Nos projets</h3>
                    <h1>Nos réalisations récentes</h1>
                    <hr>
                </div>
                <div class="col-lg-6 col-md-12">
                    <p>Découvrez nos projets qui ont marqué notre histoire.</p>
                </div>
            </div>

            <div class="row project justify-content-center">
                <!-- Projet 1 -->
                <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                    <div class="card h-100">
                        <img src="images/project1.jpg" class="card-img-top" alt="SaaS Website">
                        <div class="card-body text-center d-flex flex-column">
                            <h4 class="card-title">SaaS Website</h4>
                            <p class="card-text">Développement web avancé</p>
                            <p class="mt-auto"><strong>99.00 TND</strong></p>
                            <form method="post" action="add_to_cart.php" class="add-to-cart-form">
                                <input type="hidden" name="product_id" value="101">
                                <input type="hidden" name="product_name" value="SaaS Website">
                                <input type="hidden" name="price" value="99">
                                <input type="hidden" name="image" value="images/project1.jpg">
                                <button type="submit" class="btn btn-orange w-100">Ajouter au panier</button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Projet 2 -->
                <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                    <div class="card h-100">
                        <img src="images/project2.jpg" class="card-img-top" alt="Travel Website">
                        <div class="card-body text-center d-flex flex-column">
                            <h4 class="card-title">Travel Website</h4>
                            <p class="card-text">Design UI/UX moderne</p>
                            <p class="mt-auto"><strong>89.00 TND</strong></p>
                            <form method="post" action="add_to_cart.php" class="add-to-cart-form">
                                <input type="hidden" name="product_id" value="102">
                                <input type="hidden" name="product_name" value="Travel Website">
                                <input type="hidden" name="price" value="89">
                                <input type="hidden" name="image" value="images/project2.jpg">
                                <button type="submit" class="btn btn-orange w-100">Ajouter au panier</button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Projet 3 -->
                <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                    <div class="card h-100">
                        <img src="images/project3.jpg" class="card-img-top" alt="E-Commerce">
                        <div class="card-body text-center d-flex flex-column">
                            <h4 class="card-title">E-Commerce</h4>
                            <p class="card-text">Solution e-commerce complète</p>
                            <p class="mt-auto"><strong>129.00 TND</strong></p>
                            <form method="post" action="add_to_cart.php" class="add-to-cart-form">
                                <input type="hidden" name="product_id" value="103">
                                <input type="hidden" name="product_name" value="E-Commerce">
                                <input type="hidden" name="price" value="129">
                                <input type="hidden" name="image" value="images/project3.jpg">
                                <button type="submit" class="btn btn-orange w-100">Ajouter au panier</button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Projet 4 -->
                <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                    <div class="card h-100">
                        <img src="images/project4.jpg" class="card-img-top" alt="Portfolio">
                        <div class="card-body text-center d-flex flex-column">
                            <h4 class="card-title">Portfolio</h4>
                            <p class="card-text">Site portfolio élégant</p>
                            <p class="mt-auto"><strong>79.00 TND</strong></p>
                            <form method="post" action="add_to_cart.php" class="add-to-cart-form">
                                <input type="hidden" name="product_id" value="104">
                                <input type="hidden" name="product_name" value="Portfolio">
                                <input type="hidden" name="price" value="79">
                                <input type="hidden" name="image" value="images/project4.jpg">
                                <button type="submit" class="btn btn-orange w-100">Ajouter au panier</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-12 col-sm-12">
                    <p class="logo"><i class="bi bi-chat"></i> Geiser</p>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <ul class="d-flex list-unstyled justify-content-center">
                        <li class="mx-3"><a href="home.php">Home</a></li>
                        <li class="mx-3"><a href="#services">services</a></li>
                        <li class="mx-3"><a href="#projects">projects</a></li>
                        <li class="mx-3"><a href="#about">about us</a></li>
                        <li class="mx-3"><a href="#contact">contact</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-12 col-sm-12 text-center">
                    <p>&copy;2025_Geiser</p>
                </div>
                <div class="col-lg-1 col-md-12 col-sm-12 d-flex align-items-center justify-content-center">
                    <a href="#" class="back-to-top d-flex align-items-center justify-content-center">
                        <i class="bi bi-arrow-up-short"></i>
                    </a>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>

    <script>
        // Gestion AJAX ajout panier
        document.querySelectorAll('.add-to-cart-form').forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                
                const formData = new FormData(this);
                
                fetch('add_to_cart.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Mettre à jour le compteur du panier
                        document.getElementById('cart-count').textContent = data.cart_count;
                        
                        // Afficher une notification
                        alert('Produit ajouté au panier avec succès!');
                    } else {
                        alert('Erreur: ' + data.message);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Une erreur est survenue');
                });
            });
        });
    </script>
</body>
</html>
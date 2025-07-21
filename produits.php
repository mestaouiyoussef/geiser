<?php
session_start();

include("connection.php");

if (!isset($_SESSION['username'])) {
    header("location:login.php");
}

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="css/style.css">
</head>
<script>
document.querySelectorAll('.add-to-cart-form').forEach(form => {
    form.addEventListener('submit', function(e) {
        e.preventDefault();

        const productName = this.dataset.name;
        const productPrice = this.dataset.price;

        fetch('add_to_cart_ajax.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: `product_name=${encodeURIComponent(productName)}&price=${encodeURIComponent(productPrice)}`
        })
        .then(response => response.text())
        .then(data => {
            // Mettre à jour le compteur du panier
            <a href="panier.php" class="btn btn-warning position-relative">
    Panier 🛒
    <span id="cart-count" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
        <?= $nb_articles ?>
    </span>
</a>

            const cartCount = document.getElementById('cart-link');

            cartCount.innerHTML = `<i class="bi bi-cart"></i> Panier (${data})`;
        });
    });
});
</script>


<body>

    <!-- navbar section   -->

    <header class="navbar-section">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand d-flex align-items-center" href="#">

  <div class="d-flex flex-column">    
    <img src="images/geiser.png" alt="geiser" style="height: 50px; width: 80px; border-radius: 50%; margin-top: 4px;">
  </div>
</a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="home.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#services">services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#about">about us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#projects">projects</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contact">contact</a>
                        </li>
                        <li class="nav-item">
    <a class="nav-link" href="cart.php">
        <i class="bi bi-cart"></i> Panier (<?= isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0 ?>)
    </a>
</li>

                        <li class="nav-item">
                            <div class="dropdown">
                                <a class='nav-link dropdown-toggle' href='edit.php?id=$res_id' id='dropdownMenuLink'
                                    data-bs-toggle='dropdown' aria-expanded='false'>
                                    <i class='bi bi-person'></i>
                                </a>


                                <ul class="dropdown-menu mt-2 mr-0" aria-labelledby="dropdownMenuLink">

                                    <li>
                                        <?php

                                        $id = $_SESSION['id'];
                                        $query = mysqli_query($conn, "SELECT * FROM users WHERE id = $id");

                                        while ($result = mysqli_fetch_assoc($query)) {
                                            $res_username = $result['username'];
                                            $res_email = $result['email'];
                                            $res_id = $result['id'];
                                        }


                                        echo "<a class='dropdown-item' href='edit.php?id=$res_id'>Change Profile</a>";


                                        ?>

                                    </li>
                                    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                                </ul>
                            </div>

                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>


 <div class="name" id="welcome-message">
    <center>Welcome 
        <?php echo $_SESSION['username']; ?> !
    </center>
</div>

<script>
    setTimeout(function() {
        document.getElementById("welcome-message").style.display = "none";
    }, 4000); // 4000 millisecondes = 4 secondes
</script>

    <!-- project section  -->

    <section class="project-section" id="projects">
    <div class="container">
        <div class="row text mb-5">
            <div class="col-lg-6 col-md-12">
                <h3>our works</h3>
                <h1>Our latest project</h1>
                <hr>
            </div>
            <div class="col-lg-6 col-md-12">
                <p>We build product close to our heart. We make your idea reality and make your dream successful with awesome experience.</p>
            </div>
        </div>

        <div class="row project justify-content-center">

            <!-- Projet 1 -->
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="card">
                    <img src="images/project1.jpg" class="card-img-top" alt="SaaS Website">
                    <div class="card-body text-center">
                        <h4 class="card-title">SaaS Website</h4>
                        <p class="card-text">Development · Jan 19, 2022</p>
                        <form class="add-to-cart-form" data-name="SaaS Website" data-price="99">
<form method="post" class="add-to-cart.php" data-id="<?= $row['id'] ?>">
    <button type="submit" class="btn btn-orange w-100">Ajouter au panier</button>
</form>
</form>

                    </div>
                </div>
            </div>

            <!-- Projet 2 -->
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="card">
                    <img src="images/project2.jpg" class="card-img-top" alt="Travel Website">
                    <div class="card-body text-center">
                        <h4 class="card-title">Travel Website</h4>
                        <p class="card-text">UI/UX · Jun 29, 2023</p>
                        <form method="post" action="add_to_cart.php">
                            <input type="hidden" name="product_name" value="Travel Website">
                            <input type="hidden" name="price" value="89">
<form method="post" class="add-to-cart.php" data-id="<?= $row['id'] ?>">
    <button type="submit" class="btn btn-orange w-100">Ajouter au panier</button>
</form>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Projet 3-->
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="card">
                    <img src="images/project2.jpg" class="card-img-top" alt="Travel Website">
                    <div class="card-body text-center">
                        <h4 class="card-title">hardl Website</h4>
                        <p class="card-text">UI/UX · Jun 29, 2023</p>
                        <form method="post" action="add_to_cart.php">
                            <input type="hidden" name="product_name" value="hardl Website">
                            <input type="hidden" name="price" value="89">
<form method="post" class="add-to-cart-form" data-id="<?= $row['id'] ?>">
    <button type="submit" class="btn btn-orange w-100">Ajouter au panier</button>
</form>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Projet 4 -->
                        
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="card">
                    <img src="images/project2.jpg" class="card-img-top" alt="Travel Website">
                    <div class="card-body text-center">
                        <h4 class="card-title">Travel Website</h4>
                        <p class="card-text">UI/UX · Jun 29, 2023</p>
                        <form method="post" action="add_to_cart.php">
                            <input type="hidden" name="product_name" value="Travel Website">
                            <input type="hidden" name="price" value="89">
<form method="post" class="add-to-cart-form" data-id="<?= $row['id'] ?>">
    <button type="submit" class="btn btn-orange w-100">Ajouter au panier</button>
</form>
                        </form>
                    </div>
                </div>
            </div>


        </div>
    </div>
<div class="container project-section">
    <div class="row project">

        <!-- Projet 1 -->
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="card">
                <img src="images/project1.jpg" class="card-img-top" alt="Business Website">
                <div class="card-body text-center">
                    <h4 class="card-title">Business Website</h4>
                    <p class="card-text">UI/UX · Jan 10, 2024</p>
                    <form method="post" action="add_to_cart.php">
                        <input type="hidden" name="product_name" value="Business Website">
                        <input type="hidden" name="price" value="99">
                        <button type="submit" class="btn w-100">Ajouter au panier</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Projet 2 -->
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="card">
                <img src="images/project2.jpg" class="card-img-top" alt="Travel Website">
                <div class="card-body text-center">
                    <h4 class="card-title">Travel Website</h4>
                    <p class="card-text">UI/UX · Jun 29, 2023</p>
                    <form method="post" action="add_to_cart.php">
                        <input type="hidden" name="product_name" value="Travel Website">
                        <input type="hidden" name="price" value="89">
                        <button type="submit" class="btn w-100">Ajouter au panier</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Projet 3 -->
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="card">
                <img src="images/project3.jpg" class="card-img-top" alt="E-Commerce Site">
                <div class="card-body text-center">
                    <h4 class="card-title">E-Commerce Site</h4>
                    <p class="card-text">UI/UX · Mar 15, 2024</p>
                    <form method="post" action="add_to_cart.php">
                        <input type="hidden" name="product_name" value="E-Commerce Site">
                        <input type="hidden" name="price" value="129">
                        <button type="submit" class="btn w-100">Ajouter au panier</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Projet 4 -->
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="card">
                <img src="images/project4.jpg" class="card-img-top" alt="Portfolio Website">
                <div class="card-body text-center">
                    <h4 class="card-title">Portfolio Website</h4>
                    <p class="card-text">UI/UX · Apr 20, 2024</p>
                    <form method="post" action="add_to_cart.php">
                        <input type="hidden" name="product_name" value="Portfolio Website">
                        <input type="hidden" name="price" value="79">
                        <button type="submit" class="btn w-100">Ajouter au panier</button>
                    </form>
                </div>
            </div>
        </div>

    </div> <!-- Fin .row -->
</div> <!-- Fin .container -->
<div class="container project-section">
    <div class="row project">

        <!-- Projet 1 -->
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="card">
                <img src="images/project1.jpg" class="card-img-top" alt="Business Website">
                <div class="card-body text-center">
                    <h4 class="card-title">Business Website</h4>
                    <p class="card-text">UI/UX · Jan 10, 2024</p>
                    <form method="post" action="add_to_cart.php">
                        <input type="hidden" name="product_name" value="Business Website">
                        <input type="hidden" name="price" value="99">
                        <button type="submit" class="btn w-100">Ajouter au panier</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Projet 2 -->
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="card">
                <img src="images/project2.jpg" class="card-img-top" alt="Travel Website">
                <div class="card-body text-center">
                    <h4 class="card-title">Travel Website</h4>
                    <p class="card-text">UI/UX · Jun 29, 2023</p>
                    <form method="post" action="add_to_cart.php">
                        <input type="hidden" name="product_name" value="Travel Website">
                        <input type="hidden" name="price" value="89">
                        <button type="submit" class="btn w-100">Ajouter au panier</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Projet 3 -->
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="card">
                <img src="images/project3.jpg" class="card-img-top" alt="E-Commerce Site">
                <div class="card-body text-center">
                    <h4 class="card-title">E-Commerce Site</h4>
                    <p class="card-text">UI/UX · Mar 15, 2024</p>
                    <form method="post" action="add_to_cart.php">
                        <input type="hidden" name="product_name" value="E-Commerce Site">
                        <input type="hidden" name="price" value="129">
                        <button type="submit" class="btn w-100">Ajouter au panier</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Projet 4 -->
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="card">
                <img src="images/project4.jpg" class="card-img-top" alt="Portfolio Website">
                <div class="card-body text-center">
                    <h4 class="card-title">Portfolio Website</h4>
                    <p class="card-text">UI/UX · Apr 20, 2024</p>
                    <form method="post" action="add_to_cart.php">
                        <input type="hidden" name="product_name" value="Portfolio Website">
                        <input type="hidden" name="price" value="79">
                        <button type="submit" class="btn w-100">Ajouter au panier</button>
                    </form>
                </div>
            </div>
        </div>

    </div> <!-- Fin .row -->
</div> <!-- Fin .container -->

                             
            </div> <!-- fin .row.project -->

        <div class="text-end mt-4">
            <a href="produits.php">
                <button class="voir-tous-btn">Voir tous les produits</button>
            </a>
        </div>

    </div> <!-- fin .container -->
    <div id="success-toast" class="toast align-items-center text-bg-success border-0 position-fixed bottom-0 end-0 m-3" role="alert" aria-live="assertive" aria-atomic="true" style="z-index: 1080; display:none;">
  <div class="d-flex">
    <div class="toast-body">
      Produit ajouté avec succès !
    </div>
    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
  </div>
</div>

</section>

</section>



    <!-- footer section  -->

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-12 col-sm-12">
                    <p class="logo"><i class="bi bi-chat"></i> Geiser</p>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <ul class="d-flex">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">services</a></li>
                        <li><a href="#">projects</a></li>
                        <li><a href="#">about us</a></li>
                        <li><a href="#">contact</a></li>
                    </ul>
                </div>

                <div class="col-lg-2 col-md-12 col-sm-12">
                    <p>&copy;2025_Geiser</p>
                </div>

                <div class="col-lg-1 col-md-12 col-sm-12">
                    <!-- back to top  -->

                    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
                            class="bi bi-arrow-up-short"></i></a>
                </div>

            </div>

        </div>
        <div id="cart-toast" class="cart-toast"></div>


    </footer>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
        <script>
document.querySelectorAll('.add-to-cart-form').forEach(form => {
    form.addEventListener('submit', function (e) {
        e.preventDefault();
        const productId = this.dataset.id;

        fetch('add_to_cart.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: 'produit_id=' + encodeURIComponent(productId)
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                showToast("✔️ Produit ajouté au panier");
                document.getElementById('cart-count').textContent = data.total;
            } else {
                showToast("❌ Erreur lors de l’ajout");
            }
        });
    });
});

function showToast(message) {
    const toast = document.getElementById('cart-toast');
    toast.textContent = message;
    toast.classList.add('show');
    setTimeout(() => toast.classList.remove('show'), 2500);
}
</script>
<?php if (isset($_GET['added']) && $_GET['added'] == 1): ?>
<?php endif; ?>
<?php if (isset($_GET['added']) && $_GET['added'] == 1): ?>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const toastEl = document.getElementById('success-toast');
        toastEl.style.display = 'block';
        const toast = new bootstrap.Toast(toastEl);
        toast.show();
    });
    
</script>
<?php endif; ?>


</body>

</html>
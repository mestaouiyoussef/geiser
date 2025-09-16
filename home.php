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

<body>

    <!-- navbar section   -->

    <header class="navbar-section">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                    <img src="images/geiser.png" alt="geiser" style="height: 50px; width: 80px; border-radius: 50%; margin-top: 4px;">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#home">Home</a>
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


                                        echo "<a class='dropdown-item' href='edit.php?id=$res_id'>update Profile</a>";


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


   <div class="name" id="welcomeMessage">
    <center>Welcome
        <?php echo $_SESSION['username']; ?> !
    </center>
</div>



    <!-- hero section  -->

    <section id="home" class="hero-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12 col-sm-12 text-content">
                    <h1>the digital service you really want</h1>
                    <p>We build effective strategies to help you reach customers and prospects across the entire web.
                    </p>
                    <button class="btn"><a href="#">Estimate Product</a></button>
                </div>
                <div class="col-lg-8 col-md-12 col-sm-12">
                    <img src="images/hero-image.png" alt="" class="img-fluid">
                </div>

            </div>
        </div>
    </section>

    <!-- services section  -->

    <section class="services-section" id="servicess">
        <div class="container">
            <div class="row">

                <div class="col-lg-6 col-md-12 col-sm-12 services">

                    <div class="row row1">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="card">
                                <img src="images/camera.gif" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h4 class="card-title">Vidéo-surveillance</h4>
                                    <p class="card-text">Piloter les projets de vidéo-Surveillance et de sûreté</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="card">
                                <img src="images/serveuri.gif" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h4 class="card-title">Serveurs privés virtuels (VPS)</h4>
                                    <p class="card-text">Hébergement et virtualisation des serveurs, services à valeurs ajoutées :SMS, mailing et affichage Urbain LED.</p>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row row2">

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="card">
<img class="img-fluid" src="images/serveur.jpg" alt="images" />
                            <div class="card-body">
                                    <h4 class="card-title">Intégration de solutions Informatiques</h4>
                                    <p class="card-text">GEISER vous fournit une infrastructure informatique complète, planifiée et parfaitement cohérente.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="card">
                                <img src="images/developpement.avif" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h4 class="card-title">Development</h4>
                                    <p class="card-text">Un concept prend vie à travers les différentes étapes des services, telles que la planification, les tests et le déploiement.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-lg-6 col-md-12 col-sm-12 text-content">
                    <h3>services</h3>
                    <h1>Nous pouvons vous aider à résoudre votre problème grâce à notre service.</h1>
                    <p>Nous sommes une agence de stratégie de marque et de conception numérique qui construit des marques qui comptent dans la culture avec plus de dix ans d'expérience.</p>
                    <button class="btn">Explore Services</button>
                </div>

            </div>
        </div>
    </section>

    <!-- about section  -->

    <section class="about-section" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <img src="images/about.jpg" alt="" class="img-fluid">
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 text-content">
                    <h3>who we are</h3>
                    <h1>Providing creative and technology services for growing brands.</h1>

                    <p>Our company specializes in research, brand identity design, UI/UX design, development and graphic
                        design. To help our clients improve their business, we work with them all over the world.</p>
                    <button>learn more</button>
                </div>
            </div>
        </div>
    </section>

    <!-- project section  -->

    <section class="project-section" id="projects">
        <div class="container">
            <div class="row text">
                <div class="col-lg-6 col-md-12">
                    <h3>nos produits</h3>
                    <h1>Our latest products</h1>
                    <hr>
                </div>
                <div class="col-lg-6 col-md-12">
                    <p>We build product close to our heart. We make your idea to really and make your dream successful
                        with awesome experience.</p>
                </div>
            </div>
            <div class="row project">
                  <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card">
                        <img src="images/pc.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <div class="text">
                                <h4 class="card-title">Pc</h4>
                                <p class="card-text"> 29,2023</p>
                                <button><a href="project1.html">Voir prduit</a></button>
                                 <button class="btn-like">
      <i class="bi bi-heart"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card">
                        <img src="images/pc2.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <div class="text">
                                <h4 class="card-title">Asus</h4>
                                <p class="card-text">16gb 29,2023</p>
                                <button><a href="project1.html">Voir produit</a></button>
                                 <button class="btn-like">
      <i class="bi bi-heart"></i>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card">
                        <img src="images/imprimante.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <div class="text">
                                <h4 class="card-title">imprimantes</h4>
                                <p class="card-text">derniere 9,2021</p>
                                 <button><a href="project1.html">Voir produit</a></button>
                                  <button class="btn-like">
      <i class="bi bi-heart"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card">
                        <img src="images/ecran.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <div class="text">
                                <h4 class="card-title">ecran</h4>
                                <p class="card-text">Development. May 25 ,2022</p>
                                <button><a href="project1.html">Voir produit</a></button>
                                 <button class="btn-like">
      <i class="bi bi-heart"></i>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
                    </div> <!-- fin .row.project -->

        <div class="text-end mt-4">
    <form action="produits.php" method="get">
        <button type="submit" class="voir-tous-btn"><a href="produits.php">Voir tous les produits</a></button>
    </form>
</div>


    </div> <!-- fin .container -->
</section>


        </div>
    </section>

    <!-- contact section  -->

    <section class="contact-section" id="contact">
        <div class="container">

            <div class="row gy-4">

                <h1>contact us</h1>
                <div class="col-lg-6">

                    <div class="row gy-4">
                        <div class="col-md-6">
                            <div class="info-box">
                                <i class="bi bi-geo-alt"></i>
                                <h3>Address</h3>
                                <p>30 rue de la republique,<br>ben aous, 535022</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-box">
                                <i class="bi bi-telephone"></i>
                                <h3>Call Us</h3>
                                <p>+91 26865104<br>+216 58935610</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-box">
                                <i class="bi bi-envelope"></i>
                                <h3>Email Us</h3>
                                <p>mestachrif@gmail.com<br>achrefmesta@gmail.com</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-box">
                                <i class="bi bi-clock"></i>
                                <h3>Open Hours</h3>
                                <p>Monday - Friday<br>9:00AM - 05:00PM</p>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-lg-6 form">
                    <form action="contact.php" method="post" class="php-email-form">
                        <div class="row gy-4">

                            <div class="col-md-6">
                                <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                            </div>

                            <div class="col-md-6 ">
                                <input type="email" class="form-control" name="email" placeholder="Your Email" required>
                            </div>

                            <div class="col-md-12">
                                <input type="text" class="form-control" name="subject" placeholder="Subject" required>
                            </div>

                            <div class="col-md-12">
                                <textarea class="form-control" name="message" rows="5" placeholder="Message"
                                    required></textarea>
                            </div>

                            <div class="col-md-12 text-center">
                                <button type="submit">Send Message</button>
                            </div>

                        </div>
                    </form>

                </div>

            </div>

        </div>
    </section>

    <!-- footer section  -->

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-12 col-sm-12">
                                        <img src="images/geiser.png" alt="geiser" style="height: 50px; width: 80px; border-radius: 50%; margin-top: 4px;">

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
                                        <img src="images/geiser.png" alt="geiser" style="height: 50px; width: 80px; border-radius: 50%; margin-top: 4px;">

                </div>

                <div class="col-lg-1 col-md-12 col-sm-12">
                    <!-- back to top  -->

                    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
                            class="bi bi-arrow-up-short"></i></a>
                </div>

            </div>

        </div>

    </footer>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>


        <!-- welcome message -->
<script>
document.addEventListener("DOMContentLoaded", function () {
    setTimeout(function () {
        var welcome = document.getElementById("welcomeMessage");
        if (welcome) {
            welcome.style.transition = "opacity 2s";
            welcome.style.opacity = "0";
            setTimeout(function () {
                welcome.style.display = "none";
            }, 1000); // attendre la fin du fondu
        }
    }, 3000);
});
</script>
<script>
  document.querySelectorAll('.btn-like').forEach(button => {
    button.addEventListener('click', function () {
      const icon = this.querySelector('i');
      this.classList.toggle('liked');
      if (this.classList.contains('liked')) {
        icon.classList.remove('bi-heart');
        icon.classList.add('bi-heart-fill');
      } else {
        icon.classList.remove('bi-heart-fill');
        icon.classList.add('bi-heart');
      }
    });
  });
</script>


</body>
</html>

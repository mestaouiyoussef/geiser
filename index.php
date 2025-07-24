<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

    <link rel="stylesheet" href="css/style.css">
    
</head>


<body>

    <!-- navbar section   -->
     

    <header class="navbar-section">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
<a class="navbar-brand" href="#" style="color: #fb9e01;">
<img src="images/geiser.png" alt="geiser"
     style="height: 50px; width: 100px; border-radius: 50%; margin-top: 4px; filter: none !important;">

                <a class="navbar-brand" href="#"> Geiser</a></a>

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
<li class="nav-item dropdown produit-dropdown">
  <a class="nav-link dropdown-toggle" href="#produits" id="produitMenu" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    Produits
  </a>
  <ul class="dropdown-menu" aria-labelledby="produitMenu">
    <li><a class="dropdown-item" href="#">Écran</a></li>
    <li><a class="dropdown-item" href="#">PC</a></li>
    <li><a class="dropdown-item" href="#">Imprimante</a></li>

    <li class="dropdown-submenu">
      <a class="dropdown-item dropdown-toggle" href="#">Accessoire</a>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="#">Flash et Kits</a></li>
        <li><a class="dropdown-item" href="#">Carte Mémoire</a></li>
      </ul>
    </li>

    <li><a class="dropdown-item" href="#">Logiciel</a></li>
    <li><a class="dropdown-item" href="#">Caméra</a></li>
  </ul>
</li>
    

                        <li class="nav-item">
                            <a class="nav-link" href="#contact">contact</a>
                        </li>
                        <li class="nav-item dropdown">
  <li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle" href="#" id="loginMenu" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    Login
  </a>
  <ul class="dropdown-menu" aria-labelledby="loginMenu">
    <li><a class="dropdown-item" href="login.php?type=visiteur">En tant que Visiteur</a></li>
    <li><a class="dropdown-item" href="login.php?type=admin">En tant qu'Admin</a></li>
  </ul>
</li>


                        <li class="nav-item">
                            <a class="nav-link" href="signup.php">signup</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- hero section  -->

    <section id="home" class="hero-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12 col-sm-12 text-content">
                    <h1>the digital service you really want</h1>
                    <p>We build effective strategies to help you reach customers and prospects across the entire web.
                    </p>
                    <button class="btn"><a href="#">Estimate produit</a></button>
                </div>
                <div class="col-lg-8 col-md-12 col-sm-12">
                    <img src="images/mesta.jpg" alt="" class="img-fluid">
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
                    <button onclick="location.href='more.html'" class="custom-button">learn more</button>
                </div>
            </div>
        </div>
    </section>

    <!-- produit section  -->

    <section class="produit-section" id="produits">
        <div class="container">
            <div class="row text">
                <div class="col-lg-6 col-md-12">
                    <h3>our works :</h3>
                    <h1 style="color: #fb9e01;">Our latest produit</h1>

                    <hr>
                </div>
                <div class="col-lg-6 col-md-12">
                    <p>We build product close to our heart. We make your idea to really and make your dream successful
                        with awesome experience.</p>
                </div>
            </div>
            <div class="row produit">

                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card">
                        <img src="images/project1.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <div class="text">
                                <h4 class="card-title">ordinateur prtable</h4>
                                <p class="card-text">Development. Jan 19,2022</p>
                                <button onclick="location.href='project1.html'" class="custom-button">see produit</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card">
                        <img src="images/project2.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <div class="text">
                                <h4 class="card-title">Accessoire</h4>
                                <p class="card-text">UI/UX Jun 29,2023</p>
                                <button onclick="location.href='project2.html'" class="custom-button">see produit</button>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card">
                        <img src="images/project3.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <div class="text">
                                <h4 class="card-title">Imprimante</h4>
                                <p class="card-text">UI/UX Aug 9,2021</p>
                                <button>see produit</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card">
                        <img src="images/project4.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <div class="text">
                                <h4 class="card-title">ecran</h4>
                                <p class="card-text">Development. May 25 ,2022</p>
                                <button>see produit</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>

    <!-- contact section  -->

    <section class="contact-section py-5" id="contact">
        <div class="container">

            <div class="row gy-4">

                <h1>contact us</h1>
                <div class="col-lg-6">

                    <div class="row gy-4">
                       <div class="col-md-6">
    <a href="adresse.html" style="text-decoration: none; color: inherit;">
        <div class="info-box">
            <i class="bi bi-geo-alt"></i>
            <h3>Address</h3>
            <p>GEISER 14,rue de commerce-BP 136 Charguia 1-1080 Tunis </p>
        </div>
    </a>
</div>

                       <div class="col-md-6">
    <a href="appel.html" style="text-decoration: none; color: inherit;">
        <div class="info-box">
            <i class="bi bi-telephone"></i>
            <h3>Call Us</h3>
            <p>+216 70 600 000<br>+216 70 600 005</p>
        </div>
    </a>
</div>

<div class="col-md-6">
    <a href="email.html" style="text-decoration: none; color: inherit;">
        <div class="info-box">
            <i class="bi bi-envelope"></i>
            <h3>Email Us</h3>
            <p>Geiser@utic.com.tn</p>
        </div>
    </a>
</div>

<div class="col-md-6">
    <a href="horaire.php" style="text-decoration: none; color: inherit;">
        <div class="info-box">
            <i class="bi bi-clock"></i>
            <h3>Open Hours</h3>
            <p>Monday - Friday<br>9:00AM - 06:00PM</p>
        </div>
    </a>
</div>

                <div class="col-lg-12 form">
                    <form action="contact.php" method="POST" class="php-email-form">
                        <div class="row gy-6">

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
                                <button type="submit" name="submit">Send Message</button>
                            </div>

                        </div>
                    </form>

                </div>

            </div>

        </div>
    </section>

<!-- Footer -->
<footer>
    <div class="footer-container">
        <div class="footer-column">
            <img src="images/geiser.png" class="footer-logo" alt="Logo">
            <p><i class="bi bi-telephone"></i> +216 70 600 000</p>
            <p><i class="bi bi-geo-alt"></i> GEISER, Charguia 1 - Tunis</p>
            <p><i class="bi bi-envelope"></i> Geiser@utic.com.tn</p>
        </div>
        <div class="footer-column">
            <h4>Mon Compte</h4>
            <ul>
                <li><a href="#">Mes commandes</a></li>
                <li><a href="#">Mes adresses</a></li>
            </ul>
        </div>
        <div class="footer-column">
            <h4>Informations</h4>
            <ul>
                <li><a href="#">Promotions</a></li>
                <li><a href="#">Mentions légales</a></li>
            </ul>
        </div>
        <div class="footer-column">
            <h4>Catégories</h4>
            <ul>
                <li><a href="#">Informatique</a></li>
                <li><a href="#">Sécurité</a></li>
            </ul>
        </div>
           <div class="col-lg-1 col-md-12 col-sm-12">   
        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
      </div>
    </div>
  </div>

    </div>
</footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
<script>
  document.querySelectorAll('.dropdown-submenu').forEach(function (element) {
    element.addEventListener('mouseover', function () {
      let submenu = this.querySelector('.dropdown-menu');
      if (submenu) submenu.classList.add('show');
    });
    element.addEventListener('mouseout', function () {
      let submenu = this.querySelector('.dropdown-menu');
      if (submenu) submenu.classList.remove('show');
    });
  });
</script>


</body>

</html>
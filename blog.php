<?php
session_start(); // Démarrer la session

// Vérifier si l'utilisateur est connecté
if(isset($_SESSION['user_id'])) {
    // Connexion à la base de données
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "projet_web";

    try {
        $bdd = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Mettre à jour last_page et last_activity dans la table des sessions
        $stmt_update = $bdd->prepare("UPDATE sessions SET last_page = ?, last_activity = NOW() WHERE user_id = ?");
        $stmt_update->execute([$_SERVER['REQUEST_URI'], $_SESSION['user_id']]);
    } catch(PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="stylesheet" href="blog.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<!-- c'est la partie du header -->
<header>
    <!-- En-tête principal -->
    <section class="section-header">
        <!-- Liste de navigation principale -->
        <ul class="nav">
            <!-- Logo -->
            <li>
                <a id="logo" href="home.php">
                    <img src="NextTravel.png" alt="NextTravel" title="Accueil">
                </a>
            </li>
            <!-- Lien de contact par e-mail -->
            <li class="nav-item">
                <a aria-current="page" class="nav-link" href="mailto:client@NextTravel.com">
                    <img src="email.gif" alt="email" title="email" class="img-fluid">client@NextTravel.com</a>
            </li>
            <!-- Lien vers les agences -->
            <li class="nav-item">
                <a class="nav-link" href="nos-agences.php">
                    <img src="home.gif" alt="Agences" title="Agences" class="img-fluid">Nos agences</a>
            </li>
            <!-- Lien de contact -->
            <li class="nav-item">
                <a class="nav-link" href="contact.php">
                    <img src="email.gif" alt="contact" title="contact" class="img-fluid">Contact</a>
            </li>
            <!-- Lien vers les favoris -->
            <li class="nav-item">
                <a class="nav-link" href="favorites.php" rel="noindex, nofollow">
                    <img src="heart.gif" alt="Best" title="Best" class="img-fluid">Favoris</a>
            </li>
            <!-- Lien vers l'espace entreprises -->
            <li class="nav-item">
                <a class="nav-link" href="espace-entreprises.php" target="_blank">
                    <img src="handshake.gif" alt="Espace entreprises" title="Espace entreprises" class="img-fluid">Espace entreprises</a>
            </li>
            <!-- Lien vers le blog -->
            <li class="nav-item">
                <a class="nav-link" href="blog.php" target="_blank">
                    <img src="writing.gif" alt="Blog" title="Blog" class="img-fluid">Blog</a>
            </li>
            <!-- Sélecteur de devise -->
            <li class="nav-item">
                <img src="dollar.gif" alt="Currency" title="Currency" class="img-fluid">
                <select id="currency-select">
                    <option value="TND">TND</option>
                    <option value="USD">USD</option>
                    <option value="EUR">EUR</option>
                </select>
            </li>
            <!-- Bouton de connexion -->
            <li class="nav-item">
                <a title="Se connecter compte client" class="nav-link">
                    <button id="connection"><a href="connection.php"><img src="userlogin.png">Se connecter</a></button>
            </li>
        </ul>
    </section>
    <hr>
    <!-- Deuxième section de l'en-tête -->
    <section id="section-header-2">
        <!-- Liste de navigation secondaire -->
        <ul id="header-ul">
            <li class="header-li"><a href="home.php">Home</a></li>
            <li class="header-li"><a href="hotels.php">Hotels</a></li>
            <li class="header-li"><a href="vols.php">Vols</a></li>
            <li class="header-li"><a href="Omra.php">Omra</a></li>
            <li class="header-li"><a href="villas.php">Villas & Apparts</a></li>
        </ul>
        <!-- Numéro de téléphone -->
        <div id="phone-number">
            <img id="phone" src="phone.gif" alt="phone">
            +216 22 222 222
        </div>
        <!-- Info-bulle du numéro de téléphone -->
        <div id="phone-tooltip" class="tooltip">Du Lundi au vendredi de 08h30 à 19h30<br>Samedi de 08h30 à 21h<br>Dimanche de 10h à 17h30</div>
    </section>
    <hr>
</header>
<body>
        <div class="articles-container">
          <article class="article-container">
            <img class="img-article" src="t1.jpg" alt="article 1">
            <label class="date-article">20<br> FEV</label>
            <a class="article-title" href="article1.php">Départ en groupe Turquie, l'envol vers un voyage épique !</a>
            <p class="article-byline">By Next Travel</p>
            <a href="article1.php"><button class="continue-reading-button">CONTINUE READING</button></a>
            <div class="hover-overlay">
                <div class="dot dot1"></div>
                <div class="dot dot2"></div>
                <div class="dot dot3"></div>
              </div>
          </article>
          
          <article class="article-container">
            <img class="img-article" src="t2.jpg" alt="article 2">
            <label class="date-article">04<br> MAR</label>
            <a class="article-title" href="article2.php">نصائحنا لتحضير عمرة مقبولة</a>
            <p class="article-byline">By Next Travel</p>
            <a href="article2.php"><button class="continue-reading-button">CONTINUE READING</button></a>
            <div class="hover-overlay">
                <div class="dot dot1"></div>
                <div class="dot dot2"></div>
                <div class="dot dot3"></div>
              </div>
        </article>

          <article class="article-container">
            <img class="img-article" src="t3.jpg" alt="article 3">
            <label class="date-article">20<br> AVR</label>
            <a class="article-title" href="article3.php">Classement des 10 meilleures compagnies aériennes du monde 🌍✈️</a>
            <p class="article-byline">By Next Travel</p>
            <a href="article3.php"><button class="continue-reading-button">CONTINUE READING</button></a>
            <div class="hover-overlay">
                <div class="dot dot1"></div>
                <div class="dot dot2"></div>
                <div class="dot dot3"></div>
              </div>
        </article>

          <article class="article-container">
            <img class="img-article" src="t4.jpg" alt="article 4">
            <label class="date-article">24<br> DEC</label>
            <a class="article-title" href="article4.php">Les plus beaux endroits à visiter en hiver</a>
            <p class="article-byline">By Next Travel</p>
            <a href="article4.php"><button class="continue-reading-button">CONTINUE READING</button></a>
            <div class="hover-overlay">
                <div class="dot dot1"></div>
                <div class="dot dot2"></div>
                <div class="dot dot3"></div>
              </div>
        </article>

          <article class="article-container">
            <img class="img-article" src="t5.jpg" alt="article 5">
            <label class="date-article">22<br> NOV</label>
            <a class="article-title" href="article5.php">Voyager en Tunisie et à l’étranger : Les clés pour une organisation réussie</a>
            <p class="article-byline">By Next Travel</p>
            <a href="article5.php"><button class="continue-reading-button">CONTINUE READING</button></a>
            <div class="hover-overlay">
                <div class="dot dot1"></div>
                <div class="dot dot2"></div>
                <div class="dot dot3"></div>
              </div>
        </article>

          <article class="article-container">
            <img class="img-article" src="t6.jpg" alt="article 6">
            <label class="date-article">09<br> OCT</label>
            <a class="article-title" href="article6.php">Le Club Med est de retour chez Traveltodo : Redécouvrez le monde en toute sérénité</a>
            <p class="article-byline">By Next Travel</p>
            <a href="article6.php"><button class="continue-reading-button">CONTINUE READING</button></a>
            <div class="hover-overlay">
                <div class="dot dot1"></div>
                <div class="dot dot2"></div>
                <div class="dot dot3"></div>
              </div>
        </article>

          <article class="article-container">
            <img class="img-article" src="t7.jpg" alt="article 7">
            <label class="date-article">28<br> JUIL</label>
            <a class="article-title" href="article7.php">Les 5 principales erreurs que les gens commettent en voyage</a>
            <p class="article-byline">By Next Travel</p>
            <a href="article7.php"><button class="continue-reading-button">CONTINUE READING</button></a>
            <div class="hover-overlay">
                <div class="dot dot1"></div>
                <div class="dot dot2"></div>
                <div class="dot dot3"></div>
              </div>
        </article>

          <article class="article-container">
            <img class="img-article" src="t8.jpg" alt="article 8">
            <label class="date-article">28<br> JUI</label>
            <a class="article-title" href="article8.php">Vous voulez voyager mais vous ne savez pas où ? Consultez ce planificateur de destination!</a>
            <p class="article-byline">By Next Travel</p>
            <a href="article8.php"><button class="continue-reading-button">CONTINUE READING</button></a>
            <div class="hover-overlay">
                <div class="dot dot1"></div>
                <div class="dot dot2"></div>
                <div class="dot dot3"></div>
              </div>
        </article>

          <article class="article-container">
            <img class="img-article" src="t9.jpg" alt="article ">
            <label class="date-article">04<br> MAR</label>
            <a class="article-title" href="article9.php">Découvrez de nouveaux endroits passionnants à explorer </a>
            <p class="article-byline">By Next Travel</p>
            <a href="article9.php"><button class="continue-reading-button">CONTINUE READING</button></a>
            <div class="hover-overlay">
                <div class="dot dot1"></div>
                <div class="dot dot2"></div>
                <div class="dot dot3"></div>
              </div>
        </article>
        </div>
<script src="blog.js"></script>
</body>

<footer>
    <!-- Conteneur principal du pied de page -->
    <div class="footer_container">
        <!-- Section des icônes sociales -->
        <div class="sotialIcons">
            <!-- Lien vers Facebook -->
            <a href=""><i class="fa-brands fa-facebook"></i></a>
            <!-- Lien vers Instagram -->
            <a href=""><i class="fa-brands fa-instagram"></i></a>
            <!-- Lien vers Twitter -->
            <a href=""><i class="fa-brands fa-twitter"></i></a>
            <!-- Lien vers Google Plus -->
            <a href=""><i class="fa-brands fa-google-plus"></i></a>
            <!-- Lien vers YouTube -->
            <a href=""><i class="fa-brands fa-youtube"></i></a>
        </div>
    </div>
    <!-- Ligne de séparation -->
    <hr>
    <!-- Deuxième section du pied de page -->
    <div class="div2">
        <!-- Informations utiles -->
        <div>
            <h3>Informations utiles</h3>
            <ul>
                <!-- Liens utiles -->
                <a href="#">Qui sommes-nous?</a>
                <a href="#">Next Travel vous répond</a>
                <!-- Lien de contact avec un appel à une fonction JavaScript -->
                <a href="#" class="contact-link" onclick="openpopup()">Contact</a>
            </ul>
        </div>
        <!-- Section de contact -->
        <div>
            <h3>Contact</h3>
            <ul>
                <!-- Adresse -->
                <p>Adresse :</p>
                <a href="#">Tunis, Tunisie</a>
                <!-- Adresse e-mail -->
                <a href="mailto Nexttravel@gmail.com">Nexttravel@gmail.com</a>
                <!-- Numéro de téléphone -->
                <a href="#"><p>Tél:</p>(+216)55000111</a>
            </ul>
        </div>
        <!-- Applications mobiles -->
        <div>
            <h3>Applications mobiles</h3>
            <!-- Logos des magasins d'applications -->
            <div><img src="appstore.png"><img src="playstore.png"></div>
        </div>
    </div>
    <!-- Ligne de séparation -->
    <hr>
    <!-- Mention de droits d'auteur -->
    <div><center><h5 style="color: #fff;margin-top: 20px;padding: 20px; ">©2024 NextTravel - Tous droits réservés.</h5></center></div>
</footer>

</html>
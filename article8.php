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
    <title>Article</title>
    <link rel="stylesheet" href="article.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<!-- c'est la partie du header -->
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
    <h1 class="titre-partie">Vous voulez voyager mais vous ne savez pas où ? <br>Consultez ce planificateur de destination!</h1>
    <img src="t8.jpg" alt="image 1">
    <p>Vous êtes à la recherche d'une destination de charme pour vos vacances, mais vous ne savez pas où aller ? Votre budget vacances est restreint et vous ne savez pas comment l’adapter à vos envies ? Ne vous inquiétez pas, le meilleur planificateur de destination est là pour vous aider !</p>
    <h2 class="sous-titre">Laissez les experts planifier vos vacances !</h2>
    <p>Que vous soyez un adepte des voyages ou un novice qui s'embarque dans une aventure lointaine pour la première fois, il est toujours conseillé de se tourner vers les services d’une agence de voyage de renommée pour planifier vos vacances. En effet, un large éventail de services vous sera offert, faisant en sorte que vos vacances soient réussies à coup sûr. Une agence de voyage peut vous aider à organiser votre séjour et à trouver les meilleurs vols, hôtels et activités. Aussi, elle vous aide à planifier votre itinéraire et réserver des excursions, des visites guidées et des attractions.<br>De plus, faire appel aux services d’une agence de renommée vous aide à dénicher des tarifs spéciaux pour les vols et les hôtels, ce qui vous permet de faire des économies considérables. Vous pouvez vous renseigner sur les visas et les vaccins, sur les assurances voyage et autres services connexes. Elle peut vous trouver des coupons et des rabais pour votre destination de voyage afin que vous puissiez tirer le meilleur parti de votre budget</p>
    <img src="t81.jpg" alt="image 2">
    <h2 class="sous-titre">Un gain de temps incontestable !</h2>
    <p>Faire appel à un planificateur de voyage d’été comme pour organiser vos vacances peut vous faire gagner beaucoup de temps. En effet, cela vous évite de passer des heures à rechercher les meilleures offres et à comparer les vols et les hôtels. Par exemple, Traveltodo vous aide à trouver des tarifs avantageux et à organiser des excursions où que vous souhaitez. De plus, ils vous aident à résoudre les éventuels problèmes pouvant survenir lors de votre voyage, ce qui évite les prises de tête. Si vous souhaitez planifier des vacances sans tracas, faire appel à Traveltodo est la meilleure solution qu’il soit.</p>
    <img src="t82.jpg" alt="image 3">
    <h2  class="sous-titre">Traveltodo : un suivi garanti pour un séjour réussi !</h2>
    <p>Un bon planificateur de voyage vous offre des garanties de suivi afin de vous assurer que votre voyage se déroule bien. De ce fait, Traveltodo assure une assistance et un suivi tout le long de votre séjour. Vous êtes mis au courant des conditions météorologiques et des risques liés à votre voyage. Vous bénéficiez d’un accompagnement de bout en bout.</p>
    <img src="t83.jpg" alt="image 4">
    <h2  class="sous-titre">Pour conclure</h2>
    <p>Entre voyages pas cher, voyages de luxe ou croisières, choisissez votre prochaine destination et embarquez dans une aventure qui restera gravée dans votre mémoire pour toujours !</p>
    <script src="article.js"></script>
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
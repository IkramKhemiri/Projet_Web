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
    <h1 class="titre-partie">Découvrez de nouveaux endroits passionnants à explorer</h1>
    <img src="t9.jpg" alt="image 1">
    <p>Vous rêvez de partir à la conquête d’endroits féériques dans les quatre coins du monde et vivre une aventure palpitante ? Traveltodo fait de vos rêves une réalité, et met à votre disposition un large éventail de destinations adaptées à tous les budgets !<br>Notre planète regorge d’endroits fascinants prêts à vous dévoiler leurs secrets cachés et Traveltodo est là pour vous guider dans votre découverte. Que ce soit pour découvrir des endroits à visiter en Tunisie ou pour explorer de nouveaux horizons à l’étranger, vous serez conquis !</p>
    <h2 class="sous-titre">ZANZIBAR : le paradis sur terre et surtout sans visa !</h2>
    <p>Zanzibar, une île paradisiaque offrant une variété de paysages à couper le souffle. Il s’agit, en effet, d’un lieu unique combinant histoire, culture et traditions locales. C’est une destination recommandée aux voyageurs qui aspirent à un dépaysement total, cherchant à lever le voile sur de nouveaux horizons.<br>Connue pour ses plages de rêve et sa vie nocturne animée, à Zanzibar, vous pourrez visiter divers sites historiques, tels que le Palais des Sultans, la Maison des Esclaves ou encore la ville historique de Stone Town. En outre, vous aurez la possibilité de visiter leurs fameuses plantations d'épices, goûter aux délices des produits locaux et faire un safari marin au cœur de l’océan Indien.</p>
    <img src="t91.jpg" alt="image 2">
    <img src="t92.jpg" alt="image 3">
    <h2 class="sous-titre">Un safari en Afrique du Sud ?    </h2>
    <p>Avec une faune et une flore sauvage hors du commun, l’Afrique du Sud est une destination qui mérite de figurer dans votre checklist ! Entre plages, montagnes, savanes et forêts tropicales, vous serez submergés par la beauté d’une nature resplendissante. Sa culture riche et diversifiée constitue ses atouts-charme. De plus, c’est une destination qui s’adapte à toutes les envies et tous les budgets. Vous n’aurez pas à dépenser une fortune !</p>
    <img src="t93.jpg" alt="image 4">
    <h2 class="sous-titre"> Une de nos destinations phares : CANCUN !</h2>
    <p>De plus en plus prisée par les touristes, Cancun figure parmi les destinations les plus prisées des voyageurs. Cette ville côtière située sur la côte des Caraïbes mexicaines s’entoure de magnifiques plages tropicales ornées de récifs coralliens. Bref, un paradis sur terre ! Une ville où les amoureux de la nature trouveront leur bonheur !<br>En termes de divertissement, vous aurez le choix entre des randonnées, des plongées sous-marines et diverses activités nautiques. Un séjour à Cancun peut être l’occasion de nager avec les fameux requins-baleines !<br>Aussi bien connue pour ses loisirs balnéaires que pour son patrimoine historique, vous aurez l’occasion de visiter de nombreux lieux emblématiques tels que l'ancien site maya d'Ek Balam et le musée d'art Mexicain.</p>
    <img src="t94.jpg" alt="image 5">
    <h2 class="sous-titre">Plongez dans les trésors de l'Egypte !</h2>
    <p>Qui n’a jamais rêvé de voir une des sept merveilles du monde !<br>Oui, il s’agit bien de la pyramide de Khéops en Egypte, un chef d'œuvre de l'architecture antique. Le pays le plus ancien et sans doute le plus fascinant du monde vous attend pour un voyage dans le temps. En effet, voyager en Egypte c’est voyager dans le temps, et lever le voile sur les secrets de l’Egypte antique. Vous aurez l'occasion de parcourir des sites archéologiques incroyables tels que les pyramides de Gizeh et la Vallée des Rois. De même, vous aurez l’opportunité de faire une croisière sur le fleuve légendaire du Nil, à savoir le fleuve le plus long du monde. Pour les aventuriers, vous pourrez partir en excursion dans le désert et faire de longues virées en Quad.</p>
    <img src="t95.jpg" alt="image 6">
    <img src="t96.jpg" alt="image 7">
    <h2 class="sous-titre">La perle du cap bon Hammamet en Tunisie :</h2>
    <p>En effet, il y a plusieurs endroits à visiter en Tunisie et cette ville côtière en séduit plus d’un, de par ses vastes étendues de plages, son climat méditérraniéen et son cadre paradisiaque. Cette ville est imprégnée d'histoire et offre de nombreux sites culturels et historiques à explorer. Ne manquez pas de visiter la Médina de Hammamet, avec ses ruelles pittoresques et ses maisons blanchies à la chaux. Vous pouvez également visiter le fort d'Hammamet, un ancien bastion défensif qui offre une vue panoramique sur toute la ville. L’agence de voyage Traveltodo saura vous planifier un séjour exceptionnel.</p>
    <img src="t97.jpg" alt="image 8">
    <br>
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
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
    <h1 class="titre-partie">Les plus beaux endroits à visiter en hiver</h1>
    <img src="t4.jpg" alt="image 1">
    <p>Réputée pour ses plages côtières, son climat doux et son riche patrimoine culturel, la Tunisie figure parmi les destinations touristiques les plus appréciées. Si vous êtes en quête d’authenticité et de charme méditarrénien, vous devez l’ajouter à votre checklist ! </p>
    <h2 class="sous-titre">Voici les principales villes à visiter en Tunisie en Hiver !</h2>
    <p>L’hiver en Tunisie révèle un charme particulier, notamment en région Nord-Ouest. Cette région abrite des sites fascinants qui méritent le détour. Citons à titre d’exemple la ville de Ain Draham connue pour ses stations thermales, ses forêts écumeuses et ses montagnes enneigées. L’hiver est la meilleure saison pour s’aventurer dans cette ville et explorer ses trésors. Vous pouvez réserver votre hôtel Ain Draham sur le notre site.<br>Dans cette même région se situe la fameuse ville de Tabarka qui, elle aussi, revêt un charme tout aussi exceptionnel. Bien que les plages méditerranéennes puissent être moins fréquentées en hiver, elles offrent toujours un cadre serein pour des randonnées en famille ou entre amis. D’ailleurs, ces deux villes sont les préférées des randonneurs et des amateurs de camping. L’agence de voyage Traveltodo met à votre disposition un large choix d’hôtels Tunisie et de maisons d’hôte, de quoi passer un séjour convivial en pleine montagne.</p>
    <h2 class="sous-titre">Sidi Bou Said :</h2>
    <p>À seulement une vingtaine de kilomètres au nord-est de Tunis, ce village vêtu de bleu et de blanc est une destination incontournable de la Tunisie. On y compte de nombreuses demeures antiques devenues de nos jours des musées, mais aussi des cafés ancrés dans l’histoire du village tels que le café des délices ou encore le café des nattes. Lors de votre balade, pensez à prendre des Bambalouni, ces beignets frits couverts de sucre sont un vrai régal !</p>
    <img src="t41.jpg" alt="image 2">
    <h2 class="sous-titre">Circuit Sud : où aller ?</h2>
    <p>Ah le sud tunisien, où le silence du désert est rompu par le doux murmure des oasis. Chez Traveltodo tunisie, plusieurs circuits sud sont mis à votre disposition. Vous choisissez votre créneau, vos destinations et on s’occupe du reste. Préparez-vous à embarquer dans une aventure inoubliable dans les fins fonds du Sahara.</p>
    <ol>
        <li>
            <h2 class="sous-titre">Tozeur</h2>
            <p>Tozeur, surnommée la « perle du désert » saura vous charmer par ses palmiers ornés de dattes et son désert de sable doré où de multiples activités s’offrent à vous. Que serait un circuit sud Tunisie sans un passage à Tozeur ! Vous pourrez parcourir la ville en Quad et faire des promenades en chameau ou à bord de calèche. Quel que soit l’hébergement choisi, vous serez chaleureusement accueillis par les locaux. Vous aurez aussi l’occasion de vous promener dans la Médina de Tozeur et ses marchés animés.</p>
            <img src="t42.jpg" alt="image 3">
        </li>
        <li>
            <h2 class="sous-titre">Matmata</h2>
            <p>Situé au cœur d’un paysage de collines, le village de Matmata se trouve sur la route entre Douz et Médenine. Vous aurez l’occasion d’explorer les villages berbères ainsi que leurs habitations troglodytiques. Il s’agit en fait d’habitations creusées dans des collines rocailleuses devenues le monument insolite du village. Matmata a gagné une renommée mondiale en tant que lieu de tournage pour Star Wars. Vous aurez l’opportunité de visiter les lieux de tournage de la saga.</p>
            <img src="t43.jpg" alt="image 4">
        </li>
        <li>
            <h2 class="sous-titre">El jem</h2>
            <p>Réputée pour ses édifices romains, la ville d’El Jem abrite le troisième plus grand amphithéâtre du monde, le fameux colisée d’El Jem. Lors de votre visite, un détour au musée archéologique s’impose afin de contempler les mosaïques et les sculptures datant de l’empire romain. Les œuvres artistiques qu’on y expose sont impressionnantes ! À seulement quelques kilomètres d’El Jem, se situe la ville de Mahdia, une ville côtière connue pour son héritage historique et sa médina. Cette ville tunisienne capture l’essence même de la Méditerranée, offrant aux visiteurs une expérience authentique qui balance entre modernité et rustique. En hiver comme en été, les hôtels mahdia sont blindés, qu’il s’agisse de touristes ou de locaux. L’agence de voyage Traveltodo met à votre disposition un large éventail d’hôtels tunisie. Vous savez ce qu’il vous reste à faire !  </p>
            <img src="t44.jpg" alt="image 5">
        </li>
        <li>
            <h2 class="sous-titre">Douz</h2>
            <p>Rattachée au gouvernorat de Kebili, Douz révèle un charme unique notamment en hiver avec son climat doux rafraîchi par un vent de désert. Une chose est sûre, l’aventure sera au rendez-vous ! Prévoyez où mettre vos provisions en dattes car vous aurez une multitude de choix. De même, vous aurez l’occasion de parcourir Chott El Djerid, le plus vaste marais du pays, s’étendant entre désert et montagne. Du côté du souk, vous pourrez acheter des babioles et des souvenirs mais aussi des habits traditionnels.</p>
        </li>
        <li>
            <h2 class="sous-titre">Tamerza</h2>
            <p>Situé au nord de Tozeur, pas loin de la frontière algérienne, le village de Tamerza est réputé pour ses oasis de dattes qui longent le long du village, ornés par les fameuses cascades d’eau. Ces sources d’eau jaillissent depuis les flancs de la montagne, offrant des paysages exceptionnels aux visiteurs. Prévoyez où mettre vos provisions en dattes car vous en aurez plein le choix. <br>Comme à son habitude, Traveltodo vous épargne des soucis de planification, notamment la réservation d’hôtel, le transport et les excursions. Vous pouvez opter pour un de nos séjours circuit sud tout inclus. Vous trouverez sur le site plusieurs circuits planifiés selon divers créneaux. Réservez votre prochaine aventure ! </p>
        </li>
    </ol>
    
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

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
    <h1 id="turquie" class="titre-partie">Départ en groupe Turquie, l’envol vers un voyage épique !</h1>
    <img src="t11.jpg" alt="image 1">
    <p>Située au cœur de l’Anatolie, Cappadoce est un vrai bijou de la nature, autant pour ses paysages naturels que pour son patrimoine culturel. Vous avez sûrement dû voir passer ces magnifiques photos en montgolfière au-dessus de la vallée. Il s’agit bien de ce joyau de la Turquie devenu ces dernières années la destination phare des touristes, juste après Istanbul.<br>Pour vous garantir un séjour agréable et un planning d’activités diversifié, Traveltodo met à votre disposition divers voyages organisés istanbul, pour vous offrir la meilleure expérience qu’il soit.<br> Alors, ne serait-ce pas temps de découvrir ses vallées, ses villes souterraines et ses villages au charme inégalé. Istanbul & Cappadoce vous attendent, prêtes à vous dévoiler leurs trésors cachés et leurs merveilles </p><br>
    <h2 class="sous-titre">Été 2024 : Cappadoce ou Chypre, à vous le choix !</h2>
    <p>Une fois arrivé à destination, vous serez subjugué par la beauté de ses habitations troglodytes et ses formations rocheuses, ceci sans oublier les centaines de montgolfières qui survolent la ville du matin au soir. La Cappadoce est une région exceptionnelle, où la nature a façonné un univers enivrant, peuplé de colonnes, d’aiguilles et de cônes, résultant de l’érosion du tuf volcanique. Bref, un spectacle que la nature nous livre !<br>Vous aurez l’opportunité de visiter la ville souterraine de Derinkuyu, un système complexe de grottes et de tunnels tel un véritable labyrinthe rocheux. Elles font partie des monuments les plus visités par les touristes, ou encore les photographes, venus des quatres coins du monde rien que pour s’en mettre plein les yeux.<br>Une chose est sûre, vous ne risquez pas de vous ennuyer à Cappadoce. Vous pourrez vous aventurer dans de superbes randonnées et explorer les anciennes vallées. Votre agence de voyage Traveltodo vous aidera à planifier votre départ en groupe Turquie, qu’il s’agisse d’activités, de visites, d’hébergements, ou même de budget à prévoir. Vous serez entre de bonnes mains !</p>
    <img src="t12.jpg" alt="image 2">
    <h2 class="sous-titre">L’île de chypre :</h2>
    <p>La partie nord de l’île de Chypre, également appelée Chypre du Nord, compte parmi les destinations phares de la Turquie. C’est une île qui témoigne d’un riche patrimoine historique. Pour les voyageurs en quête d’aventure, diverses activités s’offrent à vous : la planche à voile, le jet-ski ou encore la plongée sous-marine. Riche de son patrimoine culturel diversifié avec des influences ottomanes, romaines et grecques, cette île est connue pour son artisanat, notamment la broderie et la poterie. Elle est de plus en plus prisée par les voyageurs, offrant un mélange unique de culture, d’histoire et de beauté naturelle. Ses plages vous invitent à vous baigner dans des eaux cristallines et à profiter de nombreux sports nautiques, incluant la natation, le snorkeling et la plongée sous-marine.</p>
    <img src="t13.jpg" alt="image 3">
    <h2 class="sous-titre">“Si le monde était un seul pays, Istanbul serait sa capitale” Napoléon Bonaparte</h2>
    <p>On ne peut pas visiter la Turquie sans s’arrêter dans la ville unique au monde qui possède la particularité d’être située sur deux continents à la fois. Un lieu de rencontre entre l’Europe et l’Asie, l’orient et l’occident, liés par le fameux Bosphore. Ce détroit mythique qui offre un superbe aperçu de la ville, des palais, des mosquées, des demeures pittoresques, des mosquées qui datent de l’empire Ottoman, Istanbul !<br> Au programme de votre voyage organisé turquie tunisie, des visites guidées au Grand Bazar où vous pourrez acheter des produits authentiques et des épices typiques de la région. Que diriez-vous de prendre un peu de hauteur et profiter d’une vue panoramique sur toute la ville ? Évidemment, il s’agit bien de la célèbre tour de Galata. Pas loin de cette tour, vous pourrez visiter la mosquée bleue, appelée aussi la mosquée du Sultan Ahmed. Un voyage organisé Istanbul ne serait pas complet sans une virée en bâteau sur le Bosphore et un café sous la tour de Galata.</p>
    <img src="t14.jpg" alt="image 4">
    <h2 class="sous-titre">Antalya et Bodrum, le duo gagnant !</h2>
    <p>Imaginez vous balader dans les rues animées d’Antalya, sentir la brise fraîche sur votre visage tout en explorant les anciennes ruines. Si vous hésitez encore à planifier un voyage antalya, ce blog vous incitera à franchir le cap et découvrir ce magnifique pays.<br>Les eaux claires de la méditerranée brillent sous le soleil, vous incitant à vous baigner et à vous détendre sur les plages de sable fin. Et ne manquez pas les délices culinaires turques des restaurants locaux, où les saveurs méditerranéennes se mêlent aux épices orientales pour créer des plats délicieux qui régaleront vos papilles.</p>
    <img src="t51.jpg" alt="image 5">
    <h2 class="sous-titre">Pour conclure</h2>
    <p>Traveltodo vous épargne des soucis de planification et des tracas de dernière minute. Tout est planifié à l’avance, les itinéraires, les hébergements, les repas et les activités sont organisés, ce qui vous permet de vous détendre et de profiter du voyage sans vous soucier des détails logistiques. L’autre avantage de<a href="#turquie"> nos départs en groupe Turquie</a>, c’est que vous êtes entourés d’autres voyageurs et d’un guide expérimenté, ce qui vous permettra de nouer des connaissances et profitez d’une bonne compagnie.<br>Faites défiler tous nos départs en groupe sur le site et réservez vos prochaines vacances dès maintenant. Embarquez dans un voyage turquie mythique que vous n’oublierez pas de sitôt !</p>
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
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
    <h1  class="titre-partie">Classement des 10 meilleures compagnies aériennes du monde 🌍✈️</h1>
    <img src="t31.jpg" alt="image 1 ">
    <p>Imaginez un voyage sans stress, où vous pouvez vous détendre et profiter du vol, sans avoir à vous soucier de quoi que ce soit. Vous prévoyez un voyage et vous cherchez la meilleure compagnie aérienne ? Vous êtes au bon endroit ! Traveltodo vous propose les meilleures offres des compagnies aériennes nationales et internationales.<br>De ce fait, nous vous présentons le classement des 10 meilleures compagnies aériennes au monde, à expérimenter au moins une fois dans votre vie !</p>
    <br>
    <h2 class="sous-titre">Voici notre classement !</h2>
    <p>En tant qu’amateur de voyages, vous savez sans doute que la qualité de l’expérience aérienne peut transformer un simple trajet en une aventure mémorable.</p>
    <ol>
        <li>
            <h2 class="sous-titre">Singapore airlines :</h2>
            <img src="t32.jpg" alt="image 2">
            <p>Singapore Airlines a été élue meilleure compagnie aérienne au monde par Skytrax pour trois années consécutives 2021, 2022 et 2023. Il faut dire qu’elle offre un service irréprochable sur tous les niveaux. En termes de ponctualité, les vols sont toujours à l’heure ou même en avance. À l’intérieur des avions de Singapore Airlines, l’espace est fonctionnel, les cabines sont spacieuses, et tous les membres de l’équipage sont au petit soin. En termes de nourriture servie, on ne peut que se régaler. La meilleure compagnie aérienne du monde s’engage à maintenir les passagers connectés au monde. Des prises de courant aux connexions Wi-Fi, leur avions intègrent les dernières technologies pour assurer un confort optimal tout au long du voyage.</p>
        </li>
        <li>
            <h2 class="sous-titre"> Qatar Airways :</h2>
            <p>Vous vous demandez peut-être ce qui rend cette compagnie aérienne si remarquable. Et bien les raisons sont nombreuses. En premier lieu, on se doit de souligner que la qualité de service à bord de Qatar Airways est impeccable. Les équipages sont professionnels, attentionnés et toujours prêts à rendre service. Ils parlent plusieurs langues et sont toujours à l’écoute des besoins des passagers. Leur réseau de destinations est assez large et les luxe est au rendez-vous, qu’il s’agisse de classe économie ou classe affaires.</p>
        </li>
        <li>
            <h2 class="sous-titre"> All Nippon Airways :</h2>
            <p>La compagnie aérienne japonaise  All Nippon Airways est connue pour offrir une expérience de voyage de haute qualité à ses passagers. De nombreux voyageurs ont souligné la ponctualité de la compagnie notamment la qualité de service et la compétence des agents de bord. ANA est aussi réputée pour ses avions spacieux avec des sièges confortables équipés d’installation de bord à pointe de la technologie. En termes de repas, les passagers ont le choix entre plusieurs types de repas, y compris des options végétariennes. Il est à noter que la compagnie a instauré un programme de fidélité. Les membres du programme peuvent bénéficier de nombreux avantages en fonction de leur niveau de fidélité, tels que des surclassements de siège et des billets gratuits.</p>
        </li>
        <li>
            <h2 class="sous-titre">Emirates :</h2>
            <img src="t33.jpg" alt="image 3">
            <p>Classée en quatrième position du classement, Emirates Airlines dispose d’un large réseau de routes, offrant aux voyageurs un accès à diverses destinations dans le monde, ce qui le rend pratique pour les voyageurs d’affaires et de loisirs. En 2022, Emirates desservait plus de 155 destinations dans plus de 80 pays à travers le monde. Que vous optiez pour la classe économique, affaires ou première classe, chaque passager bénéficie d’un espace généreux, de sièges ergonomiques équipés d’écrans personnels avec la possibilité de suivre en direct les progrès du vol.</p>
        </li>
        <li>
            <h2 class="sous-titre">Japan Airlines :</h2>
            <p>Japan Airlines figure parmi les compagnies aériennes les plus sûres et fiables. C’est sans surprise qu’elle prend place dans notre classement. La compagnie japonaise dessert plus de 150 destinations dans le monde entier, y compris des destinations populaires comme l’Europe, l’Amérique du Nord, l’Asie et l’Océanie.</p>
        </li>
        <li>
            <h2 class="sous-titre">Turkish Airlines :</h2>
            <p>Avec l’un des plus grands réseaux de destinations, Turkish Airlines est reconnue pour sa cuisine délicieuse en vol et son nouveau terminal à Istanbul, un véritable carrefour aérien ! La compagnie turque a reçu quatre prix dont le célèbre titre de la meilleure compagnie aérienne en Europe. Sa place est totalement méritée parmi notre classement basé principalement sur l’expérience globale des passagers, la ponctualité ainsi que le confort à bord des avions.</p>
        </li>
        <li>
            <h2 class="sous-titre">Air France :</h2>
            <p>Depuis 2019, Air France a réussi à grimper de 16 positions pour atteindre la 7ème place du classement 2023. Elle est élue comme meilleure compagnie aérienne de l’Europe de l’Ouest. Cette reconnaissance reflète la qualité exceptionnelle de l’expérience de voyage offerte à bord des avions d’Air France. Chaque élément, du confort luxueux des cabines à l’offre gastronomique raffinée, en passant par les divertissements variés et les services de connectivité dernier cri, contribue à créer une expérience de voyage inégalée.</p>
        </li>
        <li>
            <h2 class="sous-titre">Cathay Pacific :</h2>
            <p>Cathay Pacific impressionne par sa constance en matière de services haut de gamme, mais aussi par leur réseau étendu en Asie et leur salon d’aéroport de classe mondiale à Hong Kong sont incontournables.</p>
        </li>
        <li>
            <h2 class="sous-titre">Eva Air :</h2>
            <p>Cette compagnie taïwanaise classée en 9ème position, brille par son engagement envers l’innovation et la sécurité. Connue pour ses avions bien aménagés, ses cabines spacieuses et son équipage dévoué, la compagnie offre une expérience de vol sûre et confortable. De plus, leur programme de fidélité généreux fait d’EVA Air un choix privilégié pour les voyageurs fréquents.</p>
        </li>
        <li>
            <h2 class="sous-titre">Korean Air :</h2>
            <img src="t33.jpg" alt="image 3">
            <p>Korean Air jouit d’une excellente réputation en matière de sécurité et de fiabilité. Il faut dire que la compagnie coréenne ne lésine pas en termes de confort, offrant des cabines, spacieuses et bien aménagées, avec un espace personnel généreux, même en classe économique. En classe affaires, vous trouverez des sièges qui se transforment en lits parfaitement plats, garantissant un repos optimal pendant votre voyage. Avec un vaste réseau couvrant les principaux hubs internationaux, Korean Air facilite les voyages dans le monde entier.<br>Chez l’agence de voyage traveltodo, profitez d’un réseau de destinations étendu et des prix compétitifs. Réservez votre vol pas cher dès aujourd’hui et commencez à planifier votre voyage !</p>
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
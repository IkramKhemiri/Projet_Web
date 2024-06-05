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
    <h1 class="titre-partie">Voyager en Tunisie et à l’étranger : Les clés pour une organisation réussie</h1>
    <img src="t5.jpg" alt="image 1">
    <p>Partir en voyage, que ce soit en Tunisie ou à l’étranger, est une expérience enrichissante qui mérite d’être vécue pleinement. Pour apprécier chaque moment de votre séjour, une bonne organisation est essentielle. Notre agence de voyage Traveltodo saura vous guider vers des destinations phares et vous munir des conseils et des bonnes pratiques, vous garantissant un voyage mémorable.</p>
    <ol>
        <li>
            <h2 class="sous-titre">Choisissez votre destination :</h2>
            <p>La première étape est de décider où vous souhaitez vous aventurer. Il est vrai que la Tunisie s’imprègne d’une richesse culturelle fascinante marquée par des sites archéologiques allant de la médina aux antiques romaines. Son climat est favorable pour des vacances réussies quelque soit la saison. Explorer ce pays serait tout autant enrichissant qu’un voyage en terre étrangère. Ceci dit, si vous envisagez d’explorer un pays étranger, on vous invite à découvrir nos départs en groupes sur le site et à choisir parmi nos voyages organisés. Une fois votre destination choisie, il vous sera plus facile de vous projeter sur la suite.</p>
            <img src="t51.jpg" alt="image 1">
        </li>
        <li>
            <h2 class="sous-titre">Établissez votre budget :</h2>
            <p>Le budget joue un rôle crucial dans la planification de votre voyage. N’hésitez pas à faire une liste de toutes vos dépenses prévues : vols, hébergement, repas, transports locaux, activités, assurances, etc. Prévoyez une marge pour les imprévus et évitez de tout dépenser à la fois. Si vous optez pour un séjour tout inclus, vous pourrez profiter de votre voyage sans vous soucier des dépenses excessives. Nous tenons à rappeler qu’il est tout à fait possible de voyager sans  dépenser des sommes astronomiques. Chez Traveltodo, vous trouverez divers voyages pas chers tout inclus. Vous choisissez votre destination, et nous nous chargeons du reste.</p>
            <img src="t52.jpg" alt="image 2">
        </li>
        <li>
            <h2 class="sous-titre">Vérifiez les formalités et documents de voyages :</h2>
            <p>Planifier un voyage à l’étranger implique souvent des démarches administratives nécessitant du temps et de l’attention. Certaines formalités, comme l’obtention de visas ou la vaccination, doivent être anticipés bien à l’avance pour éviter tout désagrément lors de votre voyage. Avant même de penser à faire vos bagages, assurez-vous d’avoir tous les documents nécessaires : passeport, visas, billets d’avion et confirmations de réservation d’hôtel. Faites des copies de ces documents et conservez-les séparément au cas où vous les perdriez. N’oubliez pas de souscrire une assurance voyage. Cela peut couvrir divers imprévus tels que les annulations de vol, les pertes de bagages et les soins médicaux. La tranquillité d’esprit n’a pas de prix lorsque vous êtes loin de chez vous.</p>
            <img src="t53.jpg" alt="image 3">
        </li>
        <li>
            <h2 class="sous-titre">Réservez votre billet :</h2>
            <p>Si votre destination est locale et que vous n’êtes pas motorisé, il suffit de réserver vos billets de train ou de bus à l’avance. En revanche, si vous comptez voyager à l’étranger, on vous conseille de réserver votre billet à l’avance pour le dénicher aux meilleurs tarifs. Sachez que chez traveltodo tunisie, nous disposons d’une plateforme conviviale sur laquelle vous pouvez réserver votre billet d’avion en ligne, en quelques clics seulement.</p>
            <img src="t54.jpg" alt="image 4">
        </li>
        <li>
            <h2 class="sous-titre">Les bonnes pratiques à adopter :</h2>
            <p>Voyager, c’est avant tout partir à l’aventure dans un nouveau contexte culturel.   Renseignez-vous sur la culture, les coutumes du pays, notamment les lois et réglementations. Par exemple, il existe des pays ayant des normes vestimentaires particulières, comme certains pays du Golfe, ou des horaires de fermeture spécifiques pour les commerces, comme en Allemagne où tous les commerces sont fermés le dimanche. Par ailleurs, la barrière de la langue peut parfois être un défi, n’hésitez pas à télécharger des applications de langue. Elles vous seront utiles pour traduire et communiquer en cas de besoin. <br>Chez Traveltodo, on vous épargne des soucis de planification et on vous accompagne dans chaque étape de votre voyage. Rien n’est laissé au hasard ! Chaque détail est minutieusement pensé afin que vous puissiez vous adonner pleinement à la joie de vos vacances et créer des souvenirs inoubliables.</p>
        </li>
    </ol>
    <script src="article.js"></script>
</body>

<footer>
    <div class="footer_container">
        <div class="sotialIcons">
            <a href=""><i class="fa-brands fa-facebook"></i></a>
            <a href=""><i class="fa-brands fa-instagram"></i></a>
            <a href=""><i class="fa-brands fa-twitter"></i></a>
            <a href=""><i class="fa-brands fa-google-plus"></i></a>
            <a href=""><i class="fa-brands fa-youtube"></i></a>
            
        </div>
    </div>
    <hr>
    <div class="div2">
        <div>
            <h3>Informations utiles</h3>
        <ul>
            <a href="">Qui sommes-nous?</a>
            <a href="">Next Travel vous répond</a>
            <a href="">Contact</a>
        </ul>
        </div>
        <div >
            <h3>Contact</h3>
        <ul>
            <p>Adresse :</p>
            <a href="">Tunis , Tunisie</a>
            <a href="mailto Nexttravel@gmail.com">Nexttravel@gmail.com</a>
            <a href=""><p>Tél:</p>(+216)55000111</a>
        </ul>
        </div>
        <div >
            <h3>Applications mobiles</h3>
            <div><img src="appstore.png" ><img src="playstore.png" ></div>
            
    
        </div>
        
    </div>
    <hr>
    <div><center><h5 style="color: #fff;margin-top: 20px;padding: 20px; ">©2024 NextTravel - Tous droits réservés.</h5></center></div>
    </footer>
</html>
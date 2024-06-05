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
    <h1 class="titre-partie">Les 5 principales erreurs que les gens commettent en voyage</h1>
    <img src="t7.jpg" alt="image 1">
    <p>Partir à l’aventure est sans doute une expérience passionnante, mais sans planification préalable, cela risque de devenir une réelle source de stress et de désagrément.<br>Faire appel aux services d'une agence de voyage réputée vous évitera de nombreuses erreurs courantes lors de l'organisation. Vous serez sûrs de garantir le bon déroulement de votre séjour. Pour ce fait, votre acolyte voyage Traveltodo saura vous assister tout au long du processus.<br>Et pour vous éviter les imprévus, nous avons regroupé dans cet article les cinq erreurs fréquentes que les gens commettent en voyage.</p>
    <h2 class="sous-titre">Ne pas être à jour sur les documents de voyage requis :</h2>
    <p>C’est sans doute l'erreur la plus répandue chez les voyageurs. Combien de personnes ont raté leurs vols à cause d’un manque de papiers requis ou encore d’une procédure de visa dont ils n’étaient pas au courant. De simples omissions comme celles-ci peuvent faire tomber votre voyage tant attendu à l’eau. Il est important de se renseigner sur les exigences en matière de visa avant toutes vacances prévues à l’international. En effet, certains pays nécessitent un visa préalable, tandis que d'autres vous permettent de l'obtenir à votre arrivée.<br>Une simple recherche sur Internet peut vous permettre de vérifier ce type d’information et d’éviter ainsi ces soucis de dernière minute. Il est à noter que le délai d’obtention de visa est souvent long, et que mieux vaut s’y prendre à l’avance. Pour vous faciliter la tâche, il est recommandé d’avoir recours aux services d’une agence de voyage de renommée comme Traveltodo. Ainsi, vous pourrez profiter pleinement de votre voyage.</p>
    <h2 class="sous-titre">Le fait de ne pas planifier votre séjour à l’avance :</h2>
    <p>Beaucoup de gens n’hésitent pas à se lancer dans des aventures à l’improviste sans rien prévoir à l’avance. Ceci dit, en choisissant de planifier vos vacances avec une agence de voyage, vous pouvez comparer les prix et bénéficier des meilleurs tarifs. Vos billets d’avion seront réservés dans les meilleurs temps en évitant les périodes affluentes.</p>
    <img src="t71.jpg" alt="image 2">
    <img src="t72.jpg" alt="image 3">
    <h2 class="sous-titre">Sous-estimer le budget à prévoir :</h2>
    <p>Parmi les erreurs les plus récurrentes, le fait de sous-estimer le budget à prévoir lors de votre séjour, pour ensuite vous retrouver sans argent. Il est important de bien anticiper son budget et de s'y tenir lorsque vous prévoyez un quelconque voyage . Même si vous pensez que vous avez tout prévu, il est possible que des imprévus se produisent, ce qui risque de vous coûter de l'argent. C'est pourquoi il est important de prévoir un budget plus élevé que ce que vous croyez être nécessaire. Vous pouvez aussi mettre de l’argent de côté pour des activités supplémentaires ou des imprévus qui pourraient survenir.</p>
    <img src="t73.jpg" alt="image 4">
    <h2 class="sous-titre">Se rendre à un endroit sans réservation préalable</h2>
    <p>Planifier votre séjour à l’avance vous évite les mauvaises surprises. L’une des erreurs les plus courantes commise par les voyageurs est le fait de se rendre à un endroit sans avoir réservé de logement à l’avance. Il est important de prévoir un hébergement à l’avance, car vous risquez de ne pas en trouver de disponible une fois arrivé à destination. De plus, les tarifs peuvent être plus élevés si vous n’avez pas effectué de réservation à l’avance. Non seulement vous risquez de payer plus cher, mais en plus, vous pouvez faire face à des contraintes de qualité !</p>
    <img src="t74.jpg" alt="image  5">
    <h2 class="sous-titre">Oublier de vérifier les documents de voyage et les vaccins nécessaires</h2>
    <p>Lorsque vous prévoyez un voyage d’été, veillez à ce que vous ayez tous les documents nécessaires à disposition. De même pour les vaccins. Ceci vous évitera les problèmes inattendus lors de l’enregistrement, lors des contrôles douaniers ou même lorsque vous arrivez à destination.<br>Votre agence de voyage se chargera de vérifier si vous avez besoin d'un visa pour entrer dans le pays, si vos passeports sont à jour ainsi que la validité de votre assurance voyage. Vous devriez également vous renseigner sur les vaccins obligatoires dans le pays en question. Traveltodo fera en sorte que vous soyez bien renseignés sur tous les documents requis.</p>
    <img src="t75.jpg" alt="image 6">
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
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
    <h1 id="omra" class="titre-partie">نصائحنا لتحضير عمرة مقبولة</h1>
    <img src="t2.jpg" alt="image 1">
    <p>Ce périple sacré est bien plus qu’un simple voyage, c’est une aventure spirituelle qui peut transformer votre vie. Pour vous aider à tirer le meilleur de cette expérience unique, l’équipe Traveltodo Omra vous a rassemblé des conseils pratiques pour vous guider dans la préparation de votre Omra. Comme vous le savez, avec notre agence de voyage Tunisie, rien n’est laissé au hasard.<br>Dans cet article, nous vous guidons pas à pas à travers le processus de préparation de votre Omra, de l’obtention du visa aux conseils budgétaires, tout en soulignant l’importance de choisir la meilleure période et les avantages de passer par une agence de voyage spécialisée.</p>
    <ol>
        <li>
            <h2 class="sous-titre">Que dois-je apporter dans ma valise ?</h2>
            <p>Au-delà de la préparation spirituelle qui constitue l’essence même de cette expérience, il est crucial de se pencher sur les aspects pratiques. Lors de votre Omra Tunisie, préparez-vous à parcourir des distances considérables tout au long de votre séjour, que ce soit lors des rites sacrés ou des visites des sites historiques. Pour ce faire, glissez une paire ou deux de chaussures confortables pour être sûr d’être à l’aise lors des rites.<br>En ce qui concerne l’habillement, il est à noter que vous êtes tenus de respecter les codes vestimentaires de ce lieu sacré. Pour les hommes, ils sont tenus de porter l’habit du “Ihram”. Si vous ne disposez pas de cet habit, pas de panique, vous en trouverez sur place. Quant aux femmes, misez sur des tissus légers et respirants, en raison des hautes températures en Arabie Saoudite. Lors de votre Omra Traveltodo mesdames, vous n’êtes pas tenues à un uniforme spécifique.</p>
            <img src="t21.jpg" alt="image 2">
        </li>
        <li>
            <h2 class="sous-titre">Quelle est la meilleure période pour faire votre Omra ?</h2>
            <p>La Omra 2024, ou petit pèlerinage, est possible toute l’année, contrairement au Hajj qui a des dates spécifiques pendant le mois lunaire islamique de Dhu al-Hijjah. N’hésitez pas à consulter des autorités religieuses locales ou des guides religieux pour déterminer les meilleures périodes en fonction de votre situation personnelle et des recommandations en vigueur. Vous pouvez aussi demander des renseignements auprès de votre agence de voyage omra.<br>La Omra peut être réalisée à tout moment de l’année, cependant, certains moments sont considérés comme plus propices et bénéfiques pour accomplir la Omra, et ceci pour diverses raisons. De nombreuses personnes choisissent le mois béni du ramadan pour faire leur omra. De même, les mois sacrés de Rajab, Dhul-Qi’dah et les premiers jours de Dhul-Hijjah sont des moments privilégiés pour accomplir la tunisie Omra.</p>
            <img src="t22.jpg" alt="image 3">
        </li>
        <li>
            <h2 class="sous-titre">Côté formalités, quels sont les préparatifs à faire ?</h2>
            <p>Assurez-vous que votre passeport est valide pour au moins six mois à partir de la date de votre voyage. Pour le visa omra, depuis 2018, l’Arabie Saoudite a introduit le e-visa pour les pèlerins, ce qui facilite grandement les démarches. Vous pouvez l’obtenir en ligne ou par l’intermédiaire de votre agence. Ensuite, vient l’étape du vol et de l’hébergement, l’étape la plus pénible. Votre agence de voyage Traveltodo s’occupe de tout. On se charge du booking tunisie pour vous trouver les meilleurs hôtels.  En termes d’hébergement, une diversité d’options s’offre à vous, allant des hôtels abordables aux établissements luxueux, tels que le movenpick makkah ou encore le movenpick hajar tower makkah. Optez de préférence pour des hôtels situés à proximité des lieux saints afin de faciliter vos déplacements.</p>
            <img src="t23.jpg" alt="image 4">
        </li>
        <li>
            <h2 class="sous-titre">Est-ce qu'on peut faire une Omra avec un visa Schengen ?</h2>
            <p>La question qui revient souvent c’est, comment obtenir un visa pour la Omra ? ll n’est pas possible d’obtenir le visa omra tunisie directement auprès de l’ambassade d’Arabie Saoudite. Il est impératif de faire appel à une agence de voyage omra tunisie agréée par l’ambassade pour effectuer cette démarche. Ceci dit, il est à noter que les titulaires de visas schengen, visas britanniques et américains peuvent obtenir leur visa sur place une fois arrivés à destination.</p>
        </li>
    </ol>
    <h2 class="sous-titre">En guise de conclusion</h2>
    <p>La préparation d’une <a href="#omra"> Omra</a> ne doit pas être prise à la légère. En suivant les étapes ci-dessus, vous pouvez minimiser les obstacles et vous concentrer sur l’essence de votre pèlerinage : la spiritualité et la dévotion.<br>Que votre Omra soit une expérience paisible et mémorable, pleine de bénédictions et de renouveau spirituel. </p>
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
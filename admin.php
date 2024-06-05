<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion Administrateur</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<style>
    header{
    grid-column-start: span 3;
    position: relative;
    z-index: 2;
}

.section-header {
    background-color: #fff;
    padding: 10px; 
    width: 100%;
    z-index: 2;
   
}

.nav {
    list-style-type: none;
    margin: 0; 
    padding: 0;
    display: flex; 
    z-index: 2;
}

.nav-item {
    margin-right: 20px; 
}
.nav-item img{
    
    border-radius: 50%;
    width: auto;
    border: transparent;
   
}
.nav-link {
    color: black; 
    text-decoration: none; 
}

.nav-link:hover {
    color: #fff;
    font-weight: bold;
}

#logo img {
    min-width: 50px; 
    max-width: 300px;
    height: auto; 
    margin-right: 20px;
    margin-top: 10px;
}

#connection {
    width: 150px;
    margin-top: 25px;
    background-color: skyblue;
    border: none; 
    cursor: pointer; 
    display: flex;
    padding: 8px 15px;
    color:white;
    text-transform: uppercase;
    border-radius: 50px;
    text-decoration: none;
}

#connection img {
    margin-right: 5px;
    width: 20px;
}
.img-fluid {
    margin-top: 10px;
    width: 60px;
    height: 60px;
    justify-content: center;
}

header hr {
    border: none; 
    border-top: 5px solid skyblue;
    margin: 0; 
}

#section-header-2 {
    background-image: url('clouds.jpg');
    display: flex; 
    flex-direction: column;
    align-items: center; 
    text-align: center; 
    font-weight: bold;
    font-size: large;
    padding: 20px;
    margin: 0;
    height: 110px;
    z-index: 2;
}

#header-ul {
    list-style-type: none; 
    margin: 0; 
    padding: 5px; 
    display: flex; 
    gap: 20px;
    z-index: 2;
}

.header-li {
    margin-right: 20px;
    z-index: 2;
}

.header-li:last-child {
    margin-right: 0; 
    z-index: 2;
}

.header-li a {
    text-decoration: none; 
    color: black; 
    z-index: 2;
}

#phone {
    width: 50px; 
    height: auto; 
}

#phone-number {
    margin-top: 7px; 
    font-size: 15px; 
    color: black; 
    margin-bottom: 10px;
}
.tooltip {
    display: none;
    position: absolute;
    background-color: skyblue;
    border: 1px solid #ccc;
    padding: 10px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    z-index: 1;
}

#phone-number:hover + #phone-tooltip {
    display: block;
}
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}
form{
    padding: 50px;
    margin: 50px;
    box-sizing: border-box;
}

.container {
    width: 50%;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h1 {
    text-align: center;
    color: #333;
}

form {
    margin-top: 20px;
}

label {
    display: block;
    margin-bottom: 5px;
    color: #333;
}

input[type="text"],
input[type="password"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 3px;
    box-sizing: border-box;
}

input[type="submit"] {
    width: 100%;
    padding: 10px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 3px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

input[type="submit"]:hover {
    background-color: #0056b3;
}
footer{
    background-color:black;
    grid-column-start: span 3;
 
}
.footer_container{
    width: 100%;
    padding: 70px 30px 20px;
}
.sotialIcons{
    display: flex;
    justify-content: center;
}
.sotialIcons a{
    text-decoration: none;
    padding: 10px;
    padding-block: black;
    margin: 10px;
    border-radius: 50%;
}
.sotialIcons a i{
    font-size: 2em;
    color: black;
    opacity: 0.9;
}
.sotialIcons,a:hover{
    background-color: #76ea7f;
    transition: 0.5s;
}
.sotialIcons,a:hover i{
    background-color: white;
    transition: 0.5s;
}
footer .div2{
    margin-top: 25px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-left: 50px;
    margin-right: 50px;
}
footer .div2 h3{
    color: #fff;
    margin-bottom: 10px;
}
footer .div2 ul{
    display: flex;
    flex-direction: column;
}
footer .div2 ul a{
    font-size: 13px;
    color: #fff;
    text-decoration: none;
    margin-bottom: 5px;
    transition: 0.5s;
}
footer .div2 ul a:hover{
    letter-spacing: 0.5px;
}
</style>
<header>
    
    <section class="section-header">
        <ul class="nav">
        <li>
            <a id="logo" href="home.php">
                <img src="NextTravel.png" alt="NextTravel" title="Accueil" >
            </a>
        </li>
            <li class="nav-item ">
                <a aria-current="page" class="nav-link" href="mailto:client@NextTravel.com"><img src="email.gif" alt="email " title="email" class="img-fluid">client@NextTravel.com</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="nos-agences.php"><img src="home.gif" alt="Agences" title="Agences " class="img-fluid ">Nos
                    agences</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="#" onclick="openpopup()"><img src="email.gif" alt="contact " title="contact" class="img-fluid " >Contact</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="admin.php" rel="noindex, nofollow"><img src="accounting.gif" alt="Best " title="Best " class="img-fluid ">Admin</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="espace-entreprises.php" target="_blank"><img src="handshake.gif"  alt="Espace entreprises" title="Espace entreprises" class="img-fluid ">Espace entreprises</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="blog.php" target="_blank"><img src="writing.gif" alt="Blog " title="Blog" class="img-fluid ">Blog</a>
            </li>
            <li class="nav-item ">

                <a class="nav-link "> <img src="dollar.gif" alt="Currency " title="Currency" class="img-fluid me-2">
                    TND
                </a>
            </li>
            <li class="nav-item">
                <a title="Se connecter compte client" class="nav-link  " >
                <button id="connection"><a href="connection.php"> <img src="userlogin.png" >Se connecter</a></button>
            </li>
        </ul>
    </section>
    <hr>
    <section id="section-header-2">
        <UL id="header-ul">
            <li class="header-li"><a href="home.php">Home</a></li>
            <li class="header-li"><a href="hotels.php">Hotels</a></li>
            <li class="header-li"><a href="vols.php">Vols</a></li>
            <li class="header-li"><a href="Omra.php">Omra</a></li>
            <li class="header-li"><a href="villas.php">Villas & Apparts</a></li>
        </UL>
        <div id="phone-number">
            <img id="phone" src="phone.gif" alt="phone">
            +216 22 222 222
        </div>
        <div id="phone-tooltip" class="tooltip">Du Lundi au vendredi de 08h30 à 19h30<br>Samedi de 08h30 à 21h<br>Dimanche de 10h à 17h30</div>
    </section>
    <hr>
</header>
<body>
    <h1>Connexion Administrateur</h1>
    <form action="pageadmin.php" method="post">
        <label for="nom_admin">Nom d'admin :</label><br>
        <input type="text" id="nom_admin" name="nom_admin" required><br><br>

        <label for="mot_de_passe">Mot de passe :</label><br>
        <input type="password" id="mot_de_passe" name="mot_de_passe" required><br><br>

        <input type="submit" value="Connexion">
    </form>
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
                <a href="#">Qui sommes-nous?</a>
                <a href="#">Next Travel vous répond</a>
                <a href="#" class="contact-link" onclick="openpopup()">Contact</a>
            </ul>
            </div>
            <div >
                <h3>Contact</h3>
            <ul>
                <p>Adresse :</p>
                <a href="#">Tunis , Tunisie</a>
                <a href="mailto Nexttravel@gmail.com">Nexttravel@gmail.com</a>
                <a href="#"><p>Tél:</p>(+216)55000111</a>
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


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
.container {
    box-shadow: #007bff;
    box-sizing: border-box;
    text-align: center;
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

a {
    display: block;
    padding: 10px;
    background-color: #007bff; /* Couleur bleu clair */
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    margin-bottom: 10px; /* Espacement entre les liens */
}

a:hover {
    background-color: #0056b3; /* Couleur bleu foncé au survol */
}</style>
<body>
    <div class="container">
    <h2> Alors, c'est pour ou le Next Travel ? 🌍✈️ </h2>
    <a href="reservation.php?destination=venise">venise</a>
    <a href="reservation.php?destination=paris">paris</a>
    <a href="reservation.php?destination=maroc">maroc</a>
    <a href="reservation.php?destination=dubai">dubai</a>
    <a href="reservation.php?destination=thailande">thailande</a>
    <a href="reservation.php?destination=suisse">suisse</a>
    <a href="reservation.php?destination=grèce">grèce</a>
    </div>
</body>
</html>
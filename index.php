<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body id="index">
    <?php
    session_start();

    // function getDir()
    // {
    //         $dir = explode('/', $_SERVER['SCRIPT_FILENAME']);
    //         unset($dir[count($dir) - 1]);
    //         return join('/', $dir);
    // }


    if (isset($_GET['disconnect'])) {
        session_destroy();
        header('Location: http://localhost/discussion/pages/connexion.php');
    }
    ?>
    <link rel="stylesheet" href="../CSS/style.css">

    <header class="conteneur">
        <div class="logo"></div>
        <a href="index.php">ACCUEIL</a>
        <?php
        if (isset($_SESSION['isconnected']) && $_SESSION['isconnected'] === true) {
            echo "<a href='pages/profil.php'>" . $_SESSION['user'] . "</a>";
            echo  "<a href='pages/discussion.php'>MESSAGES</a>";
            echo "<a href='?disconnect'> DECONNEXION </a>";
        } else {
            echo  "<a href='pages/connexion.php'>CONNEXION</a>";
            echo  "<a href='pages/inscription.php'>INSCRIPTION</a>";
        }
        ?>
    </header>
    <h1>
        <div class="bgtitre">Bienvenue !</nav>
    </h1>
    <img class="hiboux" src="images/pngegg (2).png" alt="imagess" height="350px">
    <img class="hiboux2" src="images/pngegg (2).png" alt="imagess" height="350px">
    <div class="texteindex">

        <p>L'ENGAGEMENT DE ROG</br>
            La technologie n'attend pas, l'action non plus. La Republic of Gamers est prête à accueillir les accros à l'adrénaline de la victoire.
            Poussée par son inlassable quête d'innovation, la marque ROG s'engage à offrir des expériences hors du commun aux joueurs et passionnés de tous horizons.
        </p>
    </div>

    <h2 class="gamme">Large gamme de produits...</h2>
    <div class="produits">
        <img src="images/produit1.jpg" alt="" width="80%">
        <img src="images/produit2.jpg" alt="" width="80%">
        <img src="images/produit3.jpg" alt="" width="80%">

    </div>
    <?php include('pages/footer.php'); ?>
</body>

</html>
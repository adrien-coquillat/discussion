<?php
session_start();

function getDir()
{
        $dir = explode('/', $_SERVER['SCRIPT_FILENAME']);
        unset($dir[count($dir) - 1]);
        return join('/', $dir);
}


if (isset($_GET['disconnect'])) {
        session_destroy();
        header('Location: http://localhost/discussion/pages/connexion.php');
}
?>
<link rel="stylesheet" href="../CSS/style.css">

<header class="conteneur">
        <div class="logo"></div>
        <a href="../index.php">ACCUEIL</a>
        <?php
        if (isset($_SESSION['isconnected']) && $_SESSION['isconnected'] === true) {
                echo "<a href='profil.php'>" . $_SESSION['user'] . "</a>";
                echo  "<a href='discussion.php'>MESSAGES</a>";
                echo "<a href='?disconnect'> DECONNEXION </a>";
        } else {
                echo  "<a href='connexion.php'>CONNEXION</a>";
                echo  "<a href='inscription.php'>INSCRIPTION</a>";
        }
        ?>
</header>
<?php
session_start();
if (isset($_GET['disconnect'])) {
        session_destroy();
        header('Location: http://localhost/discussion/pages/connexion.php');
}
?>
<link rel="stylesheet" href="../CSS/style.css">

<header class="conteneur">
        <div class="logo"></div>
        <a href="http://localhost/discussion/index.php">ACCUEIL</a>
        <?php
        if (isset($_SESSION['isconnected']) && $_SESSION['isconnected'] === true) {
                echo "<a href='http://localhost/discussion/pages/profil.php'>" . $_SESSION['user'] . "</a>";
                echo  "<a href='http://localhost/discussion/pages/discussion.php'>MESSAGES</a>";
                echo "<a href='?disconnect'> DECONNEXION </a>";
        } else {
                echo  "<a href='http://localhost/discussion/pages/connexion.php'>CONNEXION</a>";
                echo  "<a href='http://localhost/discussion/pages/inscription.php'>INSCRIPTION</a>";
        }
        ?>
</header>
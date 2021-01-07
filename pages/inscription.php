<?php


if (isset($_POST['submit'])) {
    $db = mysqli_connect('localhost', 'root', '', 'discussion');
    $identifiant = mysqli_real_escape_string($db, htmlspecialchars($_POST['identifiant'])); //on sécurise le login
    $password = mysqli_real_escape_string($db, htmlspecialchars($_POST['motdepasse']));
    $cpassword = mysqli_real_escape_string($db, htmlspecialchars($_POST['cmotdepasse']));

    $sql = "SELECT id FROM `utilisateurs` WHERE login='$identifiant'";
    $query = mysqli_query($db, $sql);
    $result = mysqli_fetch_all($query);
    $compteur = count($result);
    if ($compteur == 0) {
        if (strlen($identifiant) >= 3) {
            if (strlen($password) >= 6) {
                if ($password === $cpassword) {
                    $password = password_hash($password, PASSWORD_BCRYPT);
                    $sql = "INSERT INTO `utilisateurs`(`login`, `password`) VALUES ('$identifiant','$password')";
                    $query = mysqli_query($db, $sql);
                    header("location: connexion.php");
                } else {
                    $msg = "les mots de  passes ne correspondent pas";
                }
            } else {
                $msg = "6 caractères minimum pour le mot de passe";
            }
        } else {
            $msg = "3 caractères minimum pour le login";
        }
    } else {
        $msg = "Login non disponible";
    }
}




?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body id="bodyinscription">
    <?php include('header.php'); ?>
    <div class="cadre">
        <?php
        if (isset($msg)) {
            echo "<div class='alerte'>" . $msg . "</div>";
        }
        ?>
        <form method="post" action="">
            <div class="form-group">
                <label for="identifiant">Login :</label>
                <input type="text" class="form-control" id="identifiant" aria-describedby="emailHelp" name="identifiant" placeholder="Login">
                <small class="form-text text-muted">Ne partage pas ton login.</small>
            </div>
            <div class="form-group">
                <label for="motdepasse">Mot de passe :</label>
                <input type="password" class="form-control" id="password" name="motdepasse" placeholder="Mot de passe">
                <small class="form-text text-muted">Ne partage pas ton mot de passe.</small>
            </div>
            <div class="form-group">
                <label for="cmotdepasse">Confirme ton mot de passe :</label>
                <input type="password" class="form-control" id="cmotdepasse" name="cmotdepasse" placeholder="Confirmation mot de Passe">
                <small class="form-text text-muted">Les mots de passe doivent correspondre.</small>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Inscription</button>
        </form>

    </div>
    <?php if (isset($_SESSION['isconnected']) && $_SESSION['isconnected'] === true) {
        header('refresh:2;url=../index.php');
    } ?>
    <?php include('footer.php'); ?>
</body>

</html>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body id="bodyconnexion">
    <?php include('header.php'); ?>
    <div class="cadre">
        <form method="post" action="">
            <div class="form-group">
                <label for="identifiant"> Login :</label>
                <input type="text" class="form-control" id="identifiant" name="identifiant" placeholder="Ex: Jean13">
            </div>
            <div class="form-group">
                <label for="motdepass"> Mot de passe :</label>
                <input type="password" class="form-control" id="motdepasse" name="motdepasse" placeholder="*******">
            </div>
            <input type="submit" class="btn btn-primary" value="Connexion" id="connect" name="register">
        </form>
    </div>
    <?php
    if (isset($_POST['register'])) {
        //On récupère les valeurs entrées par l'utilisateur :
        $pseudo = $_POST['identifiant'];
        $password = $_POST['motdepasse'];

        $db = mysqli_connect('localhost', 'root', '', 'discussion');
        $sql = "SELECT id FROM utilisateurs WHERE login = '$pseudo'";

        $query = mysqli_query($db, $sql);
        $all_result = mysqli_fetch_all($query);
        $compteur = count($all_result);
        if ($compteur == 1) {
            session_start();
            $_SESSION['user'] = $pseudo;
            $_SESSION['isconnected'] = true;
            header("Location: discussion.php");
        } else {
            $_SESSION['isconnected'] = false;
            echo ' identifiant incorrect';
        }
    }

    if (isset($_SESSION['isconnected']) && $_SESSION['isconnected'] === true) {
        header('refresh:2;url=../index.php');
    }
    ?>
    <?php include('footer.php'); ?>
</body>

</html>
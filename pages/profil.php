<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body id="bodyinscription">
    <?php include('header.php'); ?>
    <?php


    if (isset($_POST['submit'])) {
        $db = mysqli_connect('localhost', 'root', '', 'discussion');
        $newidentifiant = mysqli_real_escape_string($db, htmlspecialchars($_POST['identifiant']));
        $pseudo = $_SESSION['user'];
        $newpassword = mysqli_real_escape_string($db, htmlspecialchars($_POST['motdepasse']));
        $newcpassword = mysqli_real_escape_string($db, htmlspecialchars($_POST['cmotdepasse']));

        $sql = "SELECT id FROM `utilisateurs` WHERE login='$newidentifiant'";
        $query = mysqli_query($db, $sql);
        $result = mysqli_fetch_all($query);
        $compteur = count($result);
        if ($compteur == 0) {
            if (strlen($newidentifiant) >= 3) {
                if (strlen($newpassword) >= 6) {
                    if ($newpassword === $newcpassword) {
                        $newpassword = password_hash($newpassword, PASSWORD_BCRYPT);
                        $id = $compteur[0];
                        $sql = "UPDATE `utilisateurs` SET `login`='$newidentifiant', `password`='$newpassword' WHERE `login`='$pseudo'";
                        $query = mysqli_query($db, $sql);
                        $_SESSION['user'] = $newidentifiant;
                        header("location: discussion.php");
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
    <?php
    if (isset($msg)) {
        echo "<div class='alerte'>" . $msg . "</div>";
    }
    ?>
    <div class="cadre">

        <form method="post" action="">

            <div class="sous-cadre">
                <div class="form-group">
                    <label for="identifiant"> Nouveau Login :</label>
                    <input type="text" class="form-control" id="identifiant" name="identifiant" placeholder="Ex: Jean13">
                </div>
                <div class="form-group">
                    <label for="motdepass"> Nouveau mot de passe :</label>
                    <input type="password" class="form-control" id="motdepasse" name="motdepasse" placeholder="*******">
                </div>
                <div class="form-group">
                    <label for="cmotdepasse"> Confirmation mot de passe :</label>
                    <input type="password" class="form-control" id="cmotdepasse" name="cmotdepasse" placeholder="*******">
                </div>
                <input type="submit" class="btn btn-primary value=" Modifier" id="submit" name="submit">
            </div>



        </form>

    </div>

    <?php include('footer.php'); ?>
</body>

</html>
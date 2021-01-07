<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Discussion</title>
</head>

<body id="discussion">

    <?php include('header.php'); ?>

    <?php
    if (!isset($_SESSION['user'])) {
        header("location: inscription.php");
    }

    ?>
    <form action="discussion.php" class="form-inline my-2 my-lg-0" method="post">
        <div class="alerte">
            <?php
            if (isset($_POST['envoyer'])) {
                $message = $_POST['message'];
                $msg = "";
                if (strlen($message) > 9 && strlen($message) < 200) {
                    $db = mysqli_connect('localhost', 'root', '', 'discussion');
                    $message = mysqli_real_escape_string($db, htmlspecialchars($message));
                    $date = date("Y-m-d H:i:s");
                    $login = $_SESSION['user'];
                    $sql = "SELECT id FROM utilisateurs WHERE login='$login'";
                    $query = mysqli_query($db, $sql);
                    $id = mysqli_fetch_assoc($query);
                    $id = $id['id'];
                    $sql = "INSERT INTO  messages ( message, id_utilisateur, date ) VALUES ('$message', $id, '$date')";
                    $req = mysqli_query($db, $sql);
                    header("Location: discussion.php");
                } else {
                    echo $msg = "le message doit contenir entre 10 et 200 caractères";
                }
            }

            ?>
        </div>
        <input class="ecrire" type="text" name="message" placeholder="Ecrire un message">
        <input class="envoyer" type="submit" name="envoyer" value="Envoyer">


    </form>
    <div class="showlikepussy">
        <?php


        $db = mysqli_connect('localhost', 'root', '', 'discussion');
        $req = "SELECT * FROM messages ORDER BY date ASC";
        $result = mysqli_query($db, $req);
        $messages = mysqli_fetch_all($result);

        foreach ($messages as $key => $value) {
            echo ("  <div class='card'><div class='card-header'>" . $value[2] .
                "</div>" . " <div class='card-body'><h4 class='card-title'> " .
                $value[1] . "</h4> </div>  <p class='card-text'>" . $value[3] . "</p></div>");
        }
        ?>

    </div>

    <?php include('footer.php'); ?>

</body>

</html>
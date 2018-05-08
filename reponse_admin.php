<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Ajout administrateur</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <link rel="stylesheet" href="css/styleNA18.css" />
</head>
<body>
    <?php include "_header.html";?>
    <?php include "_nav.php";?>

    <div class="body-container">
        <?php
            if (isset($_SESSION['mail']) AND isset($_SESSION['prenom']) AND ($_SESSION['id']==1 or $_SESSION['id']==2))
            {?>
                <h2>Ajout d'un administrateur</h2>

                <?php
                include "_connexion.php";?>

                <?php
                $mail = htmlspecialchars(strip_tags($_POST['mail']));

                /** Préparation et exécution de la requête [RECHERCHE DE PERSONNES.mail=$mail]**/
                $sql = "SELECT mail FROM personne WHERE mail='$mail'";
                $req = $connexion->prepare($sql);
                $req->execute();

                $resultat = $req->fetch(PDO::FETCH_ASSOC);

                if (isset($resulat)){
                    $sql = "INSERT INTO administrateur VALUES ('$mail')";
                    $req = $connexion->prepare($sql);
                    $req>execute();

                    if ($result) {
                        echo '<p>L\'utilisateur ayant pour ID ['.$mail.'] est à présent également administrateur.</br>';
                    }
                    else {
                        echo '<p>L\'ajout a échoué !<br>';
                    }
                }
                else{
                    echo '<p>Une fiche "personne" doit être crée. Le formulaire n\'est pas encore prêt à être déployé. Toutes nos excuses. CandideUTC</p>';
                } ?>




            <?php
            }
            else
            {
                header('Location: connexion.php');
            }
        ?>
    </div>

    <?php include "_footer.php";?>

</body>
</html>

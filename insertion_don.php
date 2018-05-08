<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Insertion d'un don</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <link rel="stylesheet" href="css/styleNA18.css" />
</head>
<body>
    <?php include "_header.html";?>

    <div class="body-container">

        <?php
        if (isset($_SESSION['mail']) AND isset($_SESSION['prenom']))
        {?>
            <?php /** Connexion **/
            include "_connexion.php";?>

            <?php
            $montant = ($_POST['montant']);

            /** Préparation et exécution de la requête **/

            $sql = "INSERT INTO don (montant,id_donateur) VALUES ($montant,'{$_SESSION['mail']}')";
            $result = $connexion->prepare($sql);
            $result->execute();

            /** Traitement des résultats **/
            if ($result) {
                echo '<p>Le don a bien été effectuée !<br>Merci ! <3</br>';
            }
            else {
              echo '<p>Le don a échoué !<br>';
            }

            echo '<a href="faire_don.php">Retour à la page de donnation</a></p>';

            /** Déconnexion **/
            $connexion=null;

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

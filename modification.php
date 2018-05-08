<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Modifs infos personnelles</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <link rel="stylesheet" href="css/styleNA18.css" />
</head>
<body>
    <?php include "_header.html";?>
    <?php include "_nav.php";?>

    <div class="body-container">
        <?php
            if (isset($_SESSION['mail']) AND isset($_SESSION['prenom']))
            {
                ?>

                <?php include "_connexion.php";?>

                <?php
                $mail = $_SESSION['mail'];

                /** Préparation et exécution de la requête **/
                $sql = "SELECT (nom,prenom,mail,tel) FROM personne WHERE '$mail'=personne.mail";
                $resultset = $connexion->prepare($sql);
                $resultset->execute();

                /** Traitement du résultat **/
                echo '<table>';
                echo '<tr><th>Nom</th><th>Prénom</th><th>E-Mail</th><th>Numéro de tél</th></tr>';
                $row = $resultset->fetch(PDO::FETCH_ASSOC);

                /*echo '<tr><td>'.$row['nom'].'</td><td>'.$row['prenom'].'</td><td>'.$row['mail'].'</td><td>'.$row['tel'].'</td></tr>';*/

                echo '</table>';

                /** Déconnexion **/
                $connexion=null;

                ?>


                <h2>Modification des infos : </h2>

                <form action="miseajour.php" method="post">
                <p>
                    <p>Quelle info voulez-vous modifier ? (un à la fois)</p>

                    <input type="radio" name="modif" value="prename" id="prename" checked/> <label for="prename">Prénom</label><br>
                    <input type="radio" name="modif" value="nom" id="nom" /> <label for="nom">Nom</label><br>
                    <input type="radio" name="modif" value="mail" id="mail" /> <label for="mail">E-Mail (Identifiant)</label><br>
                    <input type="radio" name="modif" value="photo" id="photo" /> <label for="photo">Photo de profil</label><br>
                    <input type="radio" name="modif" value="tel" id="tel" /> <label for="tel">Numéro de téléphone</label><br>

                    <input type="submit" value="Modifier" />


                </p>
                </form>


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

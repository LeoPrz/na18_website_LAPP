<!DOCTYPE html>
<html>
<head>
    <title>Insertion</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <link rel="stylesheet" href="css/styleNA18.css" />
</head>
<body>
    <?php include "_header.html";?>

    <div class="body-container">

        <?php /** Connexion **/
        include "_connexion.php";?>

        <?php
        $mail = htmlspecialchars(strip_tags($_POST['mail']));
        $prenom = htmlspecialchars(strip_tags($_POST['prenom']));
        $nom = htmlspecialchars(strip_tags($_POST['nom']));
        $photo = htmlspecialchars(strip_tags($_POST['photo']));
        $tel = htmlspecialchars(strip_tags($_POST['tel']));
        $conf = htmlspecialchars(strip_tags($_POST['conf']));
        $mdp_hache = password_hash($_POST['mdp'], PASSWORD_DEFAULT); //Hachage du mot de passe

        /** Préparation et exécution de la requête 1 **/
        $sql1 = "INSERT INTO personne VALUES ('$mail','$nom','$prenom','$photo','$tel','$mdp_hache')";
        $result1 = $connexion->prepare($sql1);
        $result1->execute();
        /** Préparation et exécution de la requête 2 **/
        $sql2 = "INSERT INTO utilisateur VALUES ('$mail','$conf')";
        $result2 = $connexion->prepare($sql2);
        $result2->execute();



        /** Traitement des résultats **/
        if (($result1)&&($result2)) {
            echo '<p>L\'inscription a été effectuée !<br><a href="connexion.php">Retour à la page de connexion</a></p>';
        }
        else {
          echo '<p>L\'inscription a échoué !<br><a href="inscription.php">Retour à la page d\'inscription</a></p>';
        }

        /** Déconnexion **/
        $connexion=null;

        ?>
    </div>

    <?php include "_footer.php";?>

</body>
</html>

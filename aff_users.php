<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Utilisateurs</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <link rel="stylesheet" href="css/styleNA18.css" />
</head>
<body>
    <?php include "_header.html";?>
    <?php include "_nav.php";?>

    <div class="body-container">
        <div class="hor">
            <h2>Liste des utilisateurs</h2>
            <p><em>qui ont accepté de publier leurs informations</em></p>
        </div>

        <?php /** Connexion **/
        include "_connexion.php";?>

        <?php
        /** Préparation et exécution de la requête **/
        $sql = "SELECT mail,prenom,nom,photo FROM personne INNER JOIN utilisateur ON personne.mail=utilisateur.id_user WHERE utilisateur.confidentialite=TRUE ORDER BY nom";
        $resultset = $connexion->prepare($sql);
        $resultset->execute();

        /** Traitement du résultat **/
        echo '<table>';
        echo '<tr><th>Nom</th><th>Prénom</th><th>E-Mail</th></tr>';
        while ($row = $resultset->fetch(PDO::FETCH_ASSOC)) {
            echo '<tr><td>'.$row['nom'].'</td><td>'.$row['prenom'].'</td><td>'.$row['mail'].'</td></tr>';
        }
        echo '</table>';

        /** Déconnexion **/
        $connexion=null;

        ?>
    </div>

    <?php include "_footer.php";?>

</form>
</body>
</html>

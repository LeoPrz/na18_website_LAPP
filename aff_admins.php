<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Administrateurs</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <link rel="stylesheet" href="css/styleNA18.css" />
</head>
<body>
    <?php include "_header.html";?>
    <?php include "_nav.php";?>

    <div class="body-container">
        <div class="hor">
            <h2>Liste des administrateurs</h2>
            <p><em>qui gèrent bénévolement ce site</em></p>
        </div>

        <?php /** Connexion **/
        include "_connexion.php";?>

        <?php
        /** Préparation et exécution de la requête **/
        $sql = "SELECT mail,prenom,nom FROM personne INNER JOIN administrateur ON personne.mail=administrateur.id_admin ORDER BY nom";
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

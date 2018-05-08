<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Liste des dons</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <link rel="stylesheet" href="css/styleNA18.css" />
</head>
<body>
    <?php include "_header.html";?>
    <?php include "_nav.php";?>

    <div class="body-container">
        <?php
            if (isset($_SESSION['mail']) AND isset($_SESSION['prenom']) AND ($_SESSION['id']==1 or $_SESSION['id']==2))
            {

                ?><h2>Liste de tous les dons effectués</h2>

                <?php /** Connexion **/
                include "_connexion.php";?>

                <?php
                /** Préparation et exécution de la requête **/
                $sql = "SELECT id_donateur,prenom,nom,montant,date_don FROM don INNER JOIN personne ON don.id_donateur=personne.mail ORDER BY date_don";
                $resultset = $connexion->prepare($sql);
                $resultset->execute();

                /** Traitement du résultat **/
                echo '<table>';
                echo '<tr><th>Date</th><th>Montant</th><th>Nom</th><th>Prénom</th><th>Mail</th></tr>';
                while ($row = $resultset->fetch(PDO::FETCH_ASSOC)) {
                    echo '<tr><td>'.$row['date_don'].'</td><td>'.$row['montant'].'€</td><td>'.$row['nom'].'</td><td>'.$row['prenom'].'</td><td>'.$row['id_donateur'].'</td></tr>';
                }
                echo '</table>';

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

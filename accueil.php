<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Accueil</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <link rel="stylesheet" href="css/styleNA18.css" />
</head>
<body>
    <?php include "_header.html";?>
    <?php include "_nav.php";?>

    <div class="body-container">
        <?php
            if (isset($_SESSION['mail']) AND isset($_SESSION['prenom']))
            {?>
                <h2>Accueil</h2>

                <?php
                if (isset($_SERVER['HTTP_REFERER'])){
                    $nom_fichier = basename($_SERVER['HTTP_REFERER']);
                    if ($nom_fichier=="connexion.php"){
                        echo '<p>Vous êtes connecté !</p>';
                    }
                }

                echo '<p>Bonjour '.$_SESSION['prenom'].' ! (statut : '.$_SESSION['id'].')</p>';
                echo '<ul><ul><li>0 : utilisateur</li><li>1 : administrateur + utilisateur</li><li>2 : administrateur</li></ul></ul>';?>

                <h3>News</h3>

                <ul>
                    <li>Amphi de présentation le 20 décembre à 19h en FA201</li>
                    <li>Flyers distribués à la BU et au Pic'Asso</li>
                </ul>

                <h3>Les piliers de Candide</h3>

                <ul>
                    <li>soutien scolaire</li>
                    <li>éveil culturel</li>
                    <li>parrainage</li>
                </ul>

                <h3>Les projets en cours de l'asso</h3>

                <ul>
                    <li>partenariat avec UT'Africa pour envoyer en 2019 des enfants en voyage en Zambie</li>
                    <li>soutien scolaire à partir de février avec l'association Espérence Banlieue</li>
                    <li>et beaucoup d'autres projets à venir !
                </ul>

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

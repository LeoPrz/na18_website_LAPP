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

                <form action="reponse_admin.php" method="post">
                    <label for="mail">E-Mail (*) :</label>
                    <input type="email" name="mail" placeholder="email.exemple@domaine.fr" required /></br>

                    <input type="checkbox" name="confirmation" id="confirmation" required /> <label for="confirmation">Je souhaite bien ajouter cette personne comme administrateur du site Candide UTC</label></br>

                    <input type="submit" value="Ajouter l'administrateur" />

                    <p>(*) : champs obligatoire</p>

                    <p>INFO : si l'utilisateur (mail) n'existe pas encore dans la base de données, un formulaire sera à remplir. Si il exite déjà en tant qu'utilisateur, il aura simplement le statut d'administrateur en plus.</p>
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

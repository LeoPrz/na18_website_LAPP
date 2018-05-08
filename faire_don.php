<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Faire un don</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <link rel="stylesheet" href="css/styleNA18.css" />
</head>
<body>
    <?php include "_header.html";?>
    <?php include "_nav.php";?>

    <div class="body-container">
        <?php
            if (isset($_SESSION['mail']) AND isset($_SESSION['prenom']))
            { ?>
                <h2>Faire un don</h2>

                <?php
                if ($_SESSION['id']==2)
                {
                    echo '<p>Administrateur : don non pris en compte.</p>';
                } ?>

                <form action="insertion_don.php" method="post">
                    <label for="montant">Montant (*) :</label>
                    <input type="number" name="montant" min="10" max="100" step="10" required/></br>

                    <input type="checkbox" name="confirmation" id="confirmation" required /> <label for="confirmation">Je souhaite bien faire un don à l'association Candide UTC</label></br>

                    <input type="submit" value="Envoyer le don" />

                    <p>(*) : champs obligatoire</p>
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

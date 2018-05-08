<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Mise à jour des données</title>
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
                <h2>PAS ENCORE OPERATIONNEL</h2>

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



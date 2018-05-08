<!DOCTYPE html>
<html>
<head>
    <title>Connexion</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <link rel="stylesheet" href="css/styleNA18.css" />
</head>
<body>
    <?php include "_header.html";?>

    <div class="body-container">
        <h2>Page de connexion</h2>

        <form action="reponse.php" method="post">
        <p>
            <label for="mail">Identifiant (mail) :</label>
            <input type="text" name="mail" placeholder="leo.exemple@qqch.fr" <?php
                /*
                 * si un mail existe dans le cookie,
                 * alors on renseigne automatiquement la valeur du champ mail
                 * implicitement, si le cookie n'est pas détecté,
                 * la valeur du champ n'est pas renseignée
                 */
                if (isset($_COOKIE['mail'])){
                    $cookie_mail = htmlspecialchars(strip_tags($_COOKIE['mail']));
                    echo 'value="'.$cookie_mail.'"';
                }
                ?> autofocus required/></br>
            <label for="mdp">Mot de passe :</label>
            <input type="password" name="mdp" placeholder="********" required/></br>
            <input type="submit" value="Se connecter" />
        </p>
        </form>

        <p>Pas encore de compte ? <a href="inscription.php">Inscription</a></p>

        <?php
            if (isset($_SERVER['HTTP_REFERER'])){
                $nom_fichier = basename($_SERVER['HTTP_REFERER']);
                if (($nom_fichier=="accueil.php")or($nom_fichier=="ajout_admin.php")or($nom_fichier=="liste_dons.php")or($nom_fichier=="aff_users.php")or($nom_fichier=="aff_admins.php")or($nom_fichier=="modification.php")or($nom_fichier=="faire_don.php")){
                    echo '<p><strong>Déconnecté !</strong></p>';
                }
                if ($nom_fichier=="connexion.php"){
                    echo '<p><strong>Mauvais identifiant ou mot de passe !</strong></p>';
                }
            }
        ?>
    </div>

    <?php include "_footer.php";?>
</body>
</html>

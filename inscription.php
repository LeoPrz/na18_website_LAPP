<!DOCTYPE html>
<html>
<head>
    <title>Inscription</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <link rel="stylesheet" href="css/styleNA18.css" />
</head>
<body>
    <?php include "_header.html";?>

    <div class="body-container">
        <h2>Page d'inscription</h2>
        <form action="insertion.php" method="post">
        <p>
            <label for="prenom">Prénom (*) :</label>
            <input type="text" name="prenom" placeholder="Michael" autofocus required/></br>

            <label for="nom">Nom (*) :</label>
            <input type="text" name="nom" placeholder="Jordan" required/></br>

            <label for="mail">E-Mail (*) :</label>
            <input type="email" name="mail" placeholder="email.exemple@domaine.fr" required/></br>

            <label for="mdp">Mot de passe (*) :</label>
            <input type="password" name="mdp" pattern="^\S{6,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Le MDP doit contenir au moins 6 caractères' : ''); if(this.checkValidity()) form.pass2.pattern = this.value;" placeholder="********" required/></br>

            <label for="mdp2">Confirmez le mot de passe (*) :</label>
            <input type="password" name="mdp2" pattern="^\S{6,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'MDP non identique' : '');" placeholder="********" required/></br>

            Nous autorisez-vous à publier votre nom, prénom, photo sur le site ?
            <input type="radio" name="conf" value="TRUE" /> <label for="true">Oui</label>
            <input type="radio" name="conf" value="FALSE" checked="checked"/> <label for="false">Non</label><br>
            <!-- Photo à refaire afin de l'importer directement sur le serveur -->

            <label for="photo">Photo de profil (*):</label>
            <input type="file" name="photo" required/></br>

            <label for="tel">Numéro de téléphone :</label>
            <input type="tel" name="tel" pattern="^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$" placeholder="0612121212"/></br>
            <!-- pattern="^\S{10,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Le MDP doit contenir au moins 10 caractères' : ''); if(this.checkValidity()) form.pass2.pattern = this.value;" -->

            <input type="submit" value="S'inscrire" />

            <p>(*) : champs obligatoire</p>
        </p>
        </form>

        <p>Revenir à la page de <a href="connexion.php">connexion</a>.</p>
    </div>

    <?php include "_footer.php";?>

</body>
</html>

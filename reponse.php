<?php /** Connexion **/
include "_connexion.php";?>

<?php
$mail = htmlspecialchars(strip_tags($_POST['mail']));
$mdp_hache = password_hash($_POST['mdp'], PASSWORD_DEFAULT); // Hachage du mot de passes

setcookie('mail', $mail, time() + 365*24*3600, null, null, false, true);

/** Préparation et exécution de la requête 1 [RECHERCHE DE PERSONNES UTILISATEUR+ADMIN]**/
$sql = "SELECT mail,prenom,mdp_hache FROM personne INNER JOIN utilisateur ON personne.mail=utilisateur.id_user INNER JOIN administrateur ON personne.mail=administrateur.id_admin WHERE mail='$mail'";
$req = $connexion->prepare($sql);
$req->execute();

$resultat = $req->fetch(PDO::FETCH_ASSOC);

if (password_verify($_POST['mdp'], $resultat['mdp_hache']))
{
    session_start();
    $_SESSION['id'] = 1; //statut utilisateur+administrateur
    $_SESSION['mail'] = $resultat['mail'];
    $_SESSION['prenom'] = $resultat['prenom'];
    $connexion=null; //Déconnexion
    header('Location: accueil.php');
}

/** Préparation et exécution de la requête 2 [RECHERCHE DE PERSONNES UTILISATEURS]**/
$sql = "SELECT mail,prenom,mdp_hache FROM personne INNER JOIN utilisateur ON personne.mail=utilisateur.id_user WHERE mail='$mail'";
$req = $connexion->prepare($sql);
$req->execute();

$resultat = $req->fetch(PDO::FETCH_ASSOC);

if (password_verify($_POST['mdp'], $resultat['mdp_hache']))
{
    session_start();
    $_SESSION['id'] = 0; //statut utilisateur
    $_SESSION['mail'] = $resultat['mail'];
    $_SESSION['prenom'] = $resultat['prenom'];
    $connexion=null; //Déconnexion
    header('Location: accueil.php');
}

/** Préparation et exécution de la requête 3 [RECHERCHE DE PERSONNES ADMINS**/
$sql = "SELECT mail,prenom,mdp_hache FROM personne INNER JOIN administrateur ON personne.mail=administrateur.id_admin WHERE mail='$mail'";
$req = $connexion->prepare($sql);
$req->execute();

$resultat = $req->fetch(PDO::FETCH_ASSOC);

if (password_verify($_POST['mdp'], $resultat['mdp_hache']))
{
    session_start();
    $_SESSION['id'] = 2; //statut administrateur
    $_SESSION['mail'] = $resultat['mail'];
    $_SESSION['prenom'] = $resultat['prenom'];
    $connexion=null; //Déconnexion
    header('Location: accueil.php');
}
else
{   //Identifiant ou Mot de Passe erroné
    $connexion=null; //Déconnexion
    header('Location: connexion.php');
}


?>


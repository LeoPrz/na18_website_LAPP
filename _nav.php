<nav>
    <ul>
        <?php   if ($_SESSION['id']==1 or $_SESSION['id']==2){
                    echo '<li><a href="ajout_admin.php"';
                    if (basename($_SERVER['PHP_SELF'])=='ajout_admin.php') {echo 'class="active"';} else {echo 'class="admin_li"';}
                    echo '>Ajout admin</a></li>';
                    echo '<li><a href="liste_dons.php"';
                    if (basename($_SERVER['PHP_SELF'])=='liste_dons.php') {echo 'class="active"';} else {echo 'class="admin_li"';}
                    echo '>Liste des dons</a></li>';
                } ?>
        <li><a href="accueil.php" <?php if (basename($_SERVER['PHP_SELF'])=='accueil.php') {echo 'class="active"';} ?> >Accueil</a></li>
        <li><a href="aff_users.php" <?php if (basename($_SERVER['PHP_SELF'])=='aff_users.php') {echo 'class="active"';} ?> >Utilisateurs</a></li>
        <li><a href="aff_admins.php" <?php if (basename($_SERVER['PHP_SELF'])=='aff_admins.php') {echo 'class="active"';} ?> >Administrateurs</a></li>
        <li><a href="faire_don.php" <?php if (basename($_SERVER['PHP_SELF'])=='faire_don.php') {echo 'class="active"';} ?> >Faire un don</a></li>
        <li><a href="modification.php" <?php if (basename($_SERVER['PHP_SELF'])=='modification.php') {echo 'class="active"';} ?> >Infos persos</a></li>

        <li id="logout"><a href="deconnexion.php">Déconnexion</a></li>
        <li id="prenom"><?php echo $_SESSION['prenom'].' ('.$_SESSION['id'].')';?></li>
    </ul>
</nav>

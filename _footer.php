<div class=separateur>
<footer>
    <div id="somme_dons">
        <h4>Dons</h4>

        <p>
            <?php

            /** Connexion **/
            include "_connexion.php";

            /** Préparation et exécution de la requête **/
            $sql = "SELECT SUM(montant) AS sum FROM don";
            $resultset = $connexion->prepare($sql);
            $resultset->execute();

            /** Traitement du résultat **/
            $row = $resultset->fetch(PDO::FETCH_ASSOC);
            echo $row['sum'].'€ récoltés !';

            /** Déconnexion **/
            $connexion=null;

            ?> <a href="faire_don.php">Faire un don</a>
        </p>

    </div>
    <div id="facebook">
        <h4>La page Facebook <a href="https://www.facebook.com/candide.utc">Candide UTC</a></h4>
    </div>
    <div id="credits">
        <h4><a href="credits.php">Crédits</a></h4>
    </div>
    <div id="logo_utc">
        <img src="images/logo_utc.png">
    </div>
</footer>

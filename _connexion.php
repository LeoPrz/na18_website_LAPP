<?php
    try
    {
        $connexion = new PDO('pgsql:host=tuxa.sme.utc;port=5432;dbname=dbnf17p052', 'nf17p052', 'CZhheaS4');
    }
    catch(Exception $e)
    {
        die('Erreur 404 :'.$e->getMessage());
    }
?>

<?php
    session_start();

    spl_autoload_register(function($classe){
        require_once 'classes/'.$classe.'.class.php';
    });

    // connecteur à la BDD que l'on passe en proprété au manager de la classe categorie
    require_once 'inc/connexion.php';
    $categorieManager = new categorieManager($bdd);

    var_dump($_GET);
?>

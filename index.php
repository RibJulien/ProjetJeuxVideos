<?php
    spl_autoload_register(function($classe){
        require_once 'classes/'.$classe.'.class.php';
    });

    // connecteur à la BDD que l'on passe en proprété au manager de la classe Guitare
    require_once 'inc/connexion.php';
    $jeuManager = new JeuManager($bdd);
?>

<?php
    session_start();

    spl_autoload_register(function($classe){
        require_once 'classes/'.$classe.'.class.php';
    });

    // connecteur à la BDD que l'on passe en proprété au manager de la classe categorie
    require_once 'inc/connexion.php';
    $categorieManager = new categorieManager($bdd);

    if ($_GET['id']) {
        $categorieManager->deleteById($_GET['id']);
        $_SESSION["flash"]="La catégorie est bien supprimé";
    } else {
        $_SESSION["flash"]="Erreur dans l'id de la requête POST";
    }
    header('Location: categorie.index.php');
    exit();

var_dump($_GET);
?>

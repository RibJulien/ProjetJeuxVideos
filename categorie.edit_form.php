<?php
    session_start();

    include("inc/header.php");

    spl_autoload_register(function($classe){
        require_once 'classes/'.$classe.'.class.php';
    });

    // connecteur à la BDD que l'on passe en proprété au manager de la classe categorie
    require_once 'inc/connexion.php';
    $categorieManager = new categorieManager($bdd);

    if ($_POST['type']) {
        // Prépare une requête de type UPDATE.
        $update_categorie = $bdd->prepare('UPDATE categorie SET type = :type WHERE id = 25');
        $update_categorie->bindValue(':type', $_POST['type'], PDO::PARAM_STR);
        $update_categorie->execute();
        $_SESSION["flash"]="La categorie a bien été renommé";
    } else {
        $_SESSION["flash"]="Erreur lors du changement de type de la categorie";
    }
    header('Location: categorie.index.php');
    exit();
?>


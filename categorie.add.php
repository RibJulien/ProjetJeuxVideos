<?php
    session_start();

    spl_autoload_register(function($classe){
        require_once 'classes/'.$classe.'.class.php';
    });

    // connecteur à la BDD que l'on passe en proprété au manager de la classe Guitare
    require_once 'inc/connexion.php';
    $categorieManager = new categorieManager($bdd);

    if ($_POST['type']) {
        $categorie = new Categorie([
            'type' => $_POST["type"]
        ]);
        $categorieManager->add($categorie);
        $_SESSION["flash"]="Catégorie bien ajouté à la BDD";
    } else {
        $_SESSION["flash"]="Erreur dans le formulaire, l'input type est vide";
    }
    
    header('Location: categorie.index.php');
    exit();
?>

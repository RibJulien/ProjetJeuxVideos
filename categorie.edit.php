<?php
    session_start();

    include("inc/header.php");

    spl_autoload_register(function($classe){
        require_once 'classes/'.$classe.'.class.php';
    });

    // connecteur à la BDD que l'on passe en proprété au manager de la classe categorie
    require_once 'inc/connexion.php';
    $categorieManager = new categorieManager($bdd);

    $get_infos = $bdd->query('SELECT * FROM categorie WHERE id =' . $_GET['id']);
    $get_infos->execute();
    $result = $get_infos->fetchAll();
    echo "<pre>";
    print_r($result);
?>

<form action="categorie.edit_form.php" method="post">
    <input type="text" name="type" value=<?= $result[0]['type'] ?> required>
    <input type="submit" name="add">
</form>

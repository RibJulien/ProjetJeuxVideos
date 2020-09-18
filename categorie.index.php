<?php
    session_start();

    include("inc/header.php");

    

    if ($_SESSION['flash']) { echo '<div class="alert alert-info alert-dismissible fade show w-50 p-3 mt-2 mx-auto" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                    ' . $_SESSION['flash'] . '
                                    </div>';

                                    ;}
    spl_autoload_register(function($classe){
        require_once 'classes/'.$classe.'.class.php';
    });

    // connecteur à la BDD que l'on passe en proprété au manager de la classe Guitare
    require_once 'inc/connexion.php';
    $categorieManager = new categorieManager($bdd);

    // Liste les categorie dans la BDD
    $categories_Tab_Objet = $categorieManager->getListObjetsCategories();
    // var_dump($guitares_Tab_Objet);      
?>

<div class="text-center">
    <h1 class="titre">Ajouter une nouvelle categorie</h1>
    <form action="categorie.add.php" method="post">
        <input type="text" name="type" placeholder="Nom de catégorie" required><br>
        <input type="submit" class="btn btn-danger mt-2" name="add">
    </form>
</div>
<hr>
<table class="table table-primary text-center">
    <thead>
        <tr>
            <th scope="col">Nom de la categorie</th>
            <th scope="col">ID dans la BDD</th>            
            <th scope="col">Editer</th>
            <th scope="col">Supprimer</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($categories_Tab_Objet as $key => $value):?>
        <tr>
            <td><?= $value->getType(); ?></td>
            <td><?= $value->getId(); ?></td>
            <td><a href=<?= "categorie.edit.php?id=" . $value->getId(); ?> class="btn btn-info">Editer</a></td>
            <td><a href=<?= "categorie.delete.php?id=" . $value->getId(); ?> class="btn btn-info">Supprimer</a></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>




<?php
    include("inc/footer.php");
?>
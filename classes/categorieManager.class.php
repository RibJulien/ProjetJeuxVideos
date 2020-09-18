<?php

    class categorieManager {

        // connecteur à la BDD en propriété de l'objet
        private $pdo;

        // constructeur avec en paramètre le connecteur à la BDD
        public function __construct($pdo) {
            $this->pdo = $pdo;
        }


        
        // méthode pour creer une categorie en BDD
        public function add(Categorie $categorie) {
            // préparation de la requête SQL pour insérer dans la bdd
            $add_categorie = $this->pdo->prepare('INSERT INTO categorie(type)
                                                        VALUES(:type)');
            // bindValue — Associe une valeur à un paramètre
            // On associe les différentes variables aux marqueurs en respectant le type de chacunes
            $add_categorie->bindValue(':type', $categorie->getType(), PDO::PARAM_STR);
            // Exécution de la requête
            $add_categorie->execute();
            return ($add_categorie->rowCount());
        }


        // méthode pour effacer une guitare en BDD par son Id
        public function deleteById($id) {
            $this->pdo->beginTransaction();
            $delete_categorie = $this->pdo->query('DELETE FROM categorie WHERE id = '.$id);
            $this->pdo->commit();
        }


        // méthode qui retourne la liste des objets guitares en BDD
        public function getListObjetsCategories() {
        $categories = array();
        $list_categorie = $this->pdo->query('SELECT * FROM categorie;');
        while ($categorie = $list_categorie->fetch(PDO::FETCH_ASSOC)) {
            $categories[] = new Categorie($categorie);
        }
        return $categories;
        }
    }

?>
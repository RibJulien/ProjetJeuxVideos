<?php

    class Categorie {
        private $id;
        private $type;

        
        // Construct
        public function __construct(array $donnees) {
            foreach ($donnees as $key => $value) {
                // On récupère le nom du setter correspondant à l'attribut.
                $method = 'set'.ucfirst($key);
                // Si le setter correspondant existe.
            if (method_exists($this, $method)) {
                // On appelle le setter.
                $this->$method($value);
            }
        }
    }

        // Getters
        public function getId() { return $this->id; }
        public function getType() { return $this->type; }

        // Setters
        private function setId($id) {
            $this->id = $id;
        }

        private function setType($type) {
            $this->type = $type;
        }
        
    }

?>

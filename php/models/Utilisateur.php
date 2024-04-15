<?php
class Utilisateur {
    private $id;
    private $nom;
    private $email;
    private $motDePasse;

    public function __construct() {
        
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setMotDePasse($motDePasse) {
        $this->motDePasse = $motDePasse;
    }

    public function getId() {
        return $this->id;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getMotDePasse() {
        return $this->motDePasse;
    }
}
?>

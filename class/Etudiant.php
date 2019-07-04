<?php
 abstract class  Etudiant{
    private $matricule;
    private $nom;
    private $prenom;
    private $date_nais; 
    private $telephone;
    private $email; 

    public function __construct($matricule,$nom,$prenom,$date_nais,$telephone,$email)
    {
        $this->matricule = $matricule;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->date_nais = $date_nais;
        $this->telephone = $telephone;
        $this->email = $email;
    }
    public function getMatricule()
    {
        return $this->matricule;
    }
    public function setMatricule($matricule)
    {
        $this->matricule = $matricule;

    }
    public function getNom()
    {
        return $this->nom;
    }
    public function setNom($nom)
    {
        $this->nom = $nom;

    }
    public function getPrenom()
    {
        return $this->prenom;
    }
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

    }
    public function getDate_Naissance()
    {
        return $this->date_nais;
    }
    public function setDate_Naissance($date_nais)
    {
        $this->date_nais = $date_nais;
    }

    public function getTelephone()
    {
        return $this->telephone;
    }
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

    }
    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }
}            
?>
<?php
class NonBoursie extends Etudiant{
    private $adresse;

    public function __construct($matricule,$nom,$prenom,$date_nais,$telephone, $email,$adresse)
    {
        parent::__construct($matricule,$nom,$prenom,$date_nais,$telephone,$email);
        $this->adresse = $adresse;
    }
    public function getAdresse()
    {
        return $this->adresse;
    }
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }
}


?>
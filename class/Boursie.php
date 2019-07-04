<?php 
class Boursie extends Etudiant{
    protected $Id_pension;
    
    public function __construct($matricule="",$nom="",$prenom="",$date_nais="",$telephone="", $email="",$Id_pension="")
    {
        parent::__construct($matricule,$nom,$prenom,$date_nais,$telephone, $email);
        $this->Id_pension=$Id_pension;
    }
    
    public function getId_pension()
    {
        return $this->Id_pension;
    }
 
    public function setId_pension($Id_pension)
    {
        $this->Id_pension = $Id_pension;
        return $this;
    }
}
?>
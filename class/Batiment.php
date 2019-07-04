<?php
class Batiment extends EtLoge{
    private $num;
    private $nom;
   
    public function __construct($num="",$nom="")
    {
        $this->num = $num;
        $this->nom = $nom;
    }
    public function getNumBatiment()
    {
        return $this->num;
    }
    public function setNumBatiment($num)
    {
        $this->num = $num;
    }
    public function getNomBatiment()
    {
        return $this->nom;
    }
    public function setNomBatiment($nom)
    {
        $this->nom = $nom;
    } 
}
     
?>
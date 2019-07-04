<?php 
class Loge extends Boursie{
    private  $Idloge;
    private $id_chbre;
    public function __construct($matricule,$nom,$prenom,$date_naiss,$telephone,$email,$Idloge,$id_chbre)
    {
      parent::__construct($matricule,$nom,$prenom,$date_naiss,$telephone,$email);
      $this->Idloge=$Idloge;
      $this->id_chbre=$id_chbre;
    }
    public function getIdloge()
    {
        return $this->Idloge;
    }
    public function setIdloge($Idloge)
    {
        $this->Idloge = $Idloge;

        return $this;
    }
    public function getId_chbre()
    {
        return $this->id_chbre;
    }
    public function setId_chbre($id_chbre)
    {
        $this->id_chbre = $id_chbre;

        return $this;
    }
}
?>
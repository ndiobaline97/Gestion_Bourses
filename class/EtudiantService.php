<?php
$db = new PDO("mysql:host=localhost;dbname=Gestion_Bourses;charset=utf8", 'root', 'thiat97');
class EtudiantService
//connexion de la class à la BD
{
    private $db;
    public function __construct($connect)
    {
        $this->setDB($connect);
    }
    public function setDB(PDO $connect)
    {
        $this->db = $connect;
    }
    //ajout d'un étudiant dans la base de données.
    public function Add(Etudiant $etudiant)
    {
        //préparer la requète d'insertion. 
        $requete = $this->db->prepare('INSERT INTO Etudiant(matricule,nom,prenom,date_naiss,telephone,email)
            VALUES(:matricule,:nom,:prenom,:date_naiss,:telephone,:email)');
        //lier chaque marqueur à une valeur.
        $requete->bindValue(':matricule', $etudiant->getMatricule(), PDO::PARAM_STR);
        $requete->bindValue(':nom', $etudiant->getNom(), PDO::PARAM_STR);
        $requete->bindValue(':prenom', $etudiant->getPrenom(), PDO::PARAM_STR);
        $requete->bindValue(':date_naiss', $etudiant->getDate_naissance());
        $requete->bindValue(':telephone', $etudiant->getTelephone(), PDO::PARAM_INT);
        $requete->bindValue(':email', $etudiant->getEmail(), PDO::PARAM_STR);
        //exécuter la requète d'insertion.
        $a = $requete->execute();
        var_dump($a);
        //insèrer un étudiant non boursie
        $requete = $this->db->query('SELECT MAX(Id) AS variable FROM Etudiant');

        while ($last = $requete->fetch()) {
            $Id = $last['variable'];
            break;
        }
        if (get_class($etudiant) == 'NonBoursie') {
            $etudiant->getAdresse();
            $requete = $this->db->prepare('INSERT INTO EtNon_Boursie(Adresse,Id)VALUE(:Adresse,:Id)');
            $requete->bindValue(':Adresse', $etudiant->getAdresse(), PDO::PARAM_STR);
            $requete->bindValue(':Id', $Id, PDO::PARAM_INT);
            $b = $requete->execute();
            var_dump($b);
        }
        //insèrer un étudiant  boursie
       // $requete = $this->db->query('SELECT MAX(Id) AS Idrecup1 FROM Etudiant');
        while ($tab = $requete->fetch())
        {
            $Idrecup1 = $tab['Idrecup1'];
            break;
        }
       
        if (get_class($etudiant) == 'Boursie'){
            $requete = $this->db->prepare('INSERT INTO EtBoursie(Id,Id_pension)VALUE(:Id,:Id_pension)');
            
            $requete->bindValue(':Id', $Idrecup1, PDO::PARAM_INT);
            $requete->bindValue(':Id_pension',$etudiant->getId_pension(), PDO::PARAM_INT);
            $c = $requete->execute();
            var_dump($c);
        }
        while ($tab = $requete->fetch())
        {
            $Idrecup1 = $tab['Idrecup1'];
            break;
        }
        if(get_class($etudiant)=='Loge'){
            $requete = $this->db ->prepare('INSERT INTO Etloge(Id,Idloge,id_chbre)VALUE(:Id,:Idloge,:id_chbre)');
            $requete->bindValue(':Id', $Idrecup1, PDO::PARAM_INT);
            $requete->bindValue(':Idloge',$etudiant->getIdloge(), PDO::PARAM_INT);
            $requete->bindValue(':id_chbre',$etudiant->getId_chbre(), PDO::PARAM_INT);

            $c = $requete->execute();
        }
    }
            //afficher la liste des étudiants
            public function findAll(){
            $requete=$this->db->query('SELECT * FROM Etudiant');
            $tab=[];
            while($infos=$requete->fetch(PDO::FETCH_ASSOC))
            {
                $tab[]=$infos;
            }
            return $tab;
            }  
            //rerchercher un étudiant à partir de son matricule.
            public function find($matricule)
            {   
                $matricule = (string) $matricule;
                $requete=$this->db->query('SELECT * FROM Etudiant WHERE matricule='.$matricule);
                return $requete->fetch(PDO::FETCH_ASSOC);
            }            
            //afficher tous les Boursiés
            public function findAllBoursie()
            {   
                $requete=$this->db->query('SELECT * FROM Etudiant 
                                         INNER JOIN EtBoursie 
                                         ON  Etudiant.Id=EtBoursie.Id');
                $tab=[];

                while($infos=$requete->fetch(PDO::FETCH_ASSOC))
                {
                    $tab[]=$infos;
                }
                return $tab;
                //return $requete->fetch(PDO::FETCH_ASSOC);
            }
            //afficher un Boursié    
            public function findUnBoursie()
            {   
                $requete=$this->db->query(
                'SELECT FROM Etudiant 
                INNER JOIN Boursie 
                ON  Etudiant.Id=Boursie.Id
                WHERE Etudiant.Id=Id');
                //return $requete->fetch(PDO::FETCH_ASSOC);
            }
            //afficher les logés
            public function findAllloge()
            {
                $requete=$this->db->query('SELECT * FROM Etudiant 
                                            INNER JOIN Etloge
                                            ON Etudiant.Id=Etloge.Id');
                $tab=[];
                while($infos=$requete->fetch(PDO::FETCH_ASSOC))
                {
                    $tab[]=$infos;
                }
                return $tab;
                $y = $requete->execute();
                } 
                
            }

                //$recteur = new EtudiantService($db);
                //$etudiant1 = new  NonBoursie('C800','NDIAYE','Hadj','1997-07-02',774521368,'cheikh22@gmail.com','Diamniadio');
                //$liste=$recteur->findAll;
                //$unboursie=$recteur->find('A01');
                //$toutboursie=$recteur->findToutBoursie()
                //var_dump($etudiant1);

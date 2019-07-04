<?php
//ouverture d'une connexion à la BD nommée  Gestion_University
class Database{
    
    public static function connect()
    {
        try
        {
            // self::$connection= new PDO("mysql:host=" .self::$dbhost .";dbname=". self::$dbName,self::$dbUser,self::$dbUserpwd);
            $connection=new PDO("mysql:host=localhost;dbname=Gestion_Bourses;charset=utf8", 'root', 'thiat97');
        }
   
        catch(PDOException $e)
        {
            die ($e->getMessage());
            
        } 
        return $connection;
       
    }

        public static function disconnect()
        {
            self::$connection=null;
        }
}

?>
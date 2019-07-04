<?php
class Autoloader{
    static function register(){
    spl_autoload_register(array(__CLASS__,'autoload'));
    }
    static function autoload($nom_class){
        $nom_class=str_replace(__NAMESPACE__.'\\','',$nom_class);
        require __DIR__.'/'.$nom_class.'.php';
    }
}
?>
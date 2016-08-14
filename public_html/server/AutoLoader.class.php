<?php

namespace server;

Class AutoLoader {

    private static $_path;
    private static $_class;
    private static $obj;

    private function __construct($name,$type) {

        switch ($type) {

            case 'clientController' :
                self::$_path  = $_SERVER['DOCUMENT_ROOT'].'client/Controller/'.ucfirst($name).'.controller.php';
                self::$_class = ucfirst($name).'Controller';
                break;
            case 'clientModel' :
                self::$_path = $_SERVER['DOCUMENT_ROOT'].'clinet/Model/'.ucfirst($name).'.model.php';
                self::$_path = ucfirst($name).'Model';
                break;
        }


    }

    public static function getClass($name,$type) {
        if(self::$obj === null){
            static::$obj = new AutoLoader($name,$type);
        }
        require_once self::$_path;
        return new self::$_class;
    }


}

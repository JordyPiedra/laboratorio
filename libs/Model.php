<?php

Class Model{

	private static $_instance;
    private static $SERVER=null;
	private function __construct(){
	}

	public static function getInstance($SERVER){
          if(!isset(self::$_instance) ||  self::$SERVER!=$SERVER){ 
            switch ($SERVER) {
              
                case 'MYSQL-LAB':
                    self::$_instance = new PDOManager('mysql', 'localhost', 'root', '', 'inv_lab');
                    break;
                
                default:
                    # code...
                    break;
            }
          self::$SERVER=$SERVER; 
        }
 
        if(!isset(self::$_instance)){
            self::$SERVER=null;
            throw new Exception('Database connection cannot be established');
        }
        return self::$_instance;
 
    }
}
?>
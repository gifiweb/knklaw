<?php

namespace application\core;

class Db {
    private static $mysqlOptions = array(
        'host' => 'localhost',
        'user' => 'root',
        'pass' => '',
        'db'   => 'hospitab'
    );
    private static $_dbConnection;

    private function __construct(){
    }

    private function __clone() {
    }

    private function __wakeup() {
    }

    public static function GetConnection(){
        if (self::$_dbConnection === null){
            self::$_dbConnection = new SafeMySQL(self::$mysqlOptions);
        }
        return self::$_dbConnection;
    }
}
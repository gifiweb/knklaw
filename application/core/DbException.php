<?php

/**
 * @package Framework.
 *
 * @copyright   Copyright (c) 2015, AlexGefter <galaxy.gef@gmail.com>
 * @license     MIT
 */
namespace application\core;

class DbException extends Exception {
    public $query;

    public function __construct($errorCode, $errorMessage, $errorFile, $errorLine, $errorQuery){
        $this -> message = $errorMessage;
        $this -> code = $errorCode;
        $this -> file = $errorFile;
        $this -> line = $errorLine;
        $this -> query = $errorQuery;
    }

    public function getQuery(){
        return $this -> query;
    }
} 
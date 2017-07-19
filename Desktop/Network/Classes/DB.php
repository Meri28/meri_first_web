<?php

/**
 * Created by PhpStorm.
 * User: meri
 * Date: 7/19/17
 * Time: 4:09 PM
 */
class DB
{
    private static $_instance = null;
    private
        $_error = false,
        $_results,
        $_count = 0;

    private function __construct()
    {
        $this->dataBase = null;

    }
}

public
static function getInstance()
{
    if (!isset(self::$_instance)) {
        self::$_instance = new DB();
    }
    return self::$_instance;
}
}


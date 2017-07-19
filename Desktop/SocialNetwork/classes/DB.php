<?php


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


<?php
/**
 * Created by PhpStorm.
 * User: meri
 * Date: 7/19/17
 * Time: 1:15 AM
 */

class Hash{
    public static function make($string, $salt = ''){
        return hash('sha256', $string . $salt);
    }

    public static function salt($length) {
        return mcrypt_create_iv($length);
    }

    public static function unique(){
        return self::make(uniqid());
    }
}

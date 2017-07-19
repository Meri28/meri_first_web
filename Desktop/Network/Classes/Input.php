<?php
/**
 * Created by PhpStorm.
 * User: meri
 * Date: 7/18/17
 * Time: 8:04 PM
 */


class Input {
    public static function exists ($type='post'){
        switch ($type) {
            case 'post':
                return (!empty($_POST)) ? true : false;
        break;
        case 'get':
                return (!empty($_GET)) ? true : false;
            break;
            default:
         return false;
             break;

    }
}

}

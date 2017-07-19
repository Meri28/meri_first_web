<?php
/**
 * Created by PhpStorm.
 * User: meri
 * Date: 7/18/17
 * Time: 7:46 PM
 */

class  Config {
    public static function get ($path= null) {
        if($path) {
        $config = $GLOBALS ['config'];
        $path = explode ('/', $path);

        foreach ($path as $bit) {
            if (isset($config[$bit])) {
             $config = $config[$bit];
       }
   }
       return $config;
    }
}
}

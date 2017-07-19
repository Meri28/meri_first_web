<?php
/**
 * Created by PhpStorm.
 * User: meri
 * Date: 7/18/17
 * Time: 7:35 PM
 */

function escape($string) {
    return htmlentities($string, ENT_QUOTES, 'UTF-8');
}

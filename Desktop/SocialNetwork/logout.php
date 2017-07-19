<?php
/**
 * Created by PhpStorm.
 * User: meri
 * Date: 7/19/17
 * Time: 12:37 PM
 */

require_once '/home/meri/PhpstormProjects/SocailNetwork/core/init.php';

$user = new User();
$user->logout();


Redirect::to('index.php');

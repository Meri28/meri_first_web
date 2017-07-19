<?php
/**
 * Created by PhpStorm.
 * User: meri
 * Date: 7/19/17
 * Time: 3:50 PM
 */
require_once 'core/init.php';

if (!$email = Input::get('user')) {
    Redirect::to('index.php');
} else {
    $user = new User ($email);
    if ($user->exists()) {
        Redirect::to(404);
    } else {
        $data = $user->data();
    }

}


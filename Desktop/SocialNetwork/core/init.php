<?php
/**
 * Created by PhpStorm.
 * User: meri
 * Date: 7/18/17
 * Time: 5:59 PM
 */

session_start();


$GLOBALS['config'] = array(
    'mysql' => array(
        'host' => '138.197.120.67',
        'username' => 'root',
        'password' => '',
        'db' => 'lr'
    ),
    'remember' => array(
        'cookie_name' => 'hash',
        'cookie_expiry' => 604800
    ),

    'session' => array(
        'session_name' => 'user'
    )

);

spl_autoload_register(function ($class) {
    require_once 'classes/' . $class . '.php';
});

require_once 'functions/sanitize.php';


if (Cookie::exists(Config::get('remember/cookie_name')) && !Session::exists(Config::get('session/session_name'))) {
    ;
}
$hash = Cookie::get(Config::get('remember/cookie_name'));
$hashCheck = DB::getInstance()->get('users_session', array('hash', '=', $hash));
if ($hashCheck->count()) {
    $user = new User($hashCheck->first()->user_id);
    $user->login();
}

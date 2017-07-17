<?php


if (is_array($_FILES['profile_picture'])) {

    $fileInfo = $_FILES[ 'profile_picutre'];
    $name = $fileInfo['name'];
    $tmpName = $fileInfo['tmp_name'];

    $extension = pathinfo($name, PATHINFO_EXTENSION);
    $nameTobe  = time() . '.' . $extension;
    $targertDirectory = 'var/www/html/SocialNetwork';
    move_uploaded_file($tmpName, $targertDirectory);

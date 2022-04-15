<?php
    require_once __DIR__.'/../class/user.php';

    function login($name,$pass){
        $user = new User;
        $user->login($_SESSION['user_id'],$name,$pass);
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_name'] = $user->name;
        $_SESSION['login'] = true;
        return $user->id;
    }

?>
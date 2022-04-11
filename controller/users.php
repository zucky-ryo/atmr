<?php
    require_once __DIR__.'/../class/user.php';

    function login($name,$pass){
        $user = new User;
        $user->login($_SESSION['user_id'],$name,$pass);
        $_SESSION['user_id'] = $user->id;
        $_SESSION['login'] = true;
        $json = ['type' => $_SESSION['type'], 's_type' => $_SESSION['s_type']];
        return $json;
    }

?>
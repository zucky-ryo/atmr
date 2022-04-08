<?php
    require_once __DIR__.'/../class/user.php';

    function ck_session(){
        $user = new User;
        if(isset($_SESSION['user_id'])){
            $user->getUser($_SESSION['user_id']);
            $json = ['type' => $_SESSION['type'], 's_type' => $_SESSION['s_type']];
        }else{
            $user->insertGuest();
            $json = ['type' => 0, 's_type' => 0];
        }
        $_SESSION['user_id'] = $user->id;
        return $json;
    }

    function login($name,$pass){
        $user = new User;
        $user->login($_SESSION['user_id'],$name,$pass);
        $_SESSION['user_id'] = $user->id;
        $_SESSION['login'] = true;
        $json = ['type' => $_SESSION['type'], 's_type' => $_SESSION['s_type']];
        return $json;
    }

?>
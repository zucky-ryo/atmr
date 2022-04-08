<?php
    require_once __DIR__.'/../class/user.php';

    function ck_session(){
        $user = new User;
        if(isset($_SESSION['user_id'])){
            $user->getUser($_SESSION['user_id']);
            $json = ['type' => $_SESSION['type'], 's_type' => $_SESSION['s_type']];
        }else{
            $user->insertGuest();
            $json = ['type' => 0, 's_type' => ""];
        }
        $_SESSION['user_id'] = $user->id;
        return $json;
    }


?>
<?php
    require_once __DIR__.'/../class/user_item.php';

    function checkItem($user_id,$item_id){
        $user_item = new UserItem;
        $result = $user_item->checkItem($user_id,$item_id);
        return $result;
    }
?>
<?php

    $text = file_get_contents('../data/kagu.txt');
    $text = json_decode(json_decode($text,true),true);
    var_dump($text);


?>
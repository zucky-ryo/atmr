<?php
    $text = file_get_contents('../data/kagu.txt');
    $text = json_decode($text,true);
    var_dump($text);
?>
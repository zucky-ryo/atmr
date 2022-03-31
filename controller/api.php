<?php
    require_once __DIR__.'/../controller/items.php';

    $deb = "デバッグ";
    if($_GET['sw'] == "show_page"){
        $type = $_GET['type'];
        $s_type = $_GET['s_type'];
        $items = getItem($type,$s_type);

        $html = "";
        $html .= sprintf("<div class=''>");
        $html .= sprintf("<ul class=''>");
        foreach($items as $item){
            $html .= sprintf("<li>");
            $html .= sprintf("<div>%s</div>",$item['name']);
            $html .= sprintf("<div><img src='%s'></div>",$item['img']);
            $html .= sprintf("<div>%s</div>",$item['color']);
            $html .= sprintf("</li>");
        }
        $html .= sprintf("</>");
        $html .= sprintf("</div>");

        $json = ['html' => $html];
    }

    $json['deb'] = $deb;
    echo json_encode($json);
    exit;

?>
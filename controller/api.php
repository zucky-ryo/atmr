<?php
    require_once __DIR__.'/../controller/items.php';

    $deb = "デバッグ";
    if($_GET['sw'] == "show_page"){
        $type = $_GET['type'];
        $s_type = $_GET['s_type'];
        $items = getItem($type,$s_type);

        $html = "";
        $html .= sprintf("<div class=''>");
        $html .= sprintf("<div class='row'>");
        foreach($items as $item){
            $html .= sprintf("<div class='col-2'>");
            $html .= sprintf("<div style='font-size: 8px; font-weight: bold;'>%s</div>",$item['name']);
            $html .= sprintf("<div><img src='%s' width='100%%'></div>",$item['img']);
            $html .= sprintf("<div style='font-size: 8px; font-weight: bold;'>%s</div>",$item['color']);
            $html .= sprintf("</div>");
        }
        $html .= sprintf("</div>");
        $html .= sprintf("</div>");

        $json = ['html' => $html];
    }

    $json['deb'] = $deb;
    echo json_encode($json);
    exit;

?>
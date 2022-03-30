<?php
    require_once './items.php';

    $deb = "";
    if($_POST['sw'] == "show_page"){
        $type = $_POST['type'];
        $s_type = $_POST['s_type'];
        $items = getItem($type,$s_type);

        $html = "";
        $html .= sprintf("<div class=''>");
        $html .= sprintf("<div class=''>");
        foreach($items as $item){
            $html .= sprintf("<div>");
            $html .= sprintf("<div>%s</div>",$item['name']);
            $html .= sprintf("<div><img src='%s'></div>",$item['img']);
            $html .= sprintf("<div>%s</div>",$item['color']);
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
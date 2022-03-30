<?php
    $conn = MySQLi_connect("localhost","atmr_user","tqVgK4RY.i/Cjr-T","animal_comp");
	MySQLi_Set_Charset($conn,"utf8");

	// 文字列変換用関数
	function post_to_db($tmp) {
		if(!is_array($tmp)) {
			$tmp = mb_convert_kana($tmp, 'k');
			$tmp = trim(mb_convert_kana($tmp,"KVa","utf-8"));
			$tmp = mb_convert_kana(mb_convert_kana($tmp, 'h'), 'HV');
			$tmp = mb_ereg_replace("\"\t*([^\"\t]*)\t*\"","\\1",$tmp);
			$tmp = htmlspecialchars($tmp,ENT_QUOTES,"utf-8");
			$tmp = mb_ereg_replace("^[　 ]+","",$tmp);
			$tmp = mb_ereg_replace("[　 ]$","",$tmp);
			$tmp = mb_ereg_replace("\r","",$tmp);
			$tmp = mb_ereg_replace("\n","&br;",$tmp);
			$tmp = mb_ereg_replace("\t","&tab;",$tmp);
		} else {
			$new_tmp = array();
			foreach($tmp as $tmp_key => $tmp_val) {
				$new_tmp[$tmp_key] = post_to_db($tmp_val);
			}
			$tmp = $new_tmp;
		}
		return($tmp);
	}
	function db_to_html($tmp) {
		// htmlタグの許可
		$tmp = htmlspecialchars_decode($tmp,ENT_QUOTES);
		$tmp = strip_tags($tmp,'<font><a><span>');
		// 他のタグの表示
		$tmp = mb_ereg_replace("&br;","<br>",$tmp);
		$tmp = mb_ereg_replace("&tab;"," ",$tmp);
		return($tmp);
	}
	function db_to_data($tmp) {
		if(!is_array($tmp)) {
			$tmp = mb_ereg_replace("&br;","\n",$tmp);
			$tmp = mb_ereg_replace("&tab;"," ",$tmp);
			$tmp = htmlspecialchars_decode($tmp,ENT_QUOTES);
			//$tmp = strip_tags($tmp);
		} else {
			$new_tmp = array();
			foreach($tmp as $tmp_key => $tmp_val) {
				$new_tmp[$tmp_key] = db_to_data($tmp_val);
			}
			$tmp = $new_tmp;
		}
		return($tmp);
	}
	function db_to_pdf($tmp) {
		$tmp_childa = "\xE3\x80\x9C";
		$tmp = mb_ereg_replace("&br;","\n",$tmp);
		$tmp = mb_ereg_replace("&tab;"," ",$tmp);
		$tmp = htmlspecialchars_decode($tmp,ENT_QUOTES);
		$tmp = strip_tags($tmp);
		$tmp = mb_ereg_replace("～",$tmp_childa,$tmp);
		return($tmp);
	}
	function db_to_txt($tmp) {
		$tmp = mb_ereg_replace("&br;","*",$tmp);
		$tmp = mb_ereg_replace("&tab;"," ",$tmp);
		$tmp = htmlspecialchars_decode($tmp,ENT_QUOTES);
		$tmp = mb_ereg_replace("\"","”",$tmp);
		return($tmp);
	}
	function db_to_excel($tmp) {
		$tmp = mb_ereg_replace("&br;","",$tmp);
		$tmp = mb_ereg_replace("&tab;"," ",$tmp);
		$tmp = htmlspecialchars_decode($tmp,ENT_QUOTES);
		$tmp = mb_ereg_replace("'","’",$tmp);
		$tmp = mb_ereg_replace("\"","”",$tmp);
		$tmp = mb_ereg_replace(",","，",$tmp);
		return($tmp);
	}

	function array2xml($array, $node_name="root") {
		$dom = new DOMDocument();
		$dom->encoding = "sjis";
		$dom->formatOutput = true;
		$root = $dom->createElement($node_name);
		$dom->appendChild($root);
		$array2xml = function ($node, $array) use ($dom, &$array2xml) {
			foreach($array as $key => $value){
				if(is_array($value)) {
					$attr = "";
					if($key == "") {
						$key = "no_key";
					} else if(mb_ereg("_",$key)) {
						$key_box = explode("_",$key);
						$key = $key_box[0];
						$attr = $key_box[1];
					} else if(mb_ereg("^[0-9]+$",$key)) {
						$key = "no_key";
					}
					$n = $dom->createElement($key);
					if($attr != "") {
						$attr_ele = $dom->createAttribute('num');
						$attr_ele->value = $attr;
						$n->appendChild($attr_ele);
					}
					$node->appendChild($n);
					$array2xml($n, $value);
				} else {
					if(mb_ereg("^[0-9]*$",$key)) {
						$attr = $dom->createElement("K".$key);
					} else {
						$attr = $dom->createElement($key);
					}
					$attr_val = $dom->createTextNode($value);
					$attr->appendChild($attr_val);
					$node->appendChild($attr);
				}
			}
		};
		$array2xml($root, $array);
		return $dom->saveXML();
	}
?>

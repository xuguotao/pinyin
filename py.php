<?php
error_reporting(1);
include_once('./py_table.php');
if(!empty($_GET['py'])){
    $result = '';
    $arr = preg_split("//u", trim($_GET['py']), -1, PREG_SPLIT_NO_EMPTY);
	for( $i=0; $i<count($arr); $i++){
        $escapeString = strtoupper(str_replace('"','',json_encode($arr[$i])));
        if (isset($pinyin[$escapeString])) {
            $result .= $pinyin[$escapeString];
        } else {
            $result .= $arr[$i];
        }
	}
    if ($result == '') {
        echo $_GET['py'];
    } else {
        $reg = '/[a-zA-Z0-9]+/is';
        preg_match_all($reg,$result,$resultArray);
        if (isset($resultArray[0])) {
            echo implode("", $resultArray[0]);
        } else {
            echo '';
        }
    }
    exit();
}

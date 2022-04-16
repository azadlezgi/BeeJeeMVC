<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

function debug($arr) {
    echo "<pre>";
    print_r($arr);
    echo "</pre>";
}

function stripinput($text) {
    if (!is_array($text)) {
        $text = stripslashes(trim($text));
        $text = preg_replace("/(&amp;)+(?=\#([0-9]{2,3});)/i", "&", $text);
        $search = array("&", "\"", "'", "\\", '\"', "\'", "<", ">", "&nbsp;");
        $replace = array("&amp;", "&quot;", "&#39;", "&#92;", "&quot;", "&#39;", "&lt;", "&gt;", " ");
        $text = str_replace($search, $replace, $text);
    } else {
        foreach ($text as $key => $value) {
            $text[$key] = stripinput($value);
        }
    }
    return $text;
}
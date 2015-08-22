#!/bin/php

<?php

include 'vendor/autoload.php';

function startsWith($haystack, $needle) { return $needle === "" || strrpos($haystack, $needle, -strlen($haystack)) !== FALSE; }

$urls = file("urls");

foreach($urls as $k => $url){

  //some lines are new.
  //others are

  $url = str_replace("\n", "", $url);

  if( startsWith($url, "http") ){
    
      $parts = explode(" ", $url);
      $url = array_shift($parts);

      if( in_array("pod", $parts) ){
        
        $data = file_get_contents($url);

        $dom = new DomDocument();

        $dom->recover = true;

        $dom->loadXML($data);

        @$title = $dom->getElementsByTagName('title');

        $arr = ["name" => $title->item(0)->nodeValue, "url" => $url];

        $pods[] = $arr;

        print_r($arr);

      }

  }

}

//extract('pods' => $pods);
ob_start();
include("template.php");
$opml = ob_get_clean();

file_put_contents("opml.xml", $opml);


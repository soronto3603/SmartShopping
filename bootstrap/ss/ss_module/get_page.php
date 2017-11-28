<?php
function GetPage($url){
  $ch = curl_init();

  $headers[]  = "User-Agent:Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.9.2.13) Gecko/20101203 Firefox/3.6.13"; // <-- this is user agent
  $headers[]  = "Accept:text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8";
  $headers[]  = "Accept-Language:en-us,en;q=0.5";
  $headers[]  = "Accept-Encoding:gzip,deflate";
  $headers[]  = "Accept-Charset:ISO-8859-1,utf-8;q=0.7,*;q=0.7";
  $headers[]  = "Keep-Alive:115";
  $headers[]  = "Connection:keep-alive";
  $headers[]  = "Cache-Control:max-age=0";

  curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
  curl_setopt($ch,CURLOPT_URL,$url);
  curl_setopt($ch,CURLOPT_POST,false);   //GET 전송방식
  curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
  return $response=curl_exec($ch);
}
?>

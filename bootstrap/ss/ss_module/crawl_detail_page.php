<?php
  $url=$_POST['url'];
  $url="http://adgate.gmarket.co.kr/core/click?nextUrl=http%3A%2F%2Fitem.gmarket.co.kr%2FItem%3Fgoodscode%3D1109712456%26pos_shop_cd%3DSH%26pos_class_cd%3D111111111%26pos_class_kind%3DT%26keyword_order%3Dcamera%26keyword_seqno%3D13369179498%26search_keyword%3Dcamera&data=7ED45AA75C9DC93D0A2934CA743445B3E40C21BDA997FF13030770CCFC359CDBC718AD29B0908274014661439E59F110A6E299C4A59B9FC8ACABB7C31980A40EABE0BF72D46A1E33F14558D4BDF2B95195CB2958521D6D93A0337B1FD20A3C07A1A8016B1472B7EE24CE95096BDAE744516DBFD414505AC5F0A51389DE06965922718AF167527FF55994DD7CF1C08AC4E45DB1B3776E2AD08D25EEB60937D0087BAAA682619E2A0D485C429E15CFB2472BEF6DE92FD0E8D6C2D4D8D4DA95B04D70FED2DB43E17E48D9075593D613EE46B6A9C581C2FF294CF4662E5A67DE0278B48C907F2EF81EC82EE931AC6501C94F62A3350137DA1C0F9D3C558E070FCD4C&referrer=http%3A%2F%2Fwww.gmarket.co.kr%2F&type=1&seq=18721977594";
  $type=$_POST['type'];
  $type=1;
  include("get_page.php");

  if($type==1){
    $html=iconv("euckr","utf-8",GetPage($url));
    preg_match("/location.replace..[^']*/",$html,$match);
    $url=preg_replace("/location.replace../","",$match[0]);
    $html=GetPage($url);
    preg_match("/itemtit..[^<]*/",$html,$match);
    $title=preg_replace("/itemtit../","",$match[0]);
    preg_match("/price_real..[^<]*/",$html,$match);
    $price=preg_replace("/price_real../","",$match[0]);
    preg_match("/item.topinfowrap([^>]*>){5}[^\"]*\"[^\"]*/",$html,$match);
    echo $img=preg_replace("/item.topinfowrap([^>]*>){5}[^\"]*\"/","",$match[0]);
  }else if($type==2){


  }else if($type==3){

  }
?>

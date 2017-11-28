<?php
  $url=$_POST['url'];
  $type=$_POST['type'];
  $url="http://search.11st.co.kr/SearchPrdAction.tmall?method=getTotalSearchSeller&isGnb=Y&prdType=&category=&cmd=&pageSize=&lCtgrNo=&mCtgrNo=&sCtgrNo=&dCtgrNo=&fromACK=&semanticFromGNB=&gnbTag=TO&schFrom=&schFrom=&ID=&ctgrNo=&srCtgrNo=&keyword=&adUrl=&adKwdTrcNo=1201711204881284362&adPrdNo=443697330&targetTab=T&kwd=%BA%ED%B7%E7%C5%F5%BD%BA+%BD%BA%C7%C7%C4%BF";
  $type=2;
  include("get_page.php");
  $html=iconv("euckr","utf-8",GetPage($url));
  if($type==1){
    $html=preg_replace("/<span class=\"brand\">[^<]*<\/span>/","",$html);
    preg_match_all("/item_info([^>]*>){50}/",$html,$matchs);
    $url_array=array();
    foreach($matchs[0] as $v){
      preg_match("/item_info..\s*.div.class..icon..\s*<....>\s*.a.href..[^\"]*/",$v,$match);
      $url=preg_replace("/item_info..\s*.div.class..icon..\s*<....>\s*.a.href../","",$match[0]);
      array_push($url_array,$url);
    }
    echo json_encode($url_array);
  }else if($type==2){
    preg_match_all("/list_info..\s*.p\sclass..info_tit..\s*<a\shref..[^\"]*/",$html,$match);
    $match=preg_replace("/list_info..\s*.p\sclass..info_tit..\s*<a\shref..*/","",$match);
    print_r($match);
    //preg_match_all("/<div class=\"total_listitem\"+.*<\/div>/",$html,$matchs);
    // $url_array = array();
    // foreach($matchs[0] as $v){
    //   preg_match("/list_info..\s*.p\sclass..info_tit..\s*<a\shref..[^\"]*/",$v,$match);
    //   $url= preg_replace("/list_info..\s*.p\sclass..info_tit..\s*.a.href../","",$match[0]);
    //   array_push($url_array,$url);
    // }
    //echo json_encode($match);
  }else if($type==3){

  }
?>

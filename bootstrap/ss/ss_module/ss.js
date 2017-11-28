//GMARKET URL
var gmarket_search_url="http://search.gmarket.co.kr/search.aspx?selecturl=total&sheaderkey=&gdlc=&SearchClassFormWord=goodsSearch&keywordOrg=&keywordCVT=&keywordCVTi=&keyword=";

//11street URL
var street11_search_url="http://search.11st.co.kr/SearchPrdAction.tmall?method=getTotalSearchSeller&isGnb=Y&prdType=&category=&cmd=&pageSize=&lCtgrNo=&mCtgrNo=&sCtgrNo=&dCtgrNo=&fromACK=&semanticFromGNB=&gnbTag=TO&schFrom=&schFrom=&ID=&ctgrNo=&srCtgrNo=&keyword=&adUrl=&adKwdTrcNo=1201711144874544936&adPrdNo=7549175&targetTab=T&kwd="

//AUCTION URL
var auction_search_url="http://search.auction.co.kr/search/search.aspx?keyword=asd&itemno=&nickname=&frm=hometab&dom=auction&isSuggestion=No&retry=&Fwk=asd&acode=SRP_SU_0100&arraycategory=&encKeyword=";

var search_word="";

function get_search_url(flag){
  if(flag==1) return gmarket_search_url+search_word;
  else if(flag==2) return street11_search_url+search_word;
  else if(flag==3) return auction_search_url+search_word;
}
function product_json_process(json){
  var json_obj=JSON.parse(json);
  console.log(json);
}
function crawl_page(){
  set_search_word();
  var url=new Array();
  for(var i=1;i<4;i++){
    url[i-1]=get_search_url(i);
  }
  add_notification("Start searching on Gmarket ::"+search_word);
  $.post("../ss_module/crawler.php",{url:url[0],type:1}).done((r)=>{
    add_notification("End to search Gmarket");
    var obj=JSON.parse(r);
    document.getElementById('gmarket_no').innerHTML=obj.length;
    $.post("../ss_module/crawl_detail_page.php",{url:obj[0],type:1}).done((r)=>{
      console.log(r);
    });

     // for(var i=0;i<obj.length;i++){
     //   $.post("../ss_module/crawl_detail_page.php",{url:obj[i],type:1}).done((r)=>{
     //     console.log(r);
     //
     //   });
     // }
    product_json_process(r);
  });
  add_notification("Start searching on 11-Street ::"+search_word);
  $.post("../ss_module/crawler.php",{url:url[1],type:2}).done((r)=>{
    add_notification("End to search 11-Street");


  });
  add_notification("Start searching on Auction ::"+search_word);
  $.post("../ss_module/crawler.php",{url:url[2],type:3}).done((r)=>{
    add_notification("End to search Auction");
  });
}
function add_notification(str){
  var html='<a href="#" class="list-group-item">';
  html+='<i class="fa fa-upload fa-fw"></i> '+str;
  html+='<span class="pull-right text-muted small"><em>'+Date.now()+'</em>';
  html+='</span></a>';
  document.getElementById('notiication_panel').innerHTML=html+document.getElementById('notiication_panel').innerHTML;
}
function set_search_word(){
  search_word=$('#search_input').val();
}

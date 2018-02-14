
$("document").ready(function(){
  checkSize();


});
function checkSize(){
    if ($("#wrapper_home").css("width") == "360px" ){
      $("#nav_bar").html("<img id='menu_tap' src='images/menu.png' alt='Menu Logo'>");
      $("#nav_bar").append("<h1>" +$(location).attr('pathname').replace('http://shenkar.html5-book.co.il/2017-2018/html5/dev_249/','').replace('.php','')+"</h1>");
        $("#menu_tap").on("click", function () {
              $("#nav_bar").append("<ul>"+
                "<li><img src='images/yam_profile.png'></li>"
                +"<li><a href='#' alt='Settings'><span>Settings</span></a></li>"
                +"<li><a href='borrow.php' alt='Borrow a Book'><span>Borrow a Book</span></a></li>"
                +"<li><a href='return.php' alt='Return a Book'><span>Return a Book</span></a></li>"
                +"<li><a href='#' alt='Waiting List'><span>Waiting List</span></a></li>"
                +"<li><a href='#' alt='History'><span>History</span></a></li>"
                +"<div id='clear'></div>"
              +"</ul>");

                $("#menu_tap").css({"display":"block","position":"relative","left":"190px","top":"35px"});
                $("h1").css({"position":"relative","left":"180px","top":"10px"});
                $("body").toggleClass('push-toright');
                $("#nav_bar").css({"position":"fixed","left":"0","top":"0"});
          });

      }
}

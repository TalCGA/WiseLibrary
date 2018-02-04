$(document).ready(function(){
  $("#bad_login").hide();
  // $("#closeLogin").click(function(){
  //   $("#login").hide();
  // });

  $("#login_btn").click(function(){

    var a=$("#").val();
    var b=$("#psw").val();
    var checkval = false;

    $.getJSON('data/db.json', function(data)
    {
      console.log(data);
    //     $.each(data,function(i,obj)
    //     {
    //         if(obj.email == a && obj.psw == b)
    //         {
    //             checkval = true;
    //             return false;
    //         }
    //
    //     });
    //      if(checkval == true)
    //     {
    //         alert("login correct");
    //         console.log("bla bla bla2");
    //     }
    // else
    //     {
    //       $("#bad_login").show();
    //     }

    });


});
})

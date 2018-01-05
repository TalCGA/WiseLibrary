$(document).ready(function(){
  $("#login").hide();
  $("#click-login").click(function(){
    $("#login").show();
  });
  $("#closeLogin").click(function(){
    $("#login").hide();
  });

  $("#btn-login").click(function(){

    var a=$("#userName").val();
    var b=$("#password").val();
    var checkval = false;

    $.getJSON('db.json', function(data)
    {
        $.each(data,function(i,obj)
        {
            if(obj.username == a && obj.password == b)
            {
                checkval = true;
                return false;
            }
        });
         if(checkval == true)
        {
            alert("login correct");
        }
    else
        {
            alert("!!!!!-----Incorrect login Details-----!!!!!");
        }

    });


});
})

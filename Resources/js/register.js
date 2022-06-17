//Register check
$("button[id='btn-register']").click(function(){
    var valid_username = false;
    var valid_password = false;
    var username = $("#username").val();
    var password = $("#password").val();
    var regex_username = /^[a-z0-9_.]{3,255}$/;
    var regex_password = /^[a-zA-Z0-9]{8,255}$/;
    if(regex_username.test(username)){//Check regex username
        valid_username = true;
        $("#wrong-un").css("display", "none");
    } else{
        valid_username = false;
        $("#wrong-un").css("display", "block");
    }
    if(regex_password.test(password)){//Check regex password
        valid_password = true;
        $("#wrong-pw").css("display", "none");
    } else{
        valid_password = false;
        $("#wrong-pw").css("display", "block");
    }
    if(valid_username && valid_password){
        $(this).html("<button disabled id='btn-register'><span class='spinner-border spinner-border-sm'></span> Loading ...</button>");
        setTimeout(() => {
            $(this).parent().children("form").submit();
        }, 1500);
    }
});
//Focus input
$("input").focus(function(){
    $("#wrong-un").css("display", "none");
    $("#wrong-pw").css("display", "none");
});
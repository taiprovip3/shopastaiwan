//Confirm Box
$("button[id='show-confirm-box']").click(function(){
    var x = $(this).parent().find("b[id='acc-id']").text();
    $("input[name='acc-id']").val(x);
    $("#confirm-box").modal('show');
});
$("#accept").click(function(){
    $(this).html('<button class="btn btn-sm text-success" disabled><span class="spinner-border spinner-border-sm"></span> Loading...</button>');
    setTimeout(() => {
        $(this).parent().parent().parent().submit();
    }, 3000);
});
//Close acc-bought
$("#close-acc-bought").click(function(){
    window.location.href = "./shop.php";
});
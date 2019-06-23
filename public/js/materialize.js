$(document).ready(function(){
    $('.slider').slider({
        height: 450
    });
});

$('.dropdown-trigger').dropdown();

$(document).ready(function(){
    $('.tabs').tabs();
});

$(document).ready(function(){
    $('.collapsible').collapsible();
});

$(document).ready(function(){
    $(".btn-add-item").on('click', function(e){
        e.preventDefault();
        var id = $(this).data('id');
        var href = "../Cart/Add/"+id;
        var quantity = $("#producto_"+id).val();

        console.log(href);

        window.location.href = href + "/" + quantity;
    });
});

$(document).ready(function(){
    $(".btn-update-item").on('click', function(e){
        e.preventDefault();
        var id = $(this).data('id');
        var href = "../Cart/Update/"+id;
        var quantity = $("#producto_"+id).val();

        console.log(href);

        window.location.href = href + "/" + quantity;
    });
});

$(document).ready(function(){
    $(".btn-fin-pedido").on('click', function(e){
        var radios = document.getElementsByName('factura');
        for (var i = 0, length = radios.length; i < length; i++)
        {
        if (radios[i].checked)
        {
        // do whatever you want with the checked radio
        valor = radios[i].value;
        if(valor == "paypal"){
            var href = "../payment";
            window.location.href= href;
        }else{
            var href = "../Cart/Finish";
            window.location.href= href;
        }

        // only one radio can be logically checked, don't check the rest
        break;
        }
        }

        //window.location.href = href + "/" + quantity;
    });
});


$(document).ready(function(){
    $('select').formSelect();
});
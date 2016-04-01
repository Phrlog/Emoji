$(function(){
    if ($.session.get('b_image') !== undefined) {
        var img = document.getElementById("b_image"); 
        img.src = $.session.get('b_image');
        $('#back').attr('value', $.session.get('b_image'));        
    }
    if ($.session.get('f_image') !== undefined){
        var img = document.getElementById("f_image"); 
        img.src = $.session.get('f_image');
        $('#letter').attr('value', $.session.get('f_image'));
    }
    if ($.session.get('word') !== undefined) {
        $('#word').attr('value', $.session.get('word'));
    }
});

$(document).on('click', '.emoj', function () {
    if ($("#back").attr("value") === "") {
        var img = document.getElementById("b_image"); 
        img.src = $(this).attr('id');
        $.session.set('b_image', $(this).attr('id'));
        $('#back').attr('value', $(this).attr('id'));
        console.log('#back');
    } else {
        var img = document.getElementById("f_image"); 
        img.src = $(this).attr('id');
        $.session.set('f_image', $(this).attr('id'));
        $('#letter').attr('value', $(this).attr('id'));
        console.log('#letter');
    }
});

$("input[name='word']").blur(function(){
        var word = $("input[name='word']").val();
        $.session.set('word', word);
});

$(document).on('click', '#arrow', function () {
    $('#letter').attr('value', $.session.get('b_image'));
    $('#back').attr('value', $.session.get('f_image'));
    if (($.session.get('f_image') !== undefined) && ($.session.get('b_image') !== undefined))
    {
        var tmp = $.session.get('f_image');
        $.session.set('f_image', $.session.get('b_image'));
        $.session.set('b_image', tmp);
    }
    else if ($.session.get('b_image') !== undefined){
        $.session.set('f_image', $.session.get('b_image'));
        $.session.set('b_image', "");
        var img = document.getElementById("b_image");
        img.src = "images/1.png";
    }
    else if ($.session.get('f_image') !== undefined){
        $.session.set('b_image', $.session.get('f_image'));
        $.session.set('f_image', "");
        var img = document.getElementById("f_image");
        img.src = "images/1.png";
    }
});

var clipboard = new Clipboard('.btn');

clipboard.on('success', function(e) {
    console.info('Action:', e.action);
    console.info('Text:', e.text);
    console.info('Trigger:', e.trigger);

    e.clearSelection();
});

clipboard.on('error', function(e) {
    console.error('Action:', e.action);
    console.error('Trigger:', e.trigger);
});
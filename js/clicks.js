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
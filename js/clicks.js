$(function(){
    if ($.session.get('b_image') !== undefined) {
        var img = document.getElementById("b_image"); 
        img.src = $.session.get('b_image');
    }
    if ($.session.get('f_image') !== undefined){
        var img = document.getElementById("f_image"); 
        img.src = $.session.get('f_image');
    }
});

$(document).on('click', '.emoj', function () {
    if ($("#back").attr("value") === "") {
        var img = document.getElementById("b_image"); 
        img.src = $(this).attr('id');
        $.session.set('b_image', $(this).attr('id'));
        $('#back').attr('value', $(this).attr('id'));
        $('#back').trigger('click');
        console.log('#back');
    } else {
        var img = document.getElementById("f_image"); 
        img.src = $(this).attr('id');
        $.session.set('f_image', $(this).attr('id'));
        $('#letter').attr('value', $(this).attr('id'));
        $('#letter').trigger('click');
        console.log('#letter');
    }
});


$(document).on('click', '.foo', function () {
    var e = this;
    if (window.getSelection) {
        var s = window.getSelection();
        if (s.setBaseAndExtent) {
            s.setBaseAndExtent(e, 0, e, e.innerText.length - 1);
        } else {
            var r = document.createRange();
            r.selectNodeContents(e);
            s.removeAllRanges();
            s.addRange(r);
        }
    } else if (document.getSelection) {
        var s = document.getSelection();
        var r = document.createRange();
        r.selectNodeContents(e);
        s.removeAllRanges();
        s.addRange(r);
    } else if (document.selection) {
        var r = document.body.createTextRange();
        r.moveToElementText(e);
        r.select();
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
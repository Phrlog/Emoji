$(document).on('click', '.emoj', function () {
    if ($("#back").attr("value") === "") {
        $('#back').attr('value', $(this).attr('id'));
        $('#back').trigger('click');
        console.log('#back');
    } else {
        $('#letter').attr('value', $(this).attr('id'));
        $('#letter').trigger('click');
        console.log('#letter');
    }
});


$(document).on('click', '.code', function () {
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
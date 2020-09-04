$(document).ready(function(){
    $(function() {
            $("#Button1").click(function() {
                var NewDialog;
                var _id = $(this).attr('id');
                if (_id === "Button1") {
                    NewDialog = $('<div class="popup" title="PITCH">\
                    Pitch is the relationship between a note and it\'s fundamental requency.</div>');
                }
                NewDialog.dialog({
                    resizable: false,
                    modal: true,
                    show: 'clip',
                    buttons: {
                        "Close": function() {
                            $(this).dialog("close");
                        }
                    }
                });
            });
        });
    });
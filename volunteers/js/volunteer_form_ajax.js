function draw_volunteer_i_frame(id){
    if($("#volunteer_reccord").length == 0){
         $("#volunteers").append("<div id = 'volunteer_reccord'></div>");
    }
    $('#volunteer_reccord').dialog({
    width:700,
    height:500,
    buttons: [
    {
        text: "Save",
        click: function() { 
             save_volunteer();
            }
    },{
        text: "Cancel",
        click: function() { 
            $(this).parent().hide(); 
            }
    }
      
]   
    });
    $('#volunteer_reccord').html("<img src ='../images/ajax-loader.gif' alt='Form Loading'>");
    get_v_form(id);
}

function get_v_form(id){
    $.ajax({
        url:"../volunteers/volunteer_reccord.php?id="+id+"&XDEBUG_SESSION_START=netbeans-xdebug"
    }).done(function(data){
        $('#volunteer_reccord').html(data);
    });
}

function save_volunteer(){
    var first_name = $("#v_first_name").val();
    var last_name = $("#v_last_name").val();
    var email = $("#v_email_addr").val();
    var phone_num = $("#v_phone_number").val(); 
    var status = $("#v_status").val();
    var is_admin = $("#v_is_admin").val();
    var notes = $("#v_notes").val();
    var id = $("#v_id").val();
    $('#volunteer_reccord').html("<img src ='../images/ajax-loader.gif' alt='Form Loading'>");
    $.ajax({
        url:"../volunteers/volunteer_save.php?first_name="+first_name+"&last_name="+last_name+"&email_addr="+email+"&phone_num="+phone_num+"&status="+status+"&is_admin="+is_admin+"&notes="+notes+"&id="+id+"&XDEBUG_SESSION_START=netbeans-xdebug"
    }).done(function(data){
            $('#volunteer_reccord').parent().hide(); 
    });
}


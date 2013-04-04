$("#tabs").tabs();
$("#volunteers_table").dataTable({
        "bProcessing": true,
        "sAjaxSource": 'volunteer_table_ajax.php'
});
$("#calls_table").dataTable({
        "bProcessing": true,
        "sAjaxSource": 'call_table_ajax.php?XDEBUG_SESSION_START=netbeans-xdebug"'
});
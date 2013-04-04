<?php
require_once('../header.php');

/* Database connection information */

        $gaSql['user']       = $_SESSION['config']['db_user'];
	$gaSql['password']   = $_SESSION['config']['db_password'];
	$gaSql['db']         = $_SESSION['config']['database'];
	$gaSql['server']     = $_SESSION['config']['db_server'];
	
	
	/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
	 * If you just want to use the basic configuration for DataTables with PHP server-side, there is
	 * no need to edit below this line
	 */
	
	/* 
	 * MySQL connection
	 */

	$gaSql['link'] =  mysql_pconnect( $gaSql['server'], $gaSql['user'], $gaSql['password']  ) or
		die( 'Could not open connection to server' );
	
	mysql_select_db( $gaSql['db'], $gaSql['link'] ) or 
		die( 'Could not select database '. $gaSql['db'] );
        $user_id = $_GET['id'];
        $volunteer_query = "select first_name, last_name, email_addr,status,phone_number,notes,is_admin from volunteers where user_id = '$user_id'";
        $the_volunteer_result = mysql_query($volunteer_query, $gaSql['link']);
        $the_volunteer = mysql_fetch_array($the_volunteer_result);
        
ob_start();
$display = "
    <div class = 'input_form' id = 'volunteer_reccord'><form name ='volunteer_form'>
    <input type ='hidden' id = 'v_id' value = '$user_id'>
        <table>
            <tr><td id='first_name_lbl'>First Name</td><td id ='first_name_field'><input type='text' id = 'v_first_name' name='first_name' value = '".$the_volunteer['first_name']."'/></td><td id='last_name_lbl'>Last Name</td><td id ='last_name_field'><input type='text' id ='v_last_name' name='last_name'  value = '".$the_volunteer['last_name']."'/></td></tr>
            <tr><td id='email_addr_lbl'>Email Address</td><td id ='email_addr_field'><input id = 'v_email_addr' type='text' name='email_addr'  value = '".$the_volunteer['email_addr']."'/></td><td id='phone_number_lbl'>Phone Number</td><td id ='phone_number_field'><input id = 'v_phone_number' type='text' name='phone_number' value= '".$the_volunteer['phone_number']."'/></td></tr>
            <tr><td id='status_lbl'>Status</td><td id ='status_field'><select  id = 'v_status' name = 'status'>";
            
foreach($volunteer_status as $a_status){
    $display .= "<option value = '$a_status'";
    if($a_status == $the_volunteer['status']){
        $display .= "selected = 'true' ";
    }
    $display .= ">$a_status</option>";    
}

$display .= "</select></td><td id='is_admin_lbl'>Admin User?</td><td id ='is_admin_field'><select id = 'v_is_admin' name = 'is_admin'><option value = '1'";
if($the_volunteer['is_admin'] == 1){
    $display .= "selected = 'true' ";
}
$display .= ">Yes</option><option value = '0'";

if($the_volunteer['is_admin'] == 0){
    $display .= "selected = 'true' ";
}

$display .= ">No</option></select></td></tr>
            <tr><td id='notes_lbl'>Notes</td><td colspan = 3 id ='notes_field'><textarea id = 'v_notes' rows='10' cols='60' value = '".$the_volunteer['notes']."'></textarea></td></tr>
        </table>
        
    </form></div>
";
echo $display;
ob_end_flush();


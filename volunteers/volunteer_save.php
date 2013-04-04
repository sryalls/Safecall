<?php
//first_name="+first_name+"&last_name="+last_name+"&email_addr="+email+"&phone_num="+phone_num+"&status="+status+"&is_admin="+is_admin+"notes="+notes
require_once('../header.php');

$first_name = $_GET['first_name'];
$last_name = $_GET['last_name'];
$email_addr = $_GET['email_addr'];
$phone_num = $_GET['phone_num'];
$status = $_GET['status'];
$is_admin = $_GET['is_admin'];
$notes = $_GET['notes'];
$user_id = $_GET['id'];

$gaSql['user']       = $_SESSION['config']['db_user'];
$gaSql['password']   = $_SESSION['config']['db_password'];
$gaSql['db']         = $_SESSION['config']['database'];
$gaSql['server']     = $_SESSION['config']['db_server'];
	
	$gaSql['link'] =  mysql_pconnect( $gaSql['server'], $gaSql['user'], $gaSql['password']  ) or
		die( 'Could not open connection to server' );
	
	mysql_select_db( $gaSql['db'], $gaSql['link'] ) or 
		die( 'Could not select database '. $gaSql['db'] );
        $volunteer_query = "update volunteers 
        set first_name = '$first_name',
            last_name = '$last_name',
            email_addr = '$email_addr',
            phone_number = '$phone_num',
            status = '$status',
            is_admin = '$is_admin',
            notes = '$notes'
        where user_id = '$user_id'";
        $the_volunteer_result = mysql_query($volunteer_query, $gaSql['link']);
        
<?php
	session_start();
	require_once('lib_view.php');
	require_once('lib_control.php');

	display_header();
	display_logo();
	display_menu();
	
	$dbc = new DBC();
	$con = $dbc->con;

	$rs = pg_query($con, "select * from pin join picture on picture.picture_id = pin.picture_id 
		order by pin.time desc;");

	// todo add anchar to get back
	while($row = pg_fetch_assoc($rs)) {
		$pin_id = $row['pin_id'];
		display_pin($row["pin_id"], "browse.php#$pin_id");
	}

	display_footer();
?>

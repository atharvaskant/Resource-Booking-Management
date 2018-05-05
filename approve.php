<?php

include 'booking_manager.php';

include 'update_calendar.php';

if(isset($_POST['allow'])||isset($_POST['deny']))
{
	$flag=approve_booking();

	
}
if($flag){
	update_calendar();
}


?>
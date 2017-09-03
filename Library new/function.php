<?php
function check_logging(){
	if (!$_SESSION['user_log']){
		$status = 0;
		return $status;
	}
	else {
		$status = 1;
		return $status;
	}
}

?>
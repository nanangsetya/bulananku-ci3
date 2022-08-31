<?php 
	function __construct() {
		$CI = & get_instance();
	    $CI->load->library('session');
	}
	
	if (!function_exists('alert_success')) {
		function alert_success($text){
			$alert =  "<div class='alert alert-success' id='alert-notification' style='width:100%;'> 
		                    <i class='mdi mdi-check-circle'></i>$text
		                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span> </button>
		                </div>";
		    return $alert;
		}
	}

	if (!function_exists('alert_failed')) {
		function alert_failed($text){
			$alert =  "<div class='alert alert-danger' id='alert-notification' style='width:100%;'> 
		                    <i class='mdi mdi-close-circle'></i>$text
		                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span> </button>
		                </div>";
		    return $alert;
		}
	}
?>
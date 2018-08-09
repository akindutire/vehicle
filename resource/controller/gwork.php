<?php
	
	namespace cliqsFrameWork\anonymousprocess;
	
	include_once('../../bootstrap/pageinit.php');
	//include_once('../../config/config.php');
	include_once('../class/users.php');
	
	use cliqsFrameWork\ic\yall as me;
	use cliqsFrameWork\ic\connect as connectme;
	use cliqsFrameWork\ic\performance as ivalid;
	
	


	$me			=	new me();
	$connect	=	new connectme();
	$check  	=	new ivalid();
	

	
		$ad=(int)filter_var(strip_tags(trim($_POST['addid'])),FILTER_VALIDATE_INT);
		if($ad==1){


		}else if($ad==2){


		}else if($ad==3){


		}else if($ad==4){
			

		}else if($ad==5){
			
			
		}


?>
<?php
	
	namespace cliqsFrameWork\retrieve;
	
	include_once('../../bootstrap/pageinit.php');
	include_once('../class/users.php');
	
	use cliqsFrameWork\ic\yall as me;
	use cliqsFrameWork\ic\connect as connectme;
	use cliqsFrameWork\ic\performance as ivalid;
	use cliqsFrameWork\ic\records as record;


	$me			=	new me();
	$connect	=	new connectme();
	$check  	=	new ivalid();
	$record  	=	new record();

			
			
		$rv=(int)filter_var(strip_tags(trim($_POST['retrieveid'])),FILTER_VALIDATE_INT);
		
		if($rv==1){
			
			$plate=$check->sanitize($_POST['plate']);

			$record->getowner($plate);

		}else if($rv==2){
			
			$id=$check->sanitize($_POST['id']);

			$record->sowner($id);
			
			
		}else if($rv==3){
			
			$plate=$check->sanitize($_POST['plate']);

			$record->svehicle($plate);
			
		}else if($rv==4){
			

		}else if($rv==5){
			
			
			}
			
		
		
	
	exit();
?>
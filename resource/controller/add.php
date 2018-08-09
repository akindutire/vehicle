<?php
	
	namespace cliqsFrameWork\add;
	
	include_once('../../bootstrap/pageinit.php');
	//include_once('../../config/config.php');
	include_once('../class/users.php');
	
	use cliqsFrameWork\ic\yall as me;
	use cliqsFrameWork\ic\connect as connectme;
	use cliqsFrameWork\ic\performance as ivalid;
	
	


	$me			=	new me();
	$connect	=	new connectme();
	$check  	=	new ivalid();
	
	function redirect($url){

				$url=filter_var($url,FILTER_SANITIZE_URL);

				header("location:$url");
	}

	
		$ad=(int)filter_var(strip_tags(trim($_POST['addid'])),FILTER_VALIDATE_INT);
		if($ad==1){

			$sname=ucwords($check->sanitize($_POST['sname']));
			$lname=ucwords($check->sanitize($_POST['lname']));
			$sex=ucwords($check->sanitize($_POST['sex']));
			$lga=$check->sanitize($_POST['lga']);
			$nationality=ucwords($check->sanitize($_POST['nationality']));
			$tel=$check->sanitize($_POST['tel']);
			$email=$check->sanitize($_POST['email']);
			
			
			$me->addowner($sname,$lname,$sex,$lga,$nationality,$tel,$email);
			redirect('../../admin/index.php?q=addvehicle');

		}else if($ad==2){

			$owner=($check->sanitize($_POST['owner']));
			$vname=ucwords($check->sanitize($_POST['vname']));
			$vmake=ucwords($check->sanitize($_POST['vmake']));
			$model=ucwords($check->sanitize($_POST['model']));
			$vcolor=ucwords($check->sanitize($_POST['vcolor']));
			$chasisno=abs($check->sanitize($_POST['chasisno']));
			$plateno=abs($check->sanitize($_POST['plateno']));
			$engineno=abs($check->sanitize($_POST['engineno']));
			$fueltype=ucwords($check->sanitize($_POST['fueltype']));
			$purpose=ucwords($check->sanitize($_POST['purpose']));
			$vtype=ucwords($check->sanitize($_POST['vtype']));
			
			$me->addvehicle($owner,$vname,$vmake,$model,$vcolor,$chasisno,$plateno,$engineno,$fueltype,$purpose,$vtype);
			redirect("../../admin/index.php?q=addvehicle1&owner=$owner");

		}else if($ad==3){


		}else if($ad==4){
			

		}else if($ad==5){
			
			
		}


?>
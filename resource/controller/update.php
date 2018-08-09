<?php

	namespace cliqsFrameWork\update;
	
	include_once('../../bootstrap/pageinit.php');
	include_once('../class/users.php');
	
	use cliqsFrameWork\ic\yall as me;
	use cliqsFrameWork\ic\connect as connectme;
	use cliqsFrameWork\ic\performance as ivalid;
	
	


	$me			=	new me();
	$connect	=	new connectme();
	$check  	=	new ivalid();
	

	
		$up=$_POST['upid'];
		if($up==1){
			//Update Product
			
			$product_id=(int)$check->sanitize(trim(abs($_POST['product_id'])));

			
			if(filter_var($product_id,FILTER_VALIDATE_INT)	&& 	filter_var($unit_price,FILTER_VALIDATE_INT)	&& filter_var($discount,FILTER_VALIDATE_INT)	&&	filter_var($qty,FILTER_VALIDATE_INT) )

			else
			
		}else if($up==2){
			
		}else if($up==4){
			
		}else if($up==5){
			
		}else if($up==6){
			
		}else if($up==7){
			
		}else if($up==8){
			
		}else if($up==9){
			
		}
	


?>
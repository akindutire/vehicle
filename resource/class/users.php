<?php

namespace cliqsFrameWork\ic;



define('EXKIT','../resorce/tracks/exp.bmp');
define('UPKIT','../resource/tracks/update.txt');
define('SIKIT','../resource/tracks/silent.bmp');
define('RELOCATEKITDIRECTORY','../resource/tracks/silent.bmp');
define('IMG','../images/content/');




/*-----------------------------------------
|	This Class Makes Database Connection
|------------------------------------------
|
|
*/


class connect{
	
	public function iconnect(){

		global $config;
		
		
		$def 	=	$config['con']['default'];

		if($def=='mysqli'){

			$link	=	mysqli_connect(	$config['con'][$def]['host'] , $config['con'][$def]['username'] , $config['con'][$def]['password'] , $config['con'][$def]['database']	);
		}
			
			if($link){
			
				return $link;
			
			}else{
			
				die("System Currently Not Available, Try Again Later");
			
				}
		}
	
}


/*-----------------------------------------
|	This Class Create Database Query
|-------------------------------------------
|
|
*/

class cq{

	public function redirect($url){

				$url=filter_var($url,FILTER_SANITIZE_URL);

				header("location:$url");
			}


	public function insert($table,$db){

		//$link=connect::iconnect();

		$dbfield=array();		
		$variable=array();

		$idbf='';
		$ivar='';
		$sql='';
		$i=0;
		
		foreach ($db as $dbval => $prval) {
			
			array_unshift($dbfield, $dbval);
				
			array_unshift($variable, $prval);

		}

		$all_size=count($dbfield);
		
		$sql.="INSERT INTO $table(";
		
			while($dbf=array_shift($dbfield)){

				$i++;
				$idbf.=$i==$all_size?$dbf:$dbf.',';			
				
			}			

		$sql.=$idbf;

		$sql.=") VALUES(";
			
			$i=0;
			while($var=array_shift($variable)){

				$i++;
				$ivar.=$i==$all_size? "'".$var."'":"'".$var."'".',';

			}	
		
		$sql.=$ivar.")";

		return $sql;
	}

	public function stmtinsert($table,$db){


		$dbfield=array();		
		$variable=array();

		$idbf='';
		$slot='';
		$sql='';
		$i=0;
		
		foreach ($db as $dbval => $prval) {
			
			array_unshift($dbfield, $dbval);
				
		}

		$all_size=count($dbfield);
		
		$sql.="INSERT INTO $table(";
		
			while($dbf=array_shift($dbfield)){

				$i++;
				$idbf.=$i==$all_size?$dbf:$dbf.',';			
				
			}			

		$sql.=$idbf;

		$sql.=") VALUES(";
			
			
			for($i=0;$i<$all_size;$i++){
				
				$c='?';
				$slot.=$i==($all_size-1)?$c:$c.',';

			}	

		
		$sql.=$slot.")";

		return $sql;

	}

	public function delete($table,$db,$binder,$type=1){

		$dbfield=array();		
		$idbf='';
		$sql='';
		$i=0;
		

		if($type==1){

			foreach ($db as $dbval => $prval) {
			
				array_unshift($dbfield, $dbval);
				
			}

			$all_size=count($dbfield);
		
			$sql.="DELETE FROM $table WHERE ";
		
			while($dbf=array_shift($dbfield)){

				$i++;
				$idbf.=$i==$all_size?"$dbf='$db[$dbf] '":"$dbf='$db[$dbf]' $binder ";			
				
			}			

		$sql.=$idbf;


		}else{

			$sql.="DELETE FROM $table";

		}
		
		return $sql;

	}

	public function truncate($table){

		$sql="TRUNCATE $table";
		return $sql;
	}

	public function select($table,$db,$binder,$type=1){

		$dbfield=array();		
		$idbf='';
		$sql='';
		$i=0;
		

		if($type==1){

			foreach ($db as $dbval => $prval) {
			
				array_unshift($dbfield, $dbval);
				
			}
			
			$all_size=count($dbfield);
		
			$sql.="SELECT * FROM $table WHERE ";
		
			while($dbf=array_shift($dbfield)){

				$i++;
				$idbf.=$i==$all_size?"$dbf='$db[$dbf]'":"$dbf='$db[$dbf]' $binder ";			
				
			}			

			$sql.=$idbf;


		}else{

			$sql.="SELECT * FROM $table";

		}
		
		return $sql;
	}

	public function update($table,$db,$dbcond,$binder,$type=1){

		$dbfield=array();
		$icond=array();		
		$idbf='';
		$iconf='';
		$sql='';
		$i=0;
		

		

			foreach ($db as $dbval => $prval) {
			
				array_unshift($dbfield, $dbval);
				
			}

			
			$all_size=count($dbfield);
			
			
			$sql.="UPDATE $table SET ";
		
				while($dbf=array_shift($dbfield)){

					$i++;
					$idbf.=$i==$all_size?"$dbf='$db[$dbf]'":"$dbf='$db[$dbf]',";			
				
				}			

				$sql.=$idbf;

			if($type==1){

				foreach ($dbcond as $dbval => $condval) {
			
					array_unshift($icond, $dbval);
					
				}

				$sql.="WHERE ";

				$cond_size=count($icond);
				$i=0;
				while($icon=array_shift($icond)){

					$i++;
					$iconf.=$i==$cond_size?"$icon='$dbcond[$icon]' ":"$icon='$dbcond[$icon]' $binder ";			
				
				}			

				$sql.=$iconf;

				return $sql;

			}else{

				return $sql;
				
			}		
			
	}
}

/*-----------------------------------------
|	This Class Checks The System Integrity
|-------------------------------------------
|
|
*/

class performance{
	
	public function sanitize($var){
		
		$var=htmlentities(stripslashes(strip_tags($var)));
		return $var;

	}


	public function checkSys(){
		
		$link=connect::iconnect();

		$db=array(

			'st'	=>	1

			);

		$query=cq::select('performancetab',$db,'AND',1);

		$sql=mysqli_query($link,$query) or die('101xFc: Unknown Reference');

		list($id,$start,$exp,$istatus,$lastmin)=mysqli_fetch_row($sql);
	
		if(mysqli_num_rows($sql)==0 && file_exists(EXKIT)==false){ 
			
			
			
			$this->createTrial(6);
		

		}else if(file_exists(EXKIT)==false){
		
		
			$this->repairTrial($exp,$lastmin);
		
		}else if($exp=='LP'){
		
			echo '';
		
		}else{
		
			$this->updateTrial($exp,$lastmin);
		
			}
	}
	
	//Inter Fc
	
	private function createTrial($trial){
		$link=connect::iconnect();
		
		//@Db Salt;
		$salt='cliqsdiamond';
		
		
		$start=date(time());
		$exp=date(strtotime("+ $trial month"));
		
		$fd=fopen(EXKIT,'w+');
		fwrite($fd,$exp);
		
		$db=array_reverse(array(

			'id'	=>	'NULL',
			'ifr'	=>	$start,
			'tg'	=>	$exp,
			'st'	=>	1,
			'lm'	=>	$start
			
			));

		$query=cq::insert('performancetab',$db);

		mysqli_query($link,$query);

	}
	
	private function repairTrial($exp,$lastmin){
		
		$link=connect::iconnect();
		
		$fd=fopen(EXKIT,'w+');
		fwrite($fd,$exp);

		$db=array_reverse(array(

			'lm'	=>	$lastmin

			));

		$dbcond=array_reverse(array(

			'id'	=>	1,
			'st'	=>	1
			

			));

		$query=cq::update('performancetab',$db,$dbcond,'AND',1);
		mysqli_query($link,$query);

		
		}
	
	private function updateTrial($exp,$lastmin){
		
		$link=connect::iconnect();
		
		$inow=date('d M Y, H:i a',time());
		
		$now=date(time());
		
			if($lastmin>$now){

				die('System/PC Time Inaccurate, Please Adjust Your Date,$inow');
			
			}else if($now>=$lastmin){
				
				file_exists(SIKIT)?'':die('Application Error: Some Modules Unable To Load, 01xfxc1');
				
				if($now>$exp){
							
					@rename(SIKIT,RELOCATEKITDIRECTORY);
					die('Unexpected Reference 101xF, Strongly Recommend Contacting App Provider.');
						
				}else{
					$new_min=date(time());
					
					$db=array_reverse(array(

						'lm'	=>	$new_min

					));

					$dbcond=array_reverse(array(

						'id'	=>	1,
						'st'	=>	1

					));

					$query=cq::update('performancetab',$db,$dbcond,'AND',1);


					mysqli_query($link,$query);
				}	
			}
		}
	
	
	public function AppWriter($data){
		
		$time=date('d M Y, H:i a',time());
		$data="[$time]->$data\n
		----------------------------------------------------------------------------------";
		
		
		file_exists(UPKIT)?'':die('Application Error: Some Modules Unable To Load, 01xfxc2');
		
		$fd=fopen(UPKIT,'a+');
		fwrite($fd,$data);
		fclose($fd);
	}
	//End Inter Fc
		
}

/*-----------------------------------------
|	This Class is Called YALL .
|------------------------------------------
|	Coz it takes care of all basic functions and routing on the app
|
*/

class yall{
	
	public function login($usr,$pwd){
		global $config;

		$link=connect::iconnect();
		
		$db=array_reverse(array(
			
			'mat'		=>	mysqli_real_escape_string($link,$usr),
			'password'	=>	mysqli_real_escape_string($link,$pwd),
			'bk'		=>	0
			
			));

		$query=cq::select('users',$db,'AND',1);


		$sql=mysqli_query($link,$query);
		
		if(mysqli_num_rows($sql)==1){
			
			//$data="$usr LOGGED IN Through ".$_SERVER['HTTP_USER_AGENT'].' On A '.$_SERVER['HTTP_CONNECTION'].' Connection';
			
			$_SESSION['iusr']=$usr;
			$_SESSION['ipwd']=$pwd;
			
			//performance::AppWriter($data);
			echo $config['flag']['sx'];

		}else{
			
			printf("<img src='%scancel.png' width='auto' height='14px'>&nbsp;Invalid Combination",IMG);
			
			}
		
		}
		
	public function getdata(){
		global $config;

		$link=connect::iconnect();

		$usr=$_SESSION['iusr'];
		$pwd=$_SESSION['ipwd'];	
		$db=array_reverse(array(
			
			'mat'		=>	mysqli_real_escape_string($link,$usr),
			'password'	=>	mysqli_real_escape_string($link,$pwd)
			
			));

		
			$query=cq::select('users',$db,'AND',1);
		
			$sql=mysqli_query($link,$query);
		
			list($id,$role,$e,$e,$e,$e,$e,$e,$e,$e)=mysqli_fetch_row($sql);
			$_SESSION['role']=$role;
			
			return $id;
		}
		
		
	public function logout($admin){
		global $config;
		
			
			$_SESSION[]=array();
			session_unset();
			
			$usr=$_SESSION['iusr'];
			
			

		if($admin!=1){

			cq::redirect($config['view']['root']);
	
		}else{
			
			cq::redirect($config['view']['root']);
			
			}

		}	
		
	
	public function verifylogin($role,$logintypeID){
		global $config;

		$usr_id=$this->getdata();
		$role=ucfirst($role);
		
		if($_SESSION['role']==$role){
			
			echo '';
			
		}else{
				if($logintypeID==null)
					$this->logout();
				else
					$this->logout(1);
			}		
		}
		
	public function haveexternalrights(){
		global $config;
		
		$link=connect::iconnect();

		$usr_id=$this->getdata();
		
		$db=array_reverse(array(
			
			'id'	=>	mysqli_real_escape_string($link,$usr_id)
			
			));

		$query=cq::select('users',$db,'AND',1);
		$sql=mysqli_query($link,$query);
		
		list($e,$e,$e,$e,$e,$e,$e,$e,$e,$ex)=mysqli_fetch_row($sql);
			
			return $ex;
		}
	

	public function addowner($sname,$lname,$sex,$lga,$nationality,$tel,$email){

		global $config;
		
		$link=connect::iconnect();
		if(empty($email)){
			$email='null';
			}
		
		$db=array_reverse(array(

			'id'			=>	'NULL',
			'surname'		=>	$sname,
			'othername'		=>	$lname,
			'sex'			=>	$sex,
			'lga'			=>	$lga,
			'state'			=>	'Ondo',
			'nationality'	=>	$nationality,
			'ph'			=>	$tel,
			'mail'			=>	$email,
			'passport'		=>	$_SESSION['funame'],
			'date'			=>	date('jS F Y',time())

			));
		
		
		$sql=mysqli_query($link,cq::insert('owner',$db));

		if ($sql) {
			
			 rename($config['realdir']['upds']['compress'].'/'.$_SESSION['funame'], $config['realdir']['upds']['profile']['m'].'/'.$_SESSION['funame']);
		

		}else{

			echo "System Error, Please Retry";
		}
	}

	public function addvehicle($owner,$vname,$vmake,$model,$vcolor,$chasisno,$plateno,$engineno,$fueltype,$purpose,$vtype){

		global $config;
		$link=connect::iconnect();
		$db=array_reverse(array(

			'id'			=>	'NULL',
			'name'			=>	mysqli_real_escape_string($link,$vname),
			'make'			=>	mysqli_real_escape_string($link,$vmake),
			'model'			=>	mysqli_real_escape_string($link,$model),
			'color'			=>	mysqli_real_escape_string($link,$vcolor),
			'chasisno'		=>	mysqli_real_escape_string($link,$chasisno),
			'engineno'		=>	mysqli_real_escape_string($link,$engineno),
			'plateno'		=>	mysqli_real_escape_string($link,$plateno),
			'fview'			=>	$_SESSION['funame'],
			'date'			=>	date('jS F Y',time()),
			'fueltype'		=>	$fueltype,
			'vehicleuse'	=>	$purpose,
			'vtype'			=>	$vtype,
			'ownerid'		=>	$owner
			
			));
		
		$dbchkplate=array_reverse(array(
			'plateno'	=>	$plateno
		));
		$sqli=mysqli_query($link,cq::select('vehicle',$dbchkplate,'AND',1));
		
		if(mysqli_num_rows($sqli)==0){
			$sql=mysqli_query($link,cq::insert('vehicle',$db));

			if ($sql) {
			
				 rename($config['realdir']['upds']['compress'].'/'.$_SESSION['funame'], $config['realdir']['upds']['download']['hp'].'/'.$_SESSION['funame']);
				unset($_SESSION['funame']);
		
			}else{

				echo "System Error, Please Retry";
			}
		}else{
			echo "Plate No. Already Existing";
			}
	}

	public function addsomething($a){

		global $config;
		$link=connect::iconnect();
		$db=array_reverse(array(

			'dbfield'	=>	'parameter',
			'dbfield'	=>	'parameter',
			'dbfield'	=>	'parameter',
			'dbfield'	=>	'parameter',

			));

		$sql=mysqli_query($link,cq::insert('tablename',$array_param));

		if ($sql) {
			
			echo $config['flag']['sx'];

		}else{

			echo "System Error, Please Retry";
		}
	}


}

/*-----------------------------------------
|	This Class is Called Records .
|------------------------------------------
|	be it admin or client ,this class always retrieve 
|	any stored process or data from our default data-
|	base	made earliar on YALL
|
*/


class records{
	
	public function owners(){
		global $config;

		$link=connect::iconnect();

		$dbowner=array_reverse(array());

		$sql=mysqli_query($link,cq::select('owner',$dbowner,'AND',0));
		while(list($id,$sname,$oname,$sex,$lga,$state,$nation,$phone,$mail,$passport,$date)=mysqli_fetch_row($sql)){
			
			$pic=$config['dir']['upds']['profile']['m'].'/'.$passport;
			echo "

				<h3><a onclick=window.open('$pic','','width=400,height=400')><img src='$pic' height='20px' width='auto'></a> &nbsp; $sname, $oname</h3>
                <span class='date'>$phone</span>
                <p></p>
                <div class='templatemo_readmore_2'><a title='Add Vehicle For $sname ,$oname' href='index.php?q=addvehicle1&owner=$id' target='_new'><img src='../images/content/addv.png' height='14px'></a></div>
                
                <div class='templatemo_h_line'></div>

			";

		}

	}		
	
	
	public function vehicle($a){
		global $config;

		$link=connect::iconnect();

		$dbowner=array_reverse(array(
			'ownerid'	=>	$a
		));

		$sql=mysqli_query($link,cq::select('vehicle',$dbowner,'AND',1));
		
		while(list($id,$vname,$vmake,$model,$color,$chasis,$engine,$plate,$vfview,$date,$fueltype,$purpose,$vtype,$owner)=mysqli_fetch_row($sql)){
			
			$pic=$config['dir']['upds']['download']['hp'].'/'.$vfview;
			
			echo "

				<h3><a onclick=window.open('$pic','','width=700,height=500')> <img src='$pic' height='20px' width='auto'></a> &nbsp; $vname, $model ($vmake)</h3>
                <span class='date'>Chasis No: $chasis</span>
				<span class='date'>Plate No: $plate</span>
                <p> A $purpose <b style='color:$color;'>$color</b> $vtype Using $fueltype Added On $date With Engine no of $engine</p>
                
                <div class='templatemo_h_line'></div>

			";

		}

	}
	
	public function getowner($a){
		global $config;
		
		$link=connect::iconnect();
		
		$db=array_reverse(array(
			'plateno'	=>	$a,
			'engineno'	=>	$a
		));
		
		$sql=$sql=mysqli_query($link,cq::select('vehicle',$db,'OR',1));
		
		list($id,$e,$e,$e,$e,$e,$e,$e,$e,$e,$e,$e,$e,$owner)=mysqli_fetch_row($sql);
		
		echo $owner;
	}
	
	public function sowner($a){
		
		global $config;

		$link=connect::iconnect();

		$dbowner=array_reverse(array(
			'id'	=>	$a
		));

		$sql=mysqli_query($link,cq::select('owner',$dbowner,'AND',0));
		list($id,$sname,$oname,$sex,$lga,$state,$nation,$phone,$mail,$passport,$date)=mysqli_fetch_row($sql);
			
			$pic=$config['dir']['upds']['profile']['m'].'/'.$passport;
			echo "

				<h3><a onclick=window.open('$pic','','width=400,height=400')><img src='$pic' height='20px' width='auto'></a> &nbsp; $sname, $oname</h3>
                
                <p>$mail/$phone</p>
				<p>$lga</p>
				<p>$state</p>
				<p>$sex</p>
				<p>$nation</p>
				<p>Registered On $date</p>
				
                
                <div class='templatemo_h_line'></div>

			";
	
		}

	public function svehicle($a){
		global $config;

		$link=connect::iconnect();

		$dbv=array_reverse(array(
			'plateno'	=>	$a,
			'engineno'	=>	$a,
		));

		$sql=mysqli_query($link,cq::select('vehicle',$dbv,'OR',1));
		
		list($id,$vname,$vmake,$model,$color,$chasis,$engine,$plate,$vfview,$date,$fueltype,$purpose,$vtype,$owner)=mysqli_fetch_row($sql);
			
			$pic=$config['dir']['upds']['download']['hp'].'/'.$vfview;
			
			echo "
				
				
				<p style='font-size:18px; color:black; text-align:center;'><a onclick=window.open('$pic','','width=700,height=500')><img src='$pic' height='100px' width='auto'></a></p>
                <p style='font-size:18px; color:black; text-align:center;'>$vname, $model ($vmake)</p>
				<p style='font-size:18px; color:black; text-align:center;'>Chasis No: $chasis</p>
				<p style='font-size:18px; color:black; text-align:center;'>Plate No: $plate</p>
				
                <p style='font-size:18px; color:black; text-align:center;'> A $purpose <b style='color:$color;'>$color</b> Car Using $fueltype Added On $date With Engine no of $engine</p>
                
               
			";
	}

}//End Of Records




?>
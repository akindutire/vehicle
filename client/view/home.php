<?php
	
  $r='client';

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Anonymous</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
<!--[if IE 6]>
<link rel="stylesheet" type="text/css" href="iecss.css" />
<![endif]-->



</head
><body>
<div id="main_container">
  

			<br><br><br><br>
           <div id="feedback" style="background:transparent; color:black; font-size:14px; padding:1px; margin:1% 32% 2px 32%; height:auto; width:350px; text-align:center; border-radius:3px; font-family:amble;"></div>


          <form action="<?php echo $config['control']['login']; ?>" method="post">
              
              <div class="all"><label>Username</label><input type="text" name="usr" id="usr"></div>
              <div class="all"><label>Password</label><input type="password" name="pwd" id="pwd"></div>
              <div class="all"><label></label><button type="submit" id="sblogin">Login</button></div>

          </form>
    
<br><br><br><br>
  
</div>
<!-- end of main_container -->
<div align=center></div></body>
</html>

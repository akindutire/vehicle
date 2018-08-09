<?php


  $r='admin';
  $me->verifylogin($r,1); 
  $link=$connect->iconnect();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Vehicle | Search Owner</title>
<meta name="keywords" content="Free CSS Template, Architect Website, XHTML, CSS" />
<meta name="description" content="Architect is a free CSS template or a free XHTML CSS layout for everyone." />

<script language="javascript" type="text/javascript">

function clearText(field)
{
    if (field.defaultValue == field.value) field.value = '';
    else if (field.value == '') field.value = field.defaultValue;
}

</script>
</head>
<body>
	<div id="templatemo_container">
    	<div id="templatemo_header">
        	<div id="templatemo_header_logo">
            	<div id="templatemo_header_slogan">
                	Vehicle Owner Identification System
              </div>
                
                <div id="templatemo_search">
                	

                	
                </div>
            </div>
            <div id="templatemo_menu">
            	<ul>
                    <li><a href="index.php?q=cpanel" class="current">Home</a></li>
                    <li><a href="index.php?q=addvehicle">Add A Vehicle</a></li>
                    <li><a href="index.php?q=search">Search Vehicle</a></li>
                    
                    <li><a href="lgt.php">Logout</a></li>
                </ul> 
            </div>
        </div>
        <div class="templatemo_section_1">
          <div class="cleaner"></div>
            <div class="templatemo_section_1_bottom">
            </div>
        </div>
        <div id="templatemo_content_area">
       	  <div id="templatemo_left">
           		<h2><span class="big">Search Vehicle Using Plate No Or Engine No</span></h2>
            
            <div id="feedback" style="background:transparent; color:black; font-size:14px; padding:1px; margin:1% 32% 2px 32%; height:auto; width:350px; text-align:center; border-radius:3px; font-family:amble;"></div>

	 		<form action="<?php echo $config['control']['retrieve']; ?>" method="post">

                <input type="hidden" name="retrieveid" value="1">

                
                <div class="all"><label></label><input type="text" name="plateid" id="plateid" required="required"></div>


            </form>
                <br><br><hr>
            
            <dd style='text-align:center; font-family:alegreymedium; color:black; font-size:23px;'>            

            
            </dd>
           
	 		<div class="cleaner"></div>
       	  </div>
            
            <div class="templatmo_v_line"></div>
            <div class="templatmo_v_line"></div>
            <div id="templatemo_right">

            	<h2>Owner Details</h2>
                <cc>
                    
                </cc>
                
            </div>
        	
        	<div class="cleaner"></div>
        </div>
        <div class="cleaner"></div>
        <div id="templatemo_footer">&copy; Email Us @  cliqsapp@gmail.com, 2015 Project</div>
    </div><!-- End Of Container -->
<!--  Free CSS Templates by TemplateMo.com  -->
</body>
</html>
<?php

	$r='admin';


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Vehicle | Home</title>
<meta name="keywords" content="Free CSS Template, Architect Website, XHTML, CSS" />
<meta name="description" content="Architect is a free CSS template or a free XHTML CSS layout for everyone." />
<link href="templatemo_style.css" rel="stylesheet" type="text/css" />

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
                	<form action="#" method="post">
                    	
                	  	
            		</form>
                </div>
            </div>
            <div id="templatemo_menu">
            	<ul>
                    <li><a href="#" class="current">Home</a></li>
                    
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
           		<h2><span class="big">Login</span></h2>
       		<!--<p>Vivamus leo velit, convallis id, ultrices sit amet, tempor a, libero. <a href="#">Quisque rhoncus</a> nulla quis sem. Mauris quis nulla sed ipsum pretium sagittis. Suspendisse feugiat. </p>-->
            
            
            <div id="feedback" style="background:transparent; color:black; font-size:14px; padding:1px; margin:1% 32% 2px 32%; height:auto; width:350px; text-align:center; border-radius:3px; font-family:amble;"></div>


          <form action="<?php echo $config['control']['login']; ?>" method="post">
              
              <div class="all"><label>Username</label><input type="text" name="usr" id="usr"></div>
              <div class="all"><label>Password</label><input type="password" name="pwd" id="pwd"></div>
              <div class="all"><label></label><button type="submit" id="sblogin">Login</button></div>

          </form>
	 		
	 		<div class="cleaner"></div>
       	  </div>
            
            <div class="templatmo_v_line"></div>
            <div class="templatmo_v_line"></div>
            <div id="templatemo_right">
            	<!--<h2>Owner Details</h2>
                
                <h3>Nulla enim nibh, consectetuer sed</h3>
                <span class="date">Sept 14th, 2048</span>
                <p>Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros u erat.</p>
                <div class="templatemo_readmore_2"><a href="#">MORE</a></div>
                
                <div class="templatemo_h_line"></div>
                
            
            -->
            
                
            </div>
        	
        	<div class="cleaner"></div>
        </div>
        <div class="cleaner"></div>
        <div id="templatemo_footer"> Email Us @  cliqsapp@gmail.com, 2015 Project</div>
    </div><!-- End Of Container -->
<!--  Free CSS Templates by TemplateMo.com  -->
</body>
</html>
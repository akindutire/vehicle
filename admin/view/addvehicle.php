<?php


  $r='admin';
  $me->verifylogin($r,1); 
  $link=$connect->iconnect();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Vehicle | Add Owner</title>
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
           		<h2><span class="big">Add Vehicle Owner</span></h2>
       		<!--<p>Vivamus leo velit, convallis id, ultrices sit amet, tempor a, libero. <a href="#">Quisque rhoncus</a> nulla quis sem. Mauris quis nulla sed ipsum pretium sagittis. Suspendisse feugiat. </p>-->
            
            
            <div id="feedback" style="background:transparent; color:black; font-size:14px; padding:1px; margin:1% 32% 2px 32%; height:auto; width:350px; text-align:center; border-radius:3px; font-family:amble;"></div>

	 		<form action="<?php echo $config['control']['add']; ?>" method="post">

                <input type="hidden" name="addid" value="1">

                <div class="all"><label>Passport</label><input type="file" name="pfile" id="pfile" required="required"></div>

                <div class="all"><label>Surname</label><input type="text" name="sname" id="sname" required="required"></div>

                <div class="all"><label>Other name</label><input type="text" name="lname" id="lname" required="required"></div>
                <div class="all"><label>Gender</label><select name="sex" id="sex" required="required">
                    
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>

                </select></div>

                <div class="all"><label>L.G.A.</label><select name="lga" id="lga" required="required">
                    
                    <?php
                        $sql=mysqli_query($link,"SELECT * FROM lga");
                        while(list($id,$lga)=mysqli_fetch_row($sql)){

                            echo "<option value=$lga>$lga</option>";
                        }
                    ?>
                </select></div>

                <div class="all"><label>Nationality</label><select name="nationality" id="nationality" required="required">
                    
                    <option value="Nigeria">Nigeria</option>
                
                </select></div>

                <div class="all"><label>Phone</label><input type="tel" name="tel" id="tel" required="required"></div>
                
                <div class="all"><label>E-mail</label><input type="email" name="email" id="email"></div>

                <div class="all"><label></label><button type="submit">Register Owner</button></div>


            </form>

         


	 		<div class="cleaner"></div>
       	  </div>
            
            <div class="templatmo_v_line"></div>
            <div class="templatmo_v_line"></div>
            <div id="templatemo_right">

            	<h2>List Of Vehicle Owner</h2>
                
                <?php $record->owners(); ?>
            
                
            </div>
        	
        	<div class="cleaner"></div>
        </div>
        <div class="cleaner"></div>
        <div id="templatemo_footer">&copy; Email Us @  cliqsapp@gmail.com, 2015 Project</div>
    </div><!-- End Of Container -->
<!--  Free CSS Templates by TemplateMo.com  -->
</body>
</html>
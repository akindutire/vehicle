<?php


  $r='admin';
  $me->verifylogin($r,1); 
  $link=$connect->iconnect();

  $owner=$_GET['owner'];

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Vehicle | Add Vehicle</title>
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
           		<h2><span class="big">Add Vehicle</span></h2>
       		<!--<p>Vivamus leo velit, convallis id, ultrices sit amet, tempor a, libero. <a href="#">Quisque rhoncus</a> nulla quis sem. Mauris quis nulla sed ipsum pretium sagittis. Suspendisse feugiat. </p>-->
            
            
            <div id="feedback" style="background:transparent; color:black; font-size:14px; padding:1px; margin:1% 32% 2px 32%; height:auto; width:350px; text-align:center; border-radius:3px; font-family:amble;"></div>

	 		<form action="<?php echo $config['control']['add']; ?>" method="post">

                <input type="hidden" name="addid" value="2">
                <input type="hidden" name="owner" value="<?php echo $owner; ?>">

                <div class="all"><label>Front View</label><input type="file" name="pfile" id="pfile" required="required"></div>

                <div class="all"><label>Name</label><input type="text" name="vname" id="vname" required="required"></div>

                <div class="all"><label>Make</label><input type="text" name="vmake" id="vmake" required="required"></div>

                <div class="all"><label>Model</label><input type="text" name="model" id="model" required="required"></div>

                <div class="all"><label>Color</label><input type="text" name="vcolor" id="vcolor" required="required"></div>

                <div class="all"><label>Chasis No.</label><input type="text" name="chasisno" id="chasisno" required="required"></div>

                <div class="all"><label>Engine No.</label><input type="text" name="engineno" id="engineno" required="required"></div>

                <div class="all"><label>Plate No.</label><input type="text" name="plateno" id="plateno" required="required"></div>

                <div class="all"><label>Fuel Type</label><select name="fueltype" id="fueltype" required="required">
                    
                    <option value="Petrol">Petrol</option>
                    <option value="Diesel">Diesel</option>
                    <option value="Gas">Gas</option>
                    <option value="Kerosine">Kerosine</option>

                </select></div>


                <div class="all"><label>Purpose</label><select name="purpose" id="purpose" required="required">
                    
                    <option value="Commercial">Commercial</option>
                    <option value="Private">Private</option>
                    <option value="Others">Others</option>

                </select></div>

                <div class="all"><label>Vehicle Type</label><select name="vtype" id="vtype" required="required">
                    
                    <option value="Car">Car</option>
                    <option value="Bus">Bus</option>
                    <option value="Van">Van</option>
                    <option value="Lorry">Lorry</option>
                    <option value="Trailer">Trailer</option>

                </select></div>

                <div class="all"><label></label><button type="submit">Register Vehicle</button></div>


            </form>

         


	 		<div class="cleaner"></div>
       	  </div>
            
            <div class="templatmo_v_line"></div>
            <div class="templatmo_v_line"></div>
            <div id="templatemo_right">

            <?php 
             $sql=mysqli_query($link,"SELECT surname,othername FROM owner WHERE id='$owner'");
             list($s,$o)=mysqli_fetch_row($sql);   
            ?>
            	<h2><?php  echo "$s, $o" ?> Vehicle</h2>
                
                <?php $record->vehicle($owner); ?>
            
                
            </div>
        	
        	<div class="cleaner"></div>
        </div>
        <div class="cleaner"></div>
        <div id="templatemo_footer">&copy; Email Us @  cliqsapp@gmail.com, 2015 Project</div>
    </div><!-- End Of Container -->
<!--  Free CSS Templates by TemplateMo.com  -->
</body>
</html>
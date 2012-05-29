<?php
session_start();
if (@$_SESSION['user']=='student'){
	
if (!empty($_POST['submit'])){
	include "./utils/BorrowerUtils.php";
	$submit=$_POST['submit'];
	$snumber = $_POST['snumber'];
	if ($submit){
		$check=BorrowerUtils::check_exist($snumber);
			if ($check === True){
				$result = " You are registered! "."<a href=student_details.php?stud_id=".$snumber.">View Details</a>";
			}else{
				echo "Error!"; 
					}
					
			
				}
			}

	} else {
	echo "You are not allowed to see this page";
	}

?>
<html>
<head>


<link rel="stylesheet" href="./includes/css/try.css" type="text/css" media="screen">
<link rel="stylesheet" href="./includes/css/layout.css" type="text/css" media="screen">
</head>
<div id="background">

	
	
<div id="container">

	<div id="header">
	<img src="./includes/img/logo1.png" width='330' height='150'>	
		<div id="navigation">
		<ul>
			<li id="logout"><a href="logout.php"><img src="./includes/img/nav_icons/logout.png" width='30' height='30'>Log Out</a></li>
			</ul>
		</div>
	</div>

	<div id="content-container">

	<div id = "contentC">
	<div id = "contentC">
	<p style="font-family: 'Impact', Helvetica, Arial, sans-serif;
	font-size: 30px; font-weight: normal;
	text-align: center;
	text-shadow: black 3px 3px 3px;
	color:white; background:#ccc;">WELCOME STUDENT!</p>


	<form action="<?php $_SERVER['PHP_SELF']; ?>" method='POST'>
	<table class="altrowstable" id="alternatecolor" style="margin-top:10px; margin-left:65px;">
			 	<tr>
		<td style="background-color:white; font-family: 'Lucida Calligraphy'; font-size: 25px; " >Student Number: </td>
		<td> <input type='text' name='snumber' id='snumber' size='30'onblur='check_snumber()'></td>
		<td align='center'><input type='submit' name='submit' value= "Check if registered" /></a></td>
		
	</tr>

	<tr>
	<td colspan='3'>
	<p style="font-family: 'Verdana', Helvetica, Arial, sans-serif;
	font-size: 30px; font-weight: normal;
	text-align: center;
	text-shadow: black 3px 3px 3px;
	color:white; background:#ccc;"><?php echo @$result; ?></p>
	</td>
	</tr>

</table>
</form>

	</div>
	</div>
</div>
</html>

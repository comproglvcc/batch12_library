<?php
session_start();
$id=$_REQUEST['id'];
echo $id;
if (@$_SESSION['number']==$id){
		include "../utils/BorrowerUtils.php";
		include "../utils/PenaltyUtils.php";
		$borrowers = BorrowerUtils::borrower_in($id);
		$penalty= PenaltyUtils::penalty_finish($id);
		print_r($penalty);
		if ($penalty===0){
			$value = "No Unfinished Transactions";
		}
		$penalty2 = PenaltyUtils::penalty_unfinish($id);
		print_r($penalty2);
		if ($penalty2===0){
			$value2 = "No Finished Penalty Transactions";
		}
} else {
	header("location:student_restriction.php");
}



?>


<html>
<head>


<link rel="stylesheet" href="../includes/css/class_table.css" type="text/css" media="screen">
<link rel="stylesheet" href="../includes/css/layout.css" type="text/css" media="screen">
</head>
<div id="background">

	
	
<div id="container">

	<div id="header">
	<img src="../includes/img/logo1.png" width='330' height='150'>	
		<div id="navigation">
		<ul>
			<li id="logout"><a href="../logout.php"><img src="../includes/img/nav_icons/logout.png" width='30' height='30'>Log Out</a></li>
			</ul>
		</div>
	</div>

	<div id="content-container">
	
	<div id = "contentC">
		
	<div id = "contentC">
	<?php foreach($borrowers as $bor): ?>
	<?php $fname = $bor['firstname']; ?>
	<?php $lname = $bor['lastname']; ?>
	<?php endforeach; ?>
	
<p style="font-family: 'Impact', Helvetica, Arial, sans-serif;
	font-size: 30px; font-weight: normal;
	text-align: center;
	text-shadow: black 3px 3px 3px;
	color:white; background:#ccc;"><?php echo $fname." ".$lname."'s Record of Penalty";?></p>

	<form action="<?php $_SERVER['PHP_SELF']; ?>" method='POST'>
	

	<div id = "contentC">
	<div id = "contentC">
	<table align='center' class="altrowstable" style="margin-top:0px; margin-left:30px;width:850px;"/> 
	<p style="font-family: 'Lucida Calligraphy', Helvetica, Arial, sans-serif;
	font-size: 15px; font-weight: normal;
	text-align: left;
	text-shadow: black 3px 3px 3px;margin-left:50px; margin-top:50px;
	color:white;">Unfinished Penalty Transactions:</p>
				
				<TR align='center'>
					<td class='first'> Book Number </td>
					<td class='first'> Book Name</td>
					<td class='first'> Date Issue </td>
					<td class='first'> Date Due </td> 
					<td class='first'> Date Returned </td>
		
			
				</TR>
				<?php if (!empty($penalty2)): ?>
				<?php foreach(@$penalty2 as $penal2): ?>	
				
				<tr>
					<td><?php echo $penal2['book_access_num']; ?></td>
					<td> <?php echo $penal2['book_title']; ?></td>
					<td> <?php echo $penal2['date_issue']; ?></td> 
					<td ><?php echo $penal2['date_due']; ?></td>

				</tr>
				<?php endforeach; ?>
				<?php endif; ?>
				<tr>
			<td colspan='5' style="font-family: 'Verdana', Helvetica, Arial, sans-serif;
	font-size: 20px; font-weight: normal;
	text-align: center;
	text-shadow: black 3px 3px 3px;
	color:white; background:black;"><?php echo @$value;?></td>
			</tr>


				</table>
				
				
	<table align='center' class="altrowstable" style="margin-top:0px; margin-left:30px;width:850px;"/> 
	<p style="font-family: 'Lucida Calligraphy', Helvetica, Arial, sans-serif;
	font-size: 15px; font-weight: normal;
	text-align: left;
	text-shadow: black 3px 3px 3px;margin-left:50px; margin-top:50px;
	color:white;">Finished Penalty Transactions:</p>
				
				<TR align='center'>
					<td class='first'> Book Number </td>
					<td class='first'> Book Name</td>
					<td class='first'> Date Issue </td>
					<td class='first'> Date Due </td> 
					<td class='first'> Date Returned </td>
		
			
				</TR>
				<?php if (!empty($penalty)): ?>
				<?php foreach($penalty as $penal): ?>	
				
				<tr>
					<td> <?php echo $penal['book_access_num']; ?></td>
					<td> <?php echo $penal['book_title']; ?></td>
					<td> <?php echo $penal['date_issue']; ?></td> 
					<td ><?php echo $penal['date_due']; ?></td>
					<td ><?php echo $penal['date_returned']; ?></td>
					<td ><?php echo $penal['num_of_days']; ?></td>
					
				</tr>
				<?php endforeach; ?>
				<?php endif; ?>
			<tr>
			<td colspan='5' style="font-family: 'Verdana', Helvetica, Arial, sans-serif;
	font-size: 20px; font-weight: normal;
	text-align: center;
	text-shadow: black 3px 3px 3px;
	color:white; background:black;"><?php echo @$value2;?></td>
			</tr>

		
				
				</table>
	

</form>

	</div>
	</div>
</div>
</html>

<?php
session_start();
$id=$_GET['id'];
if (@$_SESSION['number']==$id){
	include "../utils/BorrowerUtils.php";
	include "../utils/TransactionUtils.php";
		$borrowers=BorrowerUtils::borrower_in($id);
		$transactions=TransactionUtils::borrower_unfinish($id);
		if ($transactions===0){
			$value = "No Unfinished Transactions";
		}
		
		$transactions2=TransactionUtils::borrower_finish($id);
		if ($transactions2===0){
			$value2 ="No finished Transactions";
		}
}
?>

<html>
<head>


<link rel="stylesheet" href="../includes/css/class_table.css" type="text/css" media="screen">
<link rel="stylesheet" href="../includes/css/layout.css" type="text/css" media="screen">
</head>
<div id="background">

<input type="hidden" name="id" value="<?php echo $id;?>"/>
	
	
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
	color:white; background:#ccc;"><?php echo $fname." ".$lname."'s Record of Transactions";?></p>

	<form action="<?php $_SERVER['PHP_SELF']; ?>" method='POST'>
	

	<div id = "contentC">
	<div id = "contentC">
	<table align='center' class="altrowstable" style="margin-top:0px; margin-left:30px;width:850px;"/> 
	<p style="font-family: 'Lucida Calligraphy', Helvetica, Arial, sans-serif;
	font-size: 15px; font-weight: normal;
	text-align: left;
	text-shadow: black 3px 3px 3px;margin-left:50px; margin-top:50px;
	color:white;">Unfinished Transactions:</p>
				
				<TR align='center'>
					<td class='first'> Book Number </td>
					<td class='first'> Book Name</td>
					<td class='first'> Date Issue </td>
					<td class='first'> Date Due </td> 
					<td class='first'> Date Returned </td>
		
			
				</TR>
				<?php if (!empty($transactions)): ?>
				<?php foreach(@$transactions as $trans): ?>	
				
				<tr>
					<td align='center'> <?php echo $trans['book_access_num']; ?></td>
					<td> <?php echo $trans['book_title']; ?></td>
					<td> <?php echo $trans['date_issue']; ?></td> 
					<td ><?php echo $trans['date_due']; ?></td>
					<td align='center'> <i>Not yet returned</i> </td>
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
	color:white;">Finished Transactions:</p>
				
				<TR align='center'>
					<td class='first'> Book Number </td>
					<td class='first'> Book Name</td>
					<td class='first'> Date Issue </td>
					<td class='first'> Date Due </td> 
					<td class='first'> Date Returned </td>
		
			
				</TR>
				<?php if (!empty($transactions2)): ?>
				<?php foreach($transactions2 as $trans2): ?>	
				
				<tr>
					<td align='center'> <?php echo $trans2['book_access_num']; ?></td>
					<td> <?php echo $trans2['book_title']; ?></td>
					<td> <?php echo $trans2['date_issue']; ?></td> 
					<td ><?php echo $trans2['date_due']; ?></td>
					<td ><?php echo $trans2['date_returned']; ?></td>
					
			
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

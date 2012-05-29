<?php
	session_start();
	if (@$_SESSION['user']=='admin'){
	include "../utils/ClassificationUtils.php";
	 $result=ClassificationUtils::getClass();
	 } else {
	 header("location:../admin/admin_restriction.php");
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
			<li id="logout"><a href="logout.php"><img src="../includes/img/nav_icons/logout.png" width='30' height='30'>Log Out</a></li>
			<li id="inventory"><a href="#"><img src="../includes/img/nav_icons/inventory.png" width='30' height='30'>Inventory</a></li>
			<li id="home"><a href="login.php"><img src="../includes/img/nav_icons/home.png"width='30' height='30'>Home</a></li>
		</ul>
		</div>
	</div>

	<div id="content-container">

	<div id = "contentC">
	<table class="altrowstable" id="alternatecolor" style="margin-top:50px; margin-left:100px;">
			
			    
				<TR align='center'>
					
					<th colspan='2' > Class Code </th>
					<th> Classification Name </th>
		
			
				</TR>
					</table>
				<div style="margin-bottom:10px; height:290px;overflow:auto;">	
	<table class="altrowstable" id="alternatecolor" style="margin-top:0px; margin-left:100px;">
					
				<?php foreach($result as $cla): ?>
				
				
				<tr>
					<td title="Click to view details"align='center'> <a href="eachClass.php?id=<?php echo $cla['id']; ?>"><img src='../includes/img/class/<?php echo $cla['id']; ?>.png' width='50' height='50'></td> 
					<td align='center'><?php echo $cla['class_code']; ?> </td>
					<td ><h3> <?php echo $cla['class_name']; ?></h3></td>
			
				<tr>
				
				
				<?php endforeach; ?>
				<tr>
					
					<td colspan='3' align='center' class='first'> <a href="aboutddc.php"> <input type='button' value='About Dewey Decimal Classification'></a></td>
				<tr>
				</table>
				</div>
	</table>
	<div id="navigation2BG">
		<div id="navigation2">
			<table align='center'>
				<tr>
				<td><a title='payments' href="../payment/readPayment.php"><img src="../includes/img/nav_icons/payment.png" width='80' height='80' onmouseover="this.style.zoom='150%';this.style.zoom='150%';" onmouseout="this.style.zoom='100%';this.style.zoom='100%';"></a></td>
				<td><a title='author' href="../authors/getAuthors.php"><img src="../includes/img/nav_icons/author.png" width='80' height='80' onmouseover="this.style.zoom='150%';this.style.zoom='150%';" onmouseout="this.style.zoom='100%';this.style.zoom='100%';"></a></td>
				<td><a title='penalties' href="../penalty/readPenalty.php"><img src="../includes/img/nav_icons/safe.png" width='80' height='80' onmouseover="this.style.zoom='150%';this.style.zoom='150%';" onmouseout="this.style.zoom='100%';this.style.zoom='100%';"></a></td>
				<td><a title='borrowers' href="../borrowers/getBorrowers.php"><img src="../includes/img/nav_icons/borrower.png" width='80' height='80' onmouseover="this.style.zoom='150%';this.style.zoom='150%';" onmouseout="this.style.zoom='100%';this.style.zoom='100%';"></a></td>
				<td><a title='transaction' href="../transaction/readTransaction.php"><img src="../includes/img/nav_icons/transaction.png" width='80' height='80' onmouseover="this.style.zoom='150%';this.style.zoom='150%';" onmouseout="this.style.zoom='100%';this.style.zoom='100%';"></a></td>
				<td><a title='classification' href="../classification/getClass.php"><img src="../includes/img/nav_icons/classification.png" width='80' height='80' onmouseover="this.style.zoom='150%';this.style.zoom='150%';" onmouseout="this.style.zoom='100%';this.style.zoom='100%';"></a></td>
				<td><a title='books' href="../books/readBooks.php"><img src="../includes/img/nav_icons/books.png" width='80' height='80' onmouseover="this.style.zoom='150%';this.style.zoom='150%';" onmouseout="this.style.zoom='100%';this.style.zoom='100%';"></a></td>		
				</tr>
			</table>
		</div>	
	</div>
	</div>
	</div>
</div>
</html>

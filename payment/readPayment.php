<?php
session_start();
include '../utils/PenaltyUtils.php';
$read = PenaltyUtils::readAllPayments();
?>
<html>
<head>


<script type="text/javascript">
function altRows(id){
	if(document.getElementsByTagName){  
		
		var table = document.getElementById(id);  
		var rows = table.getElementsByTagName("tr"); 
		 
		for(i = 0; i < rows.length; i++){          
			if(i % 2 == 0){
				rows[i].className = "evenrowcolor";
			}else{
				rows[i].className = "oddrowcolor";
			}      
		}
	}
}

window.onload=function(){
	altRows('alternatecolor');
}
</script>

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
			<li id="update"><a href="login.php"><img src="../includes/img/nav_icons/.png"width='30' height='30'>Updates</a></li>
			<li id="home"><a href="login.php"><img src="../includes/img/nav_icons/home.png"width='30' height='30'>Home</a></li>
		</ul>
		</div>
	</div>

	<div id="content-container">
	<div id="navigation2BG">
		<div id="navigation2">
			<table align='center'>
				<tr>
				<td><a title='payments' href="#"><img src="../includes/img/nav_icons/payment.png" width='80' height='80' onmouseover="this.style.zoom='200%';this.style.zoom='200%';" onmouseout="this.style.zoom='100%';this.style.zoom='100%';"></a></td>
				<td><a title='author' href=""><img src="../includes/img/nav_icons/author.png" width='80' height='80' onmouseover="this.style.zoom='200%';this.style.zoom='200%';" onmouseout="this.style.zoom='100%';this.style.zoom='100%';"></a></td>
				<td><a title='penalties' href="../classification/getClass.php"><img src="../includes/img/nav_icons/safe.png" width='80' height='80' onmouseover="this.style.zoom='200%';this.style.zoom='200%';" onmouseout="this.style.zoom='100%';this.style.zoom='100%';"></a></td>
				<td><a title='borrowers' href="../authors/getAuthors.php"><img src="../includes/img/nav_icons/borrower.png" width='80' height='80' onmouseover="this.style.zoom='200%';this.style.zoom='200%';" onmouseout="this.style.zoom='100%';this.style.zoom='100%';"></a></td>
				<td><a title='transaction' href="../borrowers/getBorrowers.php"><img src="../includes/img/nav_icons/transaction.png" width='80' height='80' onmouseover="this.style.zoom='200%';this.style.zoom='200%';" onmouseout="this.style.zoom='100%';this.style.zoom='100%';"></a></td>
				<td><a title='classification' href="../books/getBooks.php"><img src="../includes/img/nav_icons/classification.png" width='80' height='80' onmouseover="this.style.zoom='200%';this.style.zoom='200%';" onmouseout="this.style.zoom='100%';this.style.zoom='100%';"></a></td>
				<td><a title='books' href="../books/getBooks.php"><img src="../includes/img/nav_icons/books.png" width='80' height='80' onmouseover="this.style.zoom='200%';this.style.zoom='200%';" onmouseout="this.style.zoom='100%';this.style.zoom='100%';"></a></td>		
				</tr>
			</table>
		</div>
	</div>
	<div id = "contentC">
	

<table style="margin-top:50px; margin-left:10px;" class="altrowstable" id="alternatecolor">
		<tr>
			<td class='first'>Name:<td>
			<td><td>
		</tr>
		<tr>
			<td>Course:<td>
			<td><td>
		</tr>
		<tr>
			<td>Obligation:<td>
			<td><td>
		</tr>
	
	<?php foreach($read as $payments):?>
		<tr>
			<td>Date:<td>
			<td><?php echo $payments['payment_date'];?><td>
		</tr>
		<tr>
			<td>Amount:<td>
			<td><?php echo $payments['amount'];?><td>
		</tr>	
	<?php endforeach; ?>
	</table>
	</div>
	</div>
</div>
</html>

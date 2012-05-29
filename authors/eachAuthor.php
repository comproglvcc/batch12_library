<?php
session_start();
	if (@$_SESSION['user']=='admin'){
include "../utils/AuthorUtils.php";
$id = $_GET['id'];
$result=AuthorUtils::eachAuthor($id);
} else {
	 header("location:../admin/admin_restriction.php");
	 }
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

	<div id = "contentC">
	<p style="font-family: 'Impact', Helvetica, Arial, sans-serif;
	font-size: 30px; font-weight: normal;
	text-align: center;
	text-shadow: black 3px 3px 3px;
	color:white; background:#ccc;">Author Details</p>
	<table style="margin-top:50px; margin-left:100px; margin-bottom:150px;" class="altrowstable" id="alternatecolor">

				<?php foreach($result as $auth): ?>	
			
				
				
				<tr>
					<td class='first' style='min-width:30px;'> Author Name: </td>
					<td> <?php echo $auth['firstname']." ". $auth['lastname']; ?> </td>
				</tr>
				
				
				
				<tr>
					<td></td>
					<td style='min-width:30px;'> <b><?php echo $auth['date_birth']." </b> to <b>". $auth['date_death']; ?></b></td>
				</tr> 
				
				<tr>
					<td class='first' style='min-width:30px;'> Description: </td>
					<td> <?php echo $auth['description']; ?> </td>
				</tr>
				
				<tr>
					<td align='center' colspan='2'><a href="editAuthor.php?id=<?php echo $auth['id']; ?>"><input type='button' value='Edit details' /></a></td>
				</tr>

				<?php endforeach; ?>
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

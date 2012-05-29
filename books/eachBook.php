<?php
 session_start();
	if (@$_SESSION['user']=='admin'){
include "../utils/BookUtils.php";
$id = $_GET['id'];
$result = BookUtils::readBookstock($id);
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
	<p style="font-family: 'Impact', Helvetica, Arial, sans-serif;
	font-size: 30px; font-weight: normal;
	text-align: center;
	text-shadow: black 3px 3px 3px;
	color:white; background:#ccc;">Book Details</p>

	<div id = "contentC">
<table class="altrowstable" id="alternatecolor" style="margin-top:80px; margin-left:90px; margin-bottom:80px;">

				<?php foreach($result as $book){
				$title = $book['book_title'];
				$class = $book['class_name'];
				$author = $book['firstname']." ". $book['lastname'];
				$publsher = $book['publisher'];
				$copy = $book['copyright'];
				$location = $book['location'];
				$stock = $book['original_stock'];
				$price = $book['unit_price'];
				$page = $book['page_number'];
				}
				?>
				<tr>
					<td align= 'center' style='min-width:30px;' colspan='4'><h3><?php echo $title; ?></h3></td>
				</tr> 
				<tr>
					<td class='first'> Classification: </td>
					<td style='min-width:30px;'><?php echo $class; ?></td>
					<td class='first'> Author: </td>
					<td style='min-width:30px;'><?php echo $author; ?></td>
				<tr> 
							
				<tr>
					<td class='first'> Publisher: </td>
					<td style='min-width:30px;'><?php echo $publsher; ?></td>
					<td class='first'> Copyright: </td>
					<td style='min-width:30px;'><?php echo $copy; ?></td>
				<tr> 
				
				<tr>
					<td class='first'>Location: </td>
					<td style='min-width:30px;'><?php echo $location; ?></td>
					<td class='first'> Original Stock: </td>
					<td style='min-width:30px;'><?php echo $stock; ?></td>
				<tr> 
				<tr>
					<td class='first'> Unit Price </td>
					<td style='min-width:30px;'><?php echo $price; ?></td>
					<td class='first'> Number of Pages: </td>
					<td colspan='2' style='min-width:30px;'><?php echo $page; ?></td>
				</tr>

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

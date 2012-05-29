<?php
		session_start();
	if (@$_SESSION['user']=='admin'){
	include "../utils/BookUtils.php";
	$result = BookUtils::readBooks();
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
			<li id="inventory"><a href="bookInventory.php"><img src="../includes/img/nav_icons/inventory.png" width='30' height='30'>Inventory</a></li>
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
	color:white; background:#ccc;">Book Records</p>


		<table class="altrowstable" id="alternatecolor" style="margin-top:10px; margin-left:10px; width:870px;">
					
				<TR align='center'>
					<th> </th>		
					<th>  Image </th>
					<th> Book Title </th>
					<th> Copyright </th>
					<th> Publisher </th>
					<th> Author </th>
				
				</TR>
		</table>
			<div id="flow">	
		<table class="altrowstable" id="alternatecolor" style="margin-top:0px; margin-left:10px; width:870px;">			
				<?php foreach($result as $book): ?>				
				<tr>
					<td align='center'> <a title="Click to update details" href="updateBook.php?id=<?php echo $book['book_id']; ?>"><img src='../includes/img/view.png' width='20' height='20'><br>
										 <a title="Click to add stock" href="addStock.php?id=<?php echo $book['book_id']; ?>"><img src='../includes/img/view.png' width='20' height='20'></td> 
					<td style = "width:130px;" title="Click to view details" align='center'><a href="eachBook.php?id=<?php echo $book['book_id']; ?>"><img src='../includes/img/book.png' width='50' height='50'> </td>
					<td style = "width:200px;"><?php echo $book['book_title']; ?></td>
					<td align="center" style = "width:150px;"><?php echo $book['copyright']; ?></td>
					<td ><?php echo $book['publisher']; ?></td>
					<td ><?php echo $book['firstname'] ." ".$book['lastname']; ?></td>
			
					
			
				<tr>
				
				<?php endforeach; ?>
		</table>
			</div>

	
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
				<td><a title='books' href="../books/addBook.php"><img src="../includes/img/nav_icons/books.png" width='80' height='80' onmouseover="this.style.zoom='150%';this.style.zoom='150%';" onmouseout="this.style.zoom='100%';this.style.zoom='100%';"></a></td>		
				</tr>
			</table>
		</div>
	</div>
	</div>
	</div>
</div>
</html>

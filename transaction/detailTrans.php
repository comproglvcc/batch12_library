<?php
session_start();
	if (@$_SESSION['user']=='admin'){
	include "../utils/BookUtils.php";
	$id = $_GET['id'];
	$result = BookUtils::readBookstock($id);

  foreach($result as $book){
       $title=$book['book_title'];
       $stock =$book['original_stock'];
	   $copyright = $book['copyright'];
	   $publisher = $book['publisher'];
	   $page = $book['page_number'];
	   $author = $book['firstname'] ." ".$book['lastname'];
	   $class =  $book['class_name'];
	   $price = $book['unit_price'];
        }
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
			<li id="inventory"><a href="../books/bookInvenory.php"><img src="../includes/img/nav_icons/inventory.png" width='30' height='30'>Inventory</a></li
			<li id="home"><a href="login.php"><img src="../includes/img/nav_icons/home.png"width='30' height='30'>Home</a></li>
		</ul>
		</div>
	</div>

	<div id="content-container">

	
	<p style="font-family: 'Impact', Helvetica, Arial, sans-serif;
	font-size: 30px; font-weight: normal;
	text-align: center;
	text-shadow: black 3px 3px 3px;
	color:white; background:#ccc;">Transaction Details</p>
	<div id = "contentC">
	

<table style="margin-top:50px; margin-left:80px;" class="altrowstable" id="alternatecolor">
             <tr>
                     <td colspan='2' align='center'><b><?php echo $title; ?></b></td>
             </tr>
                        <tr>
                        	<td colspan='2' align='center'> Total Number of Stocks:<b><?php echo $stock; ?></b>
                        	<a href="addStock.php?id=<?php echo $book['book_id']; ?>"><input type='button' value='add another Stock' /></a> </td>
            </tr>

			<tr>
                                 <td> Copyright: </td>
                                 <td><i> <?php echo $copyright; ?> </i></td>
			</tr>
			<tr>
                                 <td> Publisher: </td>
                                 <td><i> <?php echo $publisher; ?></i></td>
			</tr>
			<tr>
                                 <td> Pages: </td>
 		                 <td><i> <?php echo $page; ?> </i></td>
			</tr>
			<tr>
                        	<td> Author: </td>
                        	<td><i> <?php echo $author; ?></i></td>
			</tr>
			<tr>
                        	<td> Classification: </td>
                        	<td><i> <?php echo $class; ?> </i></td>
			</tr>
			<tr>
                        	<td> Unit Price: </td>
                        	<td><i> <?php echo  $price; ?></i></td>
			</tr>
			<tr>
                            <td> Stock Accession Number: </td>
									<td>
									<?php foreach($result as $book): ?>
									
										<i><a title=<?php echo $book['status']; ?> href="">
										<?php echo $book['accession_num']; ?> </a></i>

									<?php endforeach; ?>
									</td>
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

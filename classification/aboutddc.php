<?php
	session_start();
	if (@$_SESSION['user']=='admin'){
	include "../includes/config/config.php";
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
			<li id="logout"><a href="./logout.php"><img src="../includes/img/nav_icons/logout.png" width='30' height='30'>Log Out</a></li>
			<li id="inventory"><a href="#"><img src="../includes/img/nav_icons/inventory.png" width='30' height='30'>Inventory</a></li>
			<li id="home"><a href="login.php"><img src="../includes/img/nav_icons/home.png"width='30' height='30'>Home</a></li>
		</ul>
		</div>
	</div>

	<div id="content-container">

	<div id = "contentC">
	<table class="altrowstable" id="alternatecolor" style="margin-top:50px; margin-left:100px;">
		<tr>
			<th> Dewey Decimal Classification </th>
		</tr>
	</table>
<div style="margin-bottom:10px; height:290px;overflow:auto;">	
	<table class="altrowstable" id="alternatecolor" style="margin-top:0px; margin-left:100px;">

<tr>
	<td><p  align='justify'>Dewey Decimal Classification (also called the <strong> Dewey Decimal System </strong>) is a proprietary system of library classification developed by Melvil Dewey in 1876.</p> 
	<p><b>Design</b> </p><hr>
	<p align='justify'>The DDC attempts to organize all knowledge into ten main classes. The ten main classes are each further subdivided into ten divisions, and each division into ten sections, giving ten main classes, 100 divisions and 1000 sections. DDC's advantage in using decimals for its categories allows it to be purely numerical, while the drawback is that the codes are much longer and more difficult to remember as compared to an alphanumeric system. </p>
	<p><b>Classes Listed</b> </p><hr><br/>
	<p align='justify'> The system is made up of seven tables and ten main classes, each of which is divided into ten secondary classes or subcategories, each of which contain ten subdivisions.
The <b>tables</b> are:</p>
<ul> + standard subdivision</ul>
<ul>+ areas</ul>
<ul>+ subdivision of individual literatures </ul>
<ul>+ subdivisions of individual languages </ul>
<ul>+ racial, ethnic, national groups </ul>
<ul>+ languages</ul>
<ul>+ persons</ul>
	
</td>
<tr>
	<td align='left'> <a href='getClass.php'><input type='button' value='View Classification'></a> </td>
	<td align='right'> <a href='aboutddc2.php'><input type='button' value='Next >>'> </a></td>
</tr>
</table>
</div>

	</table>
		<div id="navigation2BG">
		<div id="navigation2">
			<table align='center'>
				<tr>
				<tr>
				<td><a title='payments' href="../payment/readPayment.php"><img src="../includes/img/nav_icons/payment.png" width='80' height='80' onmouseover="this.style.zoom='200%';this.style.zoom='200%';" onmouseout="this.style.zoom='100%';this.style.zoom='100%';"></a></td>
				<td><a title='author' href="../authors/getAuthors.php"><img src="../includes/img/nav_icons/author.png" width='80' height='80' onmouseover="this.style.zoom='200%';this.style.zoom='200%';" onmouseout="this.style.zoom='100%';this.style.zoom='100%';"></a></td>
				<td><a title='penalties' href="../penalty/readPenalty.php"><img src="../includes/img/nav_icons/safe.png" width='80' height='80' onmouseover="this.style.zoom='200%';this.style.zoom='200%';" onmouseout="this.style.zoom='100%';this.style.zoom='100%';"></a></td>
				<td><a title='borrowers' href="../borrowers/getBorrowers.php"><img src="../includes/img/nav_icons/borrower.png" width='80' height='80' onmouseover="this.style.zoom='200%';this.style.zoom='200%';" onmouseout="this.style.zoom='100%';this.style.zoom='100%';"></a></td>
				<td><a title='transaction' href="../transaction/readTransaction.php"><img src="../includes/img/nav_icons/transaction.png" width='80' height='80' onmouseover="this.style.zoom='200%';this.style.zoom='200%';" onmouseout="this.style.zoom='100%';this.style.zoom='100%';"></a></td>
				<td><a title='classification' href="../classification/getClass.php"><img src="../includes/img/nav_icons/classification.png" width='80' height='80' onmouseover="this.style.zoom='200%';this.style.zoom='200%';" onmouseout="this.style.zoom='100%';this.style.zoom='100%';"></a></td>
				<td><a title='books' href="../books/addBook.php"><img src="../includes/img/nav_icons/books.png" width='80' height='80' onmouseover="this.style.zoom='200%';this.style.zoom='200%';" onmouseout="this.style.zoom='100%';this.style.zoom='100%';"></a></td>		
				</tr>
			</table>
		</div>
	</div>
	</div>
	</div>
</div>
</html>

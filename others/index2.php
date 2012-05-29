<html>
<head>

<link rel="stylesheet" href="layout.css" type="text/css" media="screen">
</head>
<div id="background">

	
	
<div id="container">

	<div id="header">
	<img src="./img/logo1.png" width='330' height='150'>	
		<div id="navigation">
		<ul>
			<li><a href="logout.php"><img src="./includes/img/nav_home.png" width='30' height='30'>Log Out</a></li>
			<li><a href="#"><img src="./includes/img/nav_home.png" width='30' height='30'>Inventory</a></li>
			<li><a href="login.php"><img src="./includes/img/nav_home.png"width='30' height='30'>Updates</a></li>
			<li><a href="login.php"><img src="./includes/img/nav_home.png"width='30' height='30'>Home</a></li>
		</ul>
		</div>
	</div>

	<div id="content-container">
	<table>
	<tr>
	<td>
		<div id="contentA">
		

		</div>
	</td>
	<td>
		<div id="contentb">
		<table id='searchBG'>
			<tr>
				<td id='titleSearch' colspan='2'>Book You Must Read</td>
			<tr>
			<tr>
			<td id='s'>
				<table id='search'>
				
					  <form method = 'post' action = "<?php echo $_SERVER['PHP_SELF'];?>">
				<tr>
					<td>Search for :<td>
				</tr>
				
				<tr>
					<td><input type= 'text' name = 'key' id = 'key'/></td>
				</tr>
				
				<tr>
					<td>on : </td>
				</tr>
				<tr>
					<td><select name = 'field'>
							   <option value = 'book_title'> Book Title</option>
							   <option value = 'copyright'> Copyright</option>
							   <option value = 'publisher'> Publisher</option>
							   <option value = 'page_number'> Page Number</option>
							   <option value = 'description'> Description</option>
							   <option value = 'unit_price'> Unit Price</option>
							   <option value = 'location'> Location</option>
							   <option value = 'remaining_stock'> Stock Available</option>
					</select>
					</td>
				</tr>
				<tr>
					<td align='center'><input type = 'submit' name = 'submit' value = 'submit'/></td>
				</tr>
					</form>
				</table>

			</td>
		
			<td>
				<img src="./img/bookss.png" width='150' height='300'>			
			</td>
			</tr>
		</table>
		</div>
	</td>
	</tr>
	</div>
	</table>
	<div id="navigation2BG">
		<div id="navigation2">
			<table align='center'>
				<tr>
				<td><a title='payments' href="#"><img src="./includes/img/nav_icons/payment.png" width='80' height='80' onmouseover="this.style.zoom='200%';this.style.zoom='200%';" onmouseout="this.style.zoom='100%';this.style.zoom='100%';"></a></td>
				<td><a title='author' href=""><img src="./includes/img/nav_icons/author.png" width='80' height='80' onmouseover="this.style.zoom='200%';this.style.zoom='200%';" onmouseout="this.style.zoom='100%';this.style.zoom='100%';"></a></td>
				<td><a title='penalties' href="./classification/getClass.php"><img src="./includes/img/nav_icons/safe.png" width='80' height='80' onmouseover="this.style.zoom='200%';this.style.zoom='200%';" onmouseout="this.style.zoom='100%';this.style.zoom='100%';"></a></td>
				<td><a title='borrowers' href="./authors/getAuthors.php"><img src="./includes/img/nav_icons/borrower.png" width='80' height='80' onmouseover="this.style.zoom='200%';this.style.zoom='200%';" onmouseout="this.style.zoom='100%';this.style.zoom='100%';"></a></td>
				<td><a title='transaction' href="./borrowers/getBorrowers.php"><img src="./includes/img/nav_icons/transaction.png" width='80' height='80' onmouseover="this.style.zoom='200%';this.style.zoom='200%';" onmouseout="this.style.zoom='100%';this.style.zoom='100%';"></a></td>
				<td><a title='classification' href="./books/getBooks.php"><img src="./includes/img/nav_icons/classification.png" width='80' height='80' onmouseover="this.style.zoom='200%';this.style.zoom='200%';" onmouseout="this.style.zoom='100%';this.style.zoom='100%';"></a></td>
				<td><a title='books' href="./books/getBooks.php"><img src="./includes/img/nav_icons/books.png" width='80' height='80' onmouseover="this.style.zoom='200%';this.style.zoom='200%';" onmouseout="this.style.zoom='100%';this.style.zoom='100%';"></a></td>		
				</tr>
			</table>
		</div>
	</div>
	</div>
</div>
</html>

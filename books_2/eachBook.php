<?php

include "../utils/BookUtils.php";
$id = $_GET['id'];
$result = BookUtils::readEachBook($id);

?>


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

</head>
<table class="altrowstable" id="alternatecolor">

				<?php foreach($result as $book): ?>	
			
				
				<tr>
					<td class='first'> Accession Number: </td>
					<td> <?php echo $book['accession_num']; ?> </td>
				</tr>
				
				<tr>
					<td class='first'> Book Title: </td>
					<td style='min-width:30px;' colspan='3'><h4><?php echo $book['book_title']; ?></h4></td>
				</tr> 
				
				<tr>
					<td class='first'> Copyright: </td>
					<td style='min-width:30px;'><?php echo $book['copyright']; ?></td>
					<td class='first'> Publisher: </td>
					<td style='min-width:30px;'><?php echo $book['publisher']; ?></td>
				<tr> 
				
				<tr>
					<td class='first'> Classification: </td>
					<td colspan='2' style='min-width:30px;'><?php echo $book['class_name']; ?></td>
				</tr>
				
				<tr>
					<td class='first'> Author: </td>
					<td colspan='2' style='min-width:30px;'><?php echo $book['firstname']." ". $book['lastname']; ?></td>
				</tr>
				<?php endforeach; ?>
	</table>
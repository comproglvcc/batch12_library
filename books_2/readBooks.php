<?php
	include "../utils/BookUtils.php";
	$result = BookUtils::readBooks();
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
			    
				<TR align='center'>
					<th> </th>
					<th> Accession Number </th>
					<th> Book Title </th>
					<th> Copyright </th>
					<th> Publisher </th>
					
			
				</TR>
				
				<?php foreach($result as $book): ?>
				
				
				<tr>
					<td title="Click to view details"align='center'> <a href="eachBook.php?id=<?php echo $book['book_id']; ?>"><img src='../includes/img/view.png' width='20' height='20'></td> 
					<td align='center'><?php echo $book['accession_num']; ?> </td>
					<td ><?php echo $book['book_title']; ?></td>
					<td ><?php echo $book['copyright']; ?></td>
					<td ><?php echo $book['publisher']; ?></td>

					
			
				<tr>
				
				<?php endforeach; ?>
				
	</table>
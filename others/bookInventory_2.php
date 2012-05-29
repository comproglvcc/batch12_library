<?php
	include "..utils/BookUtils.php";
	$inventory = BookUtils::bookInventory();
?>

<html>
	<head>
		<title>Book Inventory</title>
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

<link rel="stylesheet" href="./includes/css/class_table.css" type="text/css" media="screen">

	</head>
	
	
	<body>
		<table class="in" id="alternatecolor">
			<tr align='center'>
				
				<td class='first'  colspan='3' ><b>Book Title:</b></td>
				<td class='first' ><b>Original Stocks:</b>
				</td>
				<td class='first' ><b>Remaining Stocks:</b><br>
					<i>(Number of Stocks Available)</i>
				</td>
				<td class='first' ><b>Books Out:</b><br>
					<i>(Number of Stock on Hand <br>by the Borrowers )</i>
				</td>
			</tr>
		<?php foreach($inventory as $invent): ?>
			<tr>
				<td class='first'><a href=''><img src='./includes/img/view.png'/></a>
                                       </br><a href=''><img src='./includes/img/delete.png'/></a></td>
				<td class='first'><a href=''><img src='./includes/img/book.png' width='50px' height='50px' /></a></td>
				<td width='100px' align='center'>
					<a href="oneBook.php?id=<?php echo $invent['book_id'];?>"><?php echo $invent['book_title']; ?></a></td>
				<td><p style='color:blue; text-align:center;'><i><b> <?php echo $invent['original_stock']; ?></b></i></p>

				</td>
				<td><p style='color:blue; text-align:center;'><i><b><?php echo $invent['remaining_stock']; ?></b></i></p>
					<?php
						$id = $invent['book_id'];
						$sql = mysql_query("select accession_num from book_status where status = 'in' and book_id = {$id}");
						$in = array();
						while($temp = mysql_fetch_assoc($sql)){
								$in[] = $temp;
                                                 }
						foreach($in as $book_in){

                                                            echo "<a href='borrowBook.php?id=" .$book_in['accession_num'];
                                                            echo "' title='Borrow this book?'>";
							echo $book_in['accession_num'];
							     echo ",";
							     echo"</a>";
						}


					?>
					
				</td>
				<td width='80px'>
					<?php
						$out_query = mysql_query("select accession_num from book_status where status = 'out' and book_id = {$id}");
						$total = mysql_num_rows($out_query);
					?>
				<p style='color:blue; text-align:center;'><i><b><?php echo $total; ?></b></i></p>
					<?php
						$id = $invent['book_id'];
						$sql2 = mysql_query("select accession_num from book_status where status = 'out' and book_id = {$id}");
						$out = array();
						while($temp = mysql_fetch_assoc($sql2)){
								$out[] = $temp;
						}
						foreach($out as $book_out){
							$access = $book_out['accession_num'];
							$details = mysql_query("select * from transaction t 
													join book_status b on(b.accession_num=t.book_access_num)
													join borrowers br on(t.borrowers_id = br.student_id)
													where t.book_access_num = {$access}");
								$detail_stock = array();
									while($tempo = mysql_fetch_assoc($details)){
										$detail_stock[] = $tempo;
									
									foreach($detail_stock as $det){
									$course = $det['course'];
										}
									}
									if($course=='Com prog'){
									$c = 'CP';
									}elseif($course='Mass Com'){
									$c = 'MCT';
									}elseif($course='Ab Broadcasting'){
									$c = 'ABB';
									}elseif($course='International Cookery '){
									$c = 'IC';
									}elseif($course='Nursing Assistant'){
									$c = 'NA';
									}
									
									

								echo "<a href='details.php' title=". $det['lname'].",". $det['name'] ."-". $c.	">";
										echo $book_out['accession_num'] . ', ';
								echo"</a>";									
		
									}
								
						
					?>
				</td>
			</tr>
			</tr>

			<?php endforeach; ?>
		</table>
	
	</body>
</html>

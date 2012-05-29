<?php
	session_start();
	if ((empty($_SESSION)) || ($_SESSION['level']!== 'admin')){
		header("location:../index.php");
		
		} else {
			include "../utils/BookUtils.php";
	$inventory = BookUtils::bookInventory();
			include "../utils/ClassificationUtils.php";
			$classes=ClassificationUtils::getClass();

  include '../utils/SearchUtils.php';
          if(isset($_POST['submit'])){
               $key = $_REQUEST['key'];
               $field = $_POST['field'];
               $result = SearchUtils::searchOnBook($key, $field);
			   $num_result = SearchUtils::countSearch($key, $field);
          }
 	}

?>
<html>
<head>       
        <link type="text/css" rel="stylesheet" href="../includes/css/css/styles.css" />
		 <link type="text/css" rel="stylesheet" href="../includes/css/class_table.css" />
			<script type="text/javascript" src="../includes/css/js/jquery.min.js"></script>
        	<script type="text/javascript" src="../includes/css/js/jquery.pajinate.js"></script>			
                                 
						<script type="text/javascript">
                                  $(document).ready(function(){
                                  	$('#pager').pajinate({
        					num_page_links_to_display :6,
        					items_per_page :21
        				});
        			    });
									$(document).ready(function(){
									$('.buk:odd, .altrowstable > *:odd').css('background-color','#fff');
								});
								$(document).ready(function(){
									$('.buk:even, .altrowstable > *:even').css('background-color','CCCCFF');
								});
											
						</script>
						
						
						

	<div id="header">
	LVLib
	<p class='logo'>La Verdad Christian College Library System</p>
	</div>
<div id = "bodyback">
<title>View all Borrowers</title>
<?php
	  function de_color($name){
		$find = $_POST['key'];
		$rep= "<b style = 'background-color:CCFFFF'>$find</b>";
		$newphrase = str_replace($find, $rep,$name);
		echo $newphrase;
		echo "<br>"; 
	}
?>

</head>
<body>
<h2 style='padding:10px;background:99CCFF;'>Welcome To LVCC Library Management System <?php echo @$name;?>, You are currently log in as administrator.
<a style= "color:red;"href="../logout.php" title='Click to LOG OUT on SYSTEM'>Log Out</a>
</h2>
	<div id="content">
	      <form method = 'post' action = "<?php echo $_SERVER['PHP_SELF'];?>">
            Search for : <input type= 'text' name = 'key' id = 'key'/>
            on <select name = 'field'>
                       <option value = 'book_title'> Book Title</option>
                       <option value = 'copyright'> Copyright</option>
                       <option value = 'publisher'> Publisher</option>
                       <option value = 'page_number'> Page Number</option>
                       <option value = 'description'> Description</option>
                       <option value = 'unit_price'> Unit Price</option>
                       <option value = 'location'> Location</option>
                       <option value = 'remaining_stock'> Stock Available</option>
            </select>
            <input type = 'submit' name = 'submit' value = 'submit'/>

      </form>
	  </div>
	<div id="navigation">
		<ul>
			<li><a href='../penalty/readPenalty.php'>Fines</a></li>
			<li><a href="../transaction/addTransaction.php">Loans</a></li>
			<li><a href="../transaction/readTransaction.php">Current Loans</a></li>
			<li><a href="../borrowers/getBorrowers.php">Borrowers</a></li>
			<li><a href="../books/bookInventory.php">Inventory</a></li>
			<li><a href='../admin_main.php'>Request</a></li>
			<li><a href="../books/addBook.php">Books</a></li>

		</ul>
	</div>
				<div id = 'class_nav' style='margin-top:-75px;'>
		<h2>CATEGORIES</h2>
		<hr>
		<table>
			 <?php foreach($classes as $c): ?>
			 <tr>
				 <td style='text-decoration: none;'><img onmouseover="this.style.zoom='120%';this.style.zoom='120%';" onmouseout="this.style.zoom='120%';this.style.zoom='100%';" src="../includes/img/class/<?php echo $c['class_id']; ?>.png" width='50' height='50'></td>
				 <td><a title = "<?php echo $c['class_description'];?>"style='text-decoration:none;color:black;'href="../book_class.php?id=<?php echo $c['class_id'];?>"><?php echo $c['class_name'];?></a></td>
			 </tr>
			 <?php endforeach; ?>
		</table>
		</div>
	<?php if(empty($_POST['submit']) && empty($id)):?>

<div style='float:left;margin-left:35px;width:800px;'>
<h2 style = "margin-top:10px;float:center;text-align:center;">Book Inventory</h2>

<hr/>

<img style="float:right;width:40px; height:40px;" src = "../img/icons/addBook.png"><p style = "text-decoration:none;text-align:right;font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;margin:10px;"><a title = "add new book records of book.." style = "text-decoration:none;" href="../books/addBook.php">Add Books</a></p>

<hr/>
	
	<table style="margin-top:10px; margin-left:20px; width:750px;">

	<tr style="text-align:center;border:solid blue;">
		<td><h2 style = "font-style:normal;width:225px;">Book Title</h2></td>
		<td><h2 style = "font-style:normal;width:130px;">Original Stocks</h2></td>
		<td><h2 style = "font-style:normal;width:190px;">Remaining Stocks</h2></td>	
		<td><h2 style = "font-style:normal;width:100px;">Books Out</h2></td>
	</tr>
	</table>
</div>

<div style="width:850px;height:400px;">
			<table class="altrowstable" id="alternatecolor">
	<?php foreach($inventory as $invent): ?>
			<tr>
				<td width='210px' align='left'>
					<a style="color:#424242;text-decoration:none;" href="viewStock.php?id=<?php echo $invent['book_id'];?>"><?php echo $invent['book_title']; ?></a></td>
				<td width='120px'><p style='color:#424242; text-align:center;'><i><b> <?php echo $invent['original_stock']; ?></b></i></p>

				</td>
				<td width='120px'><p style='color:#424242; text-align:center;'><i><?php echo $invent['remaining_stock']; ?></i></p>
					<?php
						$id = $invent['book_id'];
						$sql = mysql_query("select accession_num from book_status where status = 'in' and book_id = {$id}");
						$in = array();
						while($temp = mysql_fetch_assoc($sql)){
								$in[] = $temp;
                                                 }
						foreach($in as $book_in){

                                                            echo "<a style='text-decoration:none;' href='../transaction/addTrans.php?id=" .$book_in['accession_num'];
                                                            echo "' title='Borrow this book?'>";
							echo $book_in['accession_num'];
							     echo ",";
							     echo"</a>";
						}


					?>
					
				</td>
				<td width='120px'>
					<?php
						$out_query = mysql_query("select accession_num from book_status where status = 'out' and book_id = {$id}");
						$total = mysql_num_rows($out_query);
					?>
				<p style='color:#424242; text-align:center;'><i><?php echo $total; ?></i></p>
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

									

								echo "<a href='details.php' title=". $det['lastname'].",". $det['firstname'] ."-". $course.	">";
										echo $book_out['accession_num'] . ', ';
								echo"</a>";									
		
									}
							}	
						
					?>
				</td>
			</tr>
			</tr>

			<?php endforeach; ?>
		</table>
	
</div>
<?php endif;?>

		                <?php if(isset($_POST['submit'])):?>
                     <div id="pager" class="container">

				<h2>Book Search Result : </h2>
				<?php if(isset($_POST['key'])):?>
				<span style=''><i>Searching for any matches of <b><?php echo @$_POST['key'];?>:</b> </i><br><?php
	
										if($num_result>0){
										echo "<h2>" .$num_result. "  record/s found</h2>";
										}else{
										echo "<h2>no record found</h2>";
										}
										?></span>
				<?php endif;?>
				<div class="page_navigation" ></div>
				
				<ul class="content">
				<table>
				<?php foreach($result as $key): ?>
				<p><span><div style='clear:right;width:60px;margin-bottom:10px;'><img src="./img/<?php echo $key['book_id'];?>.gif" width ='50' height='80'/></div>
				<div style='margin-top:-80px;clear:left;border-bottom:1px dashed 6699FF;margin-left:60px;font-size:15px;text-decoration:none;color:black;font-style:normal;'><a title="click to view details" style = href='accepted.php?id=<?php echo $key['book_id'];?>'>
						<b><?php de_color($key['book_title']); ?></b></div><div style='margin-left:60px;clear:left;'><b>Author :</b> <?php echo $key['au_firstname'];?> <?php echo $key['au_lastname'];?></div>
						<div style='margin-left:60px;clear:left;'><b style="color:green;"><?php echo $key['remaining_stock'];?></b> Available Stock/s</div>
						<div style='height:25px;margin-left:60px;margin-bottom:10px;clear:left;'><a  class="button_detail" title="click to view details" href='sendrequest.php?id=<?php echo $key['book_id'];?>'>DETAILS</a>
																					<a class = "button_request" title="click request for new loan" href='accepted.php?id=<?php echo $key['book_id'];?>'>REQUEST LOAN</a></div></span></p>				
				</div>
				<?php endforeach; ?>

                                </table>
				</ul>

			</div>
		</div>
               <?php endif;?>
			   </div>
</body>
</html>
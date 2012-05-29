<?php
	session_start();
	if  (@$_SESSION['level']=='admin'){
	
			include "../utils/BookUtils.php";
			include "../utils/ClassificationUtils.php";
			$classes=ClassificationUtils::getClass();
			 include "../utils/AuthorUtils.php";
			$authors=AuthorUtils::getAuthors();

	if(isset($_POST['add'])){
		$access = $_POST['bnumber'];
		$name = $_POST['btitle'];
		$copyright = $_POST['bcopyright'];
		$publisher = $_POST['bpublisher'];
		$page = $_POST['bpagenumber'];
		$author = $_POST['bauthor'];
		$class = $_POST['bclassification'];
		$price = $_POST['bprice'];
		$location = $_POST['blocation'];
	$isExisting = BookUtils::exist($access, $name, $copyright, $publisher, $page, $author, $class, $price, $location);

        if($isExisting){
            $result = BookUtils::addBook($access, $name, $copyright, $publisher, $page, $author, $class, $price, $location);
	}else{
              $confirmation="<span color='red'>This item is already existing in the database, cannot be saved again.</span>";
 }
        if(@$result=='true'){
            $confirmation= "<span color='green'>Successfully saved another item.</span>";
        }
        }
 	} else {
		header("location:../index.php");
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
						
					<script>
					
	function check_bnumber(){
	bnumber=document.getElementById("bnumber").value;
		if (bnumber.length == 0){	
			return false;
		}else{
			return true;
		}
	}
	
	function check_btitle(){
	title=document.getElementById("btitle").value;
		if (title.length == 0){	
			return false;
		}else{
			return true;
		}
	}
	

	
	function check_bcopyright(){
	copyright=document.getElementById("bcopyright").value;
		if (copyright.length == 0){	
			return false;
		}else{
			return true;
		}
	}
	
	function check_bpublisher(){
	publisher=document.getElementById("bpublisher").value;
		if (publisher.length == 0){
			return false;
		}else{
			return true;
		}
	}
	function check_bpagenumber(){
	numpages=document.getElementById("bpagenumber").value;
		if (numpages.length == 0){
			return false;
		}else{
			return true;
		}
	}
	
	function check_bprice(){
	price=document.getElementById("bprice").value;
		if (price.length == 0){
			return false;
		}else{
			return true;
		}
	}
	
	function check_blocation(){
	location=document.getElementById("blocation").value;
		if (location.length == 0){
			return false;
		}else{
			return true;
		}
	}
	
	function validate_addBook(){
		if(check_bnumber() && check_btitle() && check_bcopyright() && check_bpublisher()
			&& check_bpagenumber() && check_bprice() && check_blocation()){
			return true;
		}else{
			alert("Complete all the data needed!");
			return false;
		}
	}


</script>

						
						

	<div id="header">
	LVLib
	<p class='logo'>La Verdad Christian College Library System</p>
	</div>
<div id = "bodyback">
<title>Add Book Transaction</title>
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
<h2 style='padding:10px;background:99CCFF;'>Welcome To LVCC Library Management System. You are currently log in as administrator.
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
	<?php if(empty($_POST['submit']) ):?>
	
<div style='float:left;margin-left:30px;width:788px;'>
	<h2 style = "margin-top:10px;float:center;text-align:center;">Add another Book Record</h2>
	<hr/>
		<?php echo @$confirm; ?>
	<form action="<?php $_SERVER['PHP_SELF']; ?>" method='POST'>
	<table style="margin-top:10px;margin-bottom:15px; margin-left:14px;width:200px;">

	<tr>
		<td colspan='4'><h2 style = "font-style:normal;color:red;"><?php echo @$confirmation; ?></h2></td>
	</tr>
	<tr>
		<td><h2 style = "font-style:normal;font-family:Century Gothic;padding:10px;">Accession Number</h2></td>
		<td colspan='3'> <input type='text' name='bnumber' id='bnumber' size='30'onblur='check_bnumber()'></td>
	</tr>
	<tr>
		<td><h2 style = "font-style:normal;font-family:Century Gothic;padding:10px;">Book Title</h2></td>
		<td colspan='3'> <input type='text' name='btitle' id='btitle' size='100'onblur='check_btitle()'></td>
	</tr>
	<tr>
		<td><h2 style = "font-style:normal;font-family:Century Gothic;padding:10px;">Book Copyright</h2></td>
		<td> <input type='text' name='bcopyright' id='bcopyright' size='30'onblur='check_bcopyright()'></td>
		<td><h2 style = "font-style:normal;font-family:Century Gothic;padding:10px;">Book Publisher</h2></td>
		<td> <input type='text' name='bpublisher' id='bpublisher' size='42'onblur='check_bpublisher()'></td>
	</tr>
	
	
	<tr>
		<td><h2 style = "font-style:normal;font-family:Century Gothic;padding:10px;">Page Number</h2></td>
		<td> <input type='text' name='bpagenumber' id='bpagenumber' size='30'onblur='check_bpagenumber()'></td>
		<td><h2 style = "font-style:normal;font-family:Century Gothic;padding:10px;">Classification</h2></td>
		<td><select name ="bclassification">
			<?php foreach($classes as $class):?>
			<option value=<?php echo $class['class_id']; ?>><?php echo $class['class_name'];?></option>
			<?php endforeach;?>
		</select>
	</td>
	</tr>
	
	<tr>
		<td><h2 style = "font-style:normal;font-family:Century Gothic;padding:10px;">Author</h2></td>
		<td><select name ="bauthor">
			<?php foreach($authors as $author):?>
			<option value=<?php echo $author['author_id']; ?>><?php echo $author['firstname']." ".$author['lastname'];?></option>
			<?php endforeach;?>
			</select>
		</td>
		<td colspan='2'>
			<i>If the author of the book doesn't exist, <a href='../authors/addAuthor.php'>click</a> here.</i>
		</td>
	</tr>
	
	<tr>
		<td><h2 style = "font-style:normal;font-family:Century Gothic;padding:10px;">Unit Price</h2></td>
		<td> <input type='text' name='bprice' id='bprice' size='15'onblur='check_bprice()'> Php</td>
		<td><h2 style = "font-style:normal;font-family:Century Gothic;padding:10px;">Location</h2></td>
		<td> <input type='text' name='blocation' id='blocation' size='42'onblur='check_blocation()'></td>
	</tr>
	</table>
	<hr/>
	<table style="width:700px;">
	<tr>
		<td style="padding:20px;float:center;" align='center'><input type='submit' name='add' value='   S A V E  ' onclick ="return validate_addBook()" /></td>
	</tr>	
</form>
</table>
	  </div>
<?php endif; ?>
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
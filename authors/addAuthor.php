<?php
	session_start();
	if  (@$_SESSION['level']=='admin'){
	
			include "../utils/BookUtils.php";
			include "../utils/ClassificationUtils.php";
			$classes=ClassificationUtils::getClass();
			 
	if (!empty($_POST)){
			include "../utils/AuthorUtils.php";
			
			$firstname= strip_tags($_POST['firstname']);
			$lastname = strip_tags($_POST['lastname']);
			$birth = $_POST['bmonth']." / ".$_POST['bday']." / ".$_POST['byear'];
			$death = $_POST['dmonth']." / ".$_POST['dday']." / ".$_POST['dyear'];
			$description = strip_tags($_POST['description']);
			$submit=$_POST['add'];
if ($submit){
	$check=AuthorUtils::check_ifexist($firstname,$lastname);
		if ($check === True){
			$confirmation=" $firstname  $lastname Already Exist";
		}else{
			
				$result = AuthorUtils::addAuthor($firstname, $lastname, $birth, $death, $description);
					if ($result === TRUE){
					$confirmation="<i>Thank you for adding new author !</i>";
			
				} else{
					$confirmation= "There was an error on adding a new author!";
						echo " <i>Sorry something went wrong!</i>";	
				}
				
		
			}
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


	function check_firstname(){
	fname=document.getElementById("firstname").value;
		if (fname.length == 0){	
			return false;
		}else{
			return true;
		}
	}
	

	
	function check_lastname(){
	lname=document.getElementById("lastname").value;
		if (lname.length == 0){	
			return false;
		}else{
			return true;
		}
	}
	

	
	
	function validate_addAuthor(){
		if( check_firstname() && check_lastname()){
			return true;
		}else{
			alert("First name and the last name of the author required!");
			return false;
		}
	}


</script>

						
						

	<div id="header">
	LVLib
	<p class='logo'>La Verdad Christian College Library System</p>
	</div>
<div id = "bodyback">
<title>Add Book Author</title>
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
	
<div style='float:left;margin-left:35px;width:788px;'>
	<h2 style = "margin-top:10px;float:center;text-align:center;">Add an Author</h2>
	<hr/>
		
		<form action="<?php $_SERVER['PHP_SELF']; ?>" method='POST'>
<table style="margin-top:10px;margin-bottom:15px; margin-left:14px;width:200px;">
	
	<tr>
		<td colspan='4'><h2 style = "font-style:normal;color:red;"><?php echo @$confirmation; ?></h2></td>
	</tr>
	<tr style="padding:10px;">
			<td><h2 style = "font-style:normal;font-family:Century Gothic;padding:10px;">First Name</h2></td>
		<td> <input type='text' name='firstname' id='firstname' size='40'onblur='check_firstname()'></td>
			<td><h2 style = "font-style:normal;font-family:Century Gothic;padding:10px;">Last Name</h2></td>
		<td> <input type='text' name='lastname' id='lastname' size='40'onblur='check_lastname()'></td>
		
	</tr>
	
	
	<tr style="padding-bottom:30px;">
			<td><h2 style = "font-style:normal;font-family:Century Gothic;padding:10px;">Date of Birth</h2></td>
		<td>
		<i> If its <font color='red'>unknown</font>, use this   "<font color='red'>- -</font>" </i><br/><br/>
		<option value='mm'> - - </option>
		<select name ="bmonth">
		<?php $months = array(' - - ',
							'Jan',
							'Feb',
							'Mar',
							'Apr',
							'May',
							'June',
							'July',
							'Aug',
							'Sept',
							'Oct',
							'Nov',
							'Dec');
		?>
		<?php for($m=0;$m<13;$m++): ?>
		<option value='<?php echo $months[$m]; ?>'><?php echo $months[$m]; ?></option>
		<?php endfor; ?>
		</select>
		
		<select name='bday'>
		<option value='dd'> - - </option>
		<?php for($d=1; $d<32; $d++): ?>
		<option value='<?php echo $d; ?>'><?php echo $d; ?></option>
		<?php endfor; ?><br/>
		</select>
		
		
		<select name='byear'>
		<option value='yyyy'> - - - - </option>
		<?php for($y=2012; $y>=1960; $y--): ?>
		<option value='<?php echo $y; ?>'><?php echo $y; ?></option>
		<?php endfor; ?>
		</select>
	</td>
	
			<td><h2 style = "font-style:normal;font-family:Century Gothic;padding:10px;">Date of Death</h2></td>
		<td colspan='2'>
		<i> If its <font color='red'>unknown</font>, use this   "<font color='red'>- -</font>" </i><br/><br/>
		<option value='mm'> - -</option>
		<select name ="dmonth">
		<?php $months = array(' - - ',
							'Jan',
							'Feb',
							'Mar',
							'Apr',
							'May',
							'June',
							'July',
							'Aug',
							'Sept',
							'Oct',
							'Nov',
							'Dec');
		?>
		<?php for($m=0;$m<13;$m++): ?>
		<option value='<?php echo $months[$m]; ?>'><?php echo $months[$m]; ?></option>
		<?php endfor; ?>
		</select>
		
		<select name='dday'>
		<option value='dd'> - - </option>
		<?php for($d=1; $d<32; $d++): ?>
		<option value='<?php echo $d; ?>'><?php echo $d; ?></option>
		<?php endfor; ?><br/>
		</select>
		
		
		<select name='dyear'>
		<option value="yyyy"> - - - - </option>
		<?php for($y=2012; $y>=1960; $y--): ?>
		<option value='<?php echo $y; ?>'><?php echo $y; ?></option>
		<?php endfor; ?>
		</select>
	
	</td>
	
	<tr style="padding:30px;">
			<td><h2 style = "font-style:normal;font-family:Century Gothic;padding:10px;">Description</h2></td>
		<td colspan='3'> <textarea name='description' cols='80' rows='3'></textarea> </td>
	</tr>
	</table>
	<hr/>
	<table style="width:700px;">
	<tr>
		<td style = "padding:20px;" colspan='4'align='center'><input type='submit' name='add' value='   S A V E  ' onclick ="return validate_addAuthor()" /></td>
	</tr>	

</table>
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
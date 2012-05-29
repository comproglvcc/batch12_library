<?php
	session_start();
	if ($_SESSION['level']!== 'admin'){
		header("location:../index.php");
		
		} else {
			
			include "../utils/ClassificationUtils.php";
			$classes=ClassificationUtils::getClass();
			include '../utils/PenaltyUtils.php';
			$result = PenaltyUtils::readPenalty();
			$amount = PenaltyUtils::readAmount();
			if(isset($_POST['payamount'])){
			$amount = $_POST['amount'];
			$update = PenaltyUtils::updatePenalty($amount);
				if($update == TRUE){
				$confirm = "<p style='color:blue; font-family:Monotype Corsiva; font-size:20px; text-align:center; padding:4px;float: left;
				width: 500px;background:#FFCCCC;border:groove solid red;margin-bottom:3px;'>You have updated the Penalty Amount successfully!</p><br/>";
				}else{
				$confirm = "<p style='color:red; font-family:Monotype Corsiva; font-size:20px; text-align:center; padding:4px;float: left;
				width: 500px;background:#FFCCCC;border:groove solid red;margin-bottom:3px;'>Failed to update the Penalty Amount!</p><br/>";
				}
		}

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
<title>View all Penalty Records</title>
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
	

<h2 style = "margin-top:10px;float:center;text-align:center;">Book Penalty Records</h2>
		<hr/>
		<div style="text-align:right;width:700px; margin-top:10px; margin-bottom:-5px;margin-left:70px; height:30px; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;">
						<form action = "<?php echo $_SERVER['PHP_SELF']?>" method='POST'>
							Update Current Penalty Amount :<input type ='text' size='7' name='amount' id='amount' value='<?php echo $amount;?>'/>  Php        <input type='submit' name='payamount' value =' U P D A T E   P E N A L T Y ' onclick = 'return confirm("Are you sure want to alter the current penalty amount per day?")'/ ></td>
						</form>
		
		</div>
		<hr/>	
	<table style="margin-top:10px; margin-left:20px; width:750px;">

	<tr style="text-align:center;border:solid blue;width:750px;">
		<td><h2 style = "font-style:normal;width:120px;">Book Title</h2></td>
		<td><h2 style = "font-style:normal;width:80px;">Accession Number</h2></td>
		<td><h2 style = "font-style:normal;width:70px;">Borrower Name</h2></td>	
		<td><h2 style = "font-style:normal;width:60px;">Course</h2></td>
		<td><h2 style = "font-style:normal;width:60px;">Amount</h2></td>
		<td><h2 style = "font-style:normal;width:60px;">Balance</h2></td>
	</tr>
	</table>
</div>

<div style="width:800px;height:400px;">
			<table class="altrowstable" id="alternatecolor" >
	<?php foreach($result as $penalty): ?>
				<tr>
					<td style = "width:250px;"> <?php echo $penalty['book_title']; ?> </td>
					<td align='center' style = "width:150px; float:center;"> <?php echo $penalty['book_access_num']; ?></td>
					<td style = "width:125px;"> <?php echo $penalty['lastname'] . " " .$penalty['firstname'] ; ?></td>
					<td style = "width:100px;"> <?php echo $penalty['course']; ?> </td>
					<td style = "width:105px;"> <?php echo $penalty['penalty_total']; ?> </td>					
					<td> <?php echo $penalty['balance']; ?> </td>			
					<td><a href="paypenalty.php?id=<?php echo $penalty['penalty_id']; ?>"><input type='button' value=' P a y ' /></a></td>
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
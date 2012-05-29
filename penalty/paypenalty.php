<?php

	session_start();
	if ((empty($_SESSION)) || ($_SESSION['level']!== 'admin')){
		header("location:../index.php");
		
		} else {
			
			
			include "../utils/ClassificationUtils.php";
			$classes=ClassificationUtils::getClass();

		
      include '../utils/PenaltyUtils.php';
	$id = $_REQUEST['id'];
	$details = PenaltyUtils::readPenalty2($id);
	

	if(isset($_POST['pay'])){
	$date = date("Y")."-".date("m")."-".date("d");
	$payment = $_POST['amt'];	
	$results = PenaltyUtils::recordPayment($id, $date, $payment);
	
	if($results==TRUE){
		$payment_view = PenaltyUtils::readPaymentOfBorrower($id);
			foreach($payment_view as $view){
				$date = $view['payment_date'];
				$amount = $view['penalty_total'];
				$total_payment = $view['total_payment'];
				$balance = $view['balance'];
				}
		@$view_payments ="<span style='color:black;text-align:left; clear:left;float:left; font-family:Century Gothic; font-size:15px; padding:0px;
		width:300px;margin-bottom:3px;margin-top:10px;'>
		<table>
		<tr>
			<td>Date:</td><td style = 'padding-left:10px;'>".$date ."</td>
		</tr>
		<tr>
			<td>Amount:</td><td style = 'padding-left:10px;'>".$amount ."</td>
		</tr>
		<tr>
			<td>Current Payment:<br>Previous + Current</td><td style = 'padding-left:10px;'>".$payment."</td>
		</tr>
		<tr>
			<td>Total Payment:</td><td style = 'padding-left:10px;'>".$total_payment ."</td>
		</tr>
		<tr>
			<td>Balance:</td><td style = 'padding-left:10px;'>".$balance."</td>
		</tr>
			</table>
			</span>
		";
				$confirm = "<span style='color:#120A2A; font-family:Monotype Corsiva; font-size:20px; text-align:center; padding:4px;clear:right;float:center;
		width:400px;background:#A9F5A9;border:2px solid #2EFE2E;margin-bottom:1px;'>Successfully recorded penalty payment</span><br/>";
		}else{		
		$confirm = "<p style='color:red; font-family:Monotype Corsiva; font-size:20px; text-align:center; padding:4px;float: left;
		width: 500px;background:#FFCCCC;border:groove solid red;margin-bottom:3px;'>Failed to save the payment into record!</p><br/>";
		}
} 
  include '../utils/SearchUtils.php';
          if(isset($_POST['submit'])){
               @$key = $_REQUEST['key'];
               @$field = $_POST['field'];
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
<title>Pay Penalty</title>
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
	<?php if(empty($_POST['submit'])):?>

<div style='float:left;margin-left:35px;width:800px;'>
<h2 style = "margin-top:10px;float:center;text-align:center;">Payment for Penalty</h2>
<hr/>

<table style = "float:right;height:45px; width:700px;">
<tr>
<td align="center">
<?php echo @$confirm; ?>
</td>
<td>
<img style="float:right;width:40px; height:40px;" src = "../img/icons/addBook.png"><p style = "text-decoration:none;text-align:right;font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;margin-top:10px;margin-bottom:10px;"><a title = "add new book records of book.." onclick = "return window.print()" style = "text-decoration:none;" href="">Print Receipt</a></p>
</td>
</tr>
</table>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method='POST'>


	<table style="margin-top:10px;margin-bottom:10px; margin-left:20px; width:750px;">

	  <tr><td>
		<table>
	<?php foreach($details as $d):?>
	<tr>
			<td rowspan='8'><img src="../includes/img/borrowers/<?php echo $d['student_id'];?>.jpg" border='2' width='200' height='200'/> </td>
	</tr>
		
	
		<tr>
			<td style = "padding-left:20px;font-family:'Helvetica Neue', Helvetica, Arial, sans-serif;">Name :</td><td><?php echo $d['firstname'];?> <?php echo $d['lastname'];?></td>
		</tr>
		<tr>
			<td style = "padding-left:20px;font-family:'Helvetica Neue', Helvetica, Arial, sans-serif;">Course :</td><td><?php echo $d['course'];?></td>
		</tr>
		<tr>
			<td style = "padding-left:20px;font-family:'Helvetica Neue', Helvetica, Arial, sans-serif;">Book Title :</td><td><?php echo $d['book_title'];?></td>
		</tr>
		<tr>
			<td style = "padding-left:20px;font-family:'Helvetica Neue', Helvetica, Arial, sans-serif;">Author :</td><td><?php echo $d['class_name'];?></td>
		</tr>
		<tr>
			<td style = "padding-left:20px;font-family:'Helvetica Neue', Helvetica, Arial, sans-serif;">Acc Num :</td><td><?php echo $d['book_access_num'];?></td>
		</tr>
		<tr>
			<td style = "padding-left:20px;font-family:'Helvetica Neue', Helvetica, Arial, sans-serif;">Issued on :</td><td><?php echo $d['date_issue'];?></td>
		</tr>
		<tr>
			<td style = "padding-left:20px;font-family:'Helvetica Neue', Helvetica, Arial, sans-serif;">Due on :</td><td><?php echo $d['date_due'];?></td>
		</tr>
		
	<?php endforeach;?>
	</table>
	</td>
		
	</tr>
</table>
	
	<hr/>
	


	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method = 'post'>
	<input type='hidden' name = 'id' value="<?php echo $id;?>" />
	<table style="margin-top:10px;margin-bottom:10px;float:right;width:450px;">
	<tr>
		<td style = "font-family:'Helvetica Neue', Helvetica, Arial, sans-serif;">Amount: </td>
		<td><input type='text' name='amt' id='amt'/>
		<input type = 'submit' name='pay' value='  s u b m i t   p a y m e n t  ' onclick = 'return confirm("Submit this payment?")'/></td>

	</tr>
	
	</table>

</form>
<?php echo @$view_payments;?>	  
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
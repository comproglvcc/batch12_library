<?php
	session_start();
	if ((empty($_SESSION)) || ($_SESSION['level']!== 'admin')){
		header("location:../index.php");
		
		} else {
			include "../utils/UserUtils.php";
			$result=UserUtils::viewUsers();
			include "../utils/ClassificationUtils.php";
			$classes=ClassificationUtils::getClass();
			     include "../utils/TransactionUtils.php";

        if(isset($_POST['trans'])){

    $m = $_POST['month'];
	$d = $_POST['day'];
	$y = $_POST['year'];
	$date = $y . "-" . $m . "-" . $d;
	
	$m1 = $_POST['month1'];
	$d1 = $_POST['day1'];
	$y1 = $_POST['year1'];
	$date1 = $y1 . "-" . $m1 . "-" . $d1;
	if(checkdate($m, $d, $y) === FALSE){
	    echo "<span>Invalid Date</span>";
        echo "<a href='" . $_SERVER['PHP_SELF'] . "'>Restart Fill up Book Transaction Form</a>";
        exit;

	}

        $book = $_POST['bAccess'];
        $borower = $_POST['borrower'];
        $date_issue = $date1;
        $date_due = $date;

        $result = TransactionUtils::addTransaction($book, $borower, $date_issue, $date_due);
		
		
		
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
	
<div style='float:left;margin-left:35px;width:788px;'>	
	<h2 style = "margin-top:10px;float:center;text-align:center;">Add Transaction Record</h2>
<hr/>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method='POST'>

	<table style="margin-top:10px; margin-left:150px; width:500px;">

	    <tr>
                       <td><h2 style = "font-style:normal;font-family:Century Gothic;padding:10px;">Student Number</h2></td>
                     
					   <td><select name='borrower'>
					     <?php foreach ($result as $bor):?>
					   <option value="<?php echo $bor['student_id']; ?>"><?php echo $bor['student_id']; ?></option>
					     <?php endforeach; ?>
					   </select></td>
					 
                   </tr>
                   <tr>
                       <td ><h2 style = "font-style:normal;font-family:Century Gothic;padding:10px;">Book Accession Number</h2></td>
                       <td><input type='text' name='bAccess' id='bAccess' size='20'/></td>
                   </tr>
				   <tr>
                       <td ><h2 style = "font-style:normal;font-family:Century Gothic;padding:10px;">Date Issue</h2></td>
                       <td>
                           <select name='month1' id = "month1" onBlur="check_date()">
		<?php
		$months=array(0,
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
		<?php for($m=1; $m <= 12; $m++):?>
		<option value="<?php echo $m; ?>"><?php echo $months[$m];?></option>
		<?php endfor; ?>
		</select>

		<select name='day1' id = "day1" onBlur="check_date()">
		<?php for($d=1; $d <= 31; $d++):?>
		<option value="<?php echo $d?>"><?php echo $d?></option>
		<?php endfor;?>
		</select>

		,
		<select name='year1' id ="year1" onBlur="check_date()">
		<?php $year_now=date("Y");?>
		<?php for($y=$year_now; $y >= 2010; $y--):?>
		<option value="<?php echo $y;?>"><?php echo $y;?></option>
		<?php endfor;?>
		</select>

		</br>
			<span id="help_date"></span>

                       </td>
					   
                   </tr>
                   <tr>
                       <td ><h2 style = "font-style:normal;font-family:Century Gothic;padding:10px;">Date Due</h2></td>
                       <td>
                           <select name='month' id = "month" onBlur="check_date()">
		<?php
		$months=array(0,
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
		<?php for($m=1; $m <= 12; $m++):?>
		<option value="<?php echo $m; ?>"><?php echo $months[$m];?></option>
		<?php endfor; ?>
		</select>

		<select name='day' id = "day" onBlur="check_date()">
		<?php for($d=1; $d <= 31; $d++):?>
		<option value="<?php echo $d?>"><?php echo $d?></option>
		<?php endfor;?>
		</select>

		,
		<select name='year' id ="year" onBlur="check_date()">
		<?php $year_now=date("Y");?>
		<?php for($y=$year_now; $y >= 2010; $y--):?>
		<option value="<?php echo $y;?>"><?php echo $y;?></option>
		<?php endfor;?>
		</select>

		</br>
			<span id="help_date"></span>

                       </td>
					   
                   </tr>
	</table>
	<hr/>
	<table style="width:700px;padding:20px;">
		
                   <tr>
                   <td colspan='2' align='center'><input type = 'submit' name='trans' value='   S A V E  '/></td>
                   </tr>
	</table>
	
	</form>
</div>
 <div style="width:900px; margin-left:20px; height:80px; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;">
	  <?php
	  if(isset($_POST['trans'])){
			foreach(@$result as $r){
				echo "<b>Borrower Id :</b>" . $r['borrowers_id']. "</br>";	
				echo "<b>Book Accession </b>:" . $r['book_access_num']. "</br>";
				echo "<b>Date Issued : <b>". $r['date_issue']. "</br>";
				echo "<b>To be returned on: </b>". $r['date_due']. "</br>";

			
			}
		}
	  ?>
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
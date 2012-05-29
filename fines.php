<?php
	session_start();
	$user_id = $_SESSION['id'];
	@$id = $_REQUEST['id'];
	@$key_in = $_REQUEST['key'];
	mysql_connect('localhost', 'root');
	mysql_select_db('library_2012');
			$query = "SELECT * FROM classification";
		$result= mysql_query($query);
		$classes = array();
		while($class= mysql_fetch_assoc($result)){
			$classes[]=$class;
			
		} 
		if(empty($_POST['submit'])){
		$query2 = "SELECT * FROM books b join book_status bs on(b.book_id = bs.book_id) join authors a on(a.author_id= b.author_id) join classification c on(c.class_id = b.classification_id) where classification_id = {$id} ";
		$resultz= mysql_query($query2);
		$book_classes = array();
		while(@$class= mysql_fetch_assoc(@$resultz)){
			$book_classes[]=$class;
			
		} 
		foreach($book_classes as $c){
		$class_name = $c['class_name'];
		
		}
		}

		$penal = "select * from penalty p join transaction t on(p.transaction_id=t.trans_id)
										join book_status b on(b.accession_num=t.book_access_num)
										join borrowers br on(br.student_id=t.borrowers_id)
										join books bo on(bo.book_id=b.book_id) where p.status != 'paid' and balance != 0 and br.student_id = {$user_id}
										order by t.trans_id DESC ";
	$res_penal = mysql_query($penal);
	$result = array();
	while(@$r = mysql_fetch_assoc(@$res_penal)){
		$result[] =$r; 
	}
	$sql = "select * from requests where student_id_num='{$user_id}'";
	$res = mysql_query($sql);
		$results = array();
	while($r = mysql_fetch_assoc($res)){
		$results[] =$r; 
	}
	$query = "select * from users where id ={$user_id}";
	$user = mysql_query($query);
	$user_array = array();
	while($u = mysql_fetch_assoc($user)){
		$user_array[] = $u;
	}
	foreach($user_array as $user_detail){
		$name = $user_detail['firstname'] . " " . $user_detail['lastname'];
		$email = $user_detail['email'];
		$address = $user_detail['address'];
		$contact = $user_detail['contact'];
		$course = $user_detail['course'];
		$student_id = $user_detail['student_id'];
	
	}

  include './utils/SearchUtils.php';
          if(isset($_POST['submit'])){
               $key = $_REQUEST['key'];
               $field = $_POST['field'];
               $result = SearchUtils::searchOnBook($key, $field);
			   $num_result = SearchUtils::countSearch($key, $field);
          }
 		

?>
<html>
<head>       
         <link type="text/css" rel="stylesheet" href="./includes/css/css/styles.css" />
		 <link type="text/css" rel="stylesheet" href="./includes/css/class_table.css" />
			<script type="text/javascript" src="./includes/css/js/jquery.min.js"></script>
        	<script type="text/javascript" src="./includes/css/js/jquery.pajinate.js"></script>	
                                          
						<script type="text/javascript">
                                  $(document).ready(function(){
                                  	$('#pager').pajinate({
        					num_page_links_to_display :6,
        					items_per_page :21
        				});
        			    });
						</script>
						
						
<title>Request Records of <?php echo $name;?></title>
<?php
	  function de_color($name){
		$find = $_POST['key'];
		$rep= "<b style = 'background-color:yellow'>$find</b>";
		$newphrase = str_replace($find, $rep,$name);
		echo $newphrase;
		echo "<br>"; 
	}
?>

</head>
<body>
	<div id="header">
	LVLib
	<p class='logo'>La Verdad Christian College Library System</p>
	</div>
	<div id = "bodyback">
	<h2 style='padding:10px;background:99CCFF;'>Welcome To LVCC Library Management System <?php echo $name;?>, You are currently log in as member.
<a style= "color:red;"href="#" title='Click to LOG OUT on SYSTEM'>Log Out</a>
</h2>
	<div id = 'mem_detail'>
		<table id="row">
		<tr id= "row">
			<td id="theader">Member Name</td>
			<td id="tcontent"><?php echo $name; ?></td>
			<td id="theader">Student ID</td>
			<td id="tcontent"><?php echo $student_id; ?></td>
		</tr>
		<tr id= "row">
			<td id="theader">Member Email</td>
			<td id="tcontent"><?php echo $email; ?></td>
			<td id="theader">Course</td>
			<td id="tcontent"><?php echo $course; ?></td>
		</tr>
		<tr id= "row">
			<td id="theader">Address</td>
			<td id="tcontent"><?php echo $address; ?></td>
			<td id="theader">Contact</td>
			<td id="tcontent"><?php echo $contact; ?></td>
		</tr>		
		</table>
	</div>
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
			<li><a href='fines.php'>Fines</a></li>
			<li><a href=#>Loans</a></li>
			<li><a href=#>Current Loans</a></li>
			<li><a href=#>Loan History</a></li>
			<li><a href='accepted.php'>Request</a></li>

		</ul>
	</div>
			<div id = 'class_nav'>
		<h2>CATEGORIES</h2>
		<hr>
		<table>
			 <?php foreach($classes as $c): ?>
			 <tr>
				 <td style='text-decoration: none;'><img onmouseover="this.style.zoom='120%';this.style.zoom='120%';" onmouseout="this.style.zoom='120%';this.style.zoom='100%';" src='./includes/img/class/<?php echo $c['class_id']; ?>.png' width='50' height='50'></td>
				 <td><a style='text-decoration:none;color:black;'href="book_class.php?id=<?php echo $c['class_id'];?>"><?php echo $c['class_name'];?></a></td>
			 </tr>
			 <?php endforeach; ?>
		</table>
		</div>
	<?php if(empty($result)):?>
		<table class="altrowstable" id='container' style="margin-left:320px;margin-top:100px;">
		<tr><td>
<h2><center>No Penalty Records</center><h2>
		 <tr></td>
		</table>
	
	<?php endif; ?>

	<?php if(empty($_POST['submit']) && (!empty($result))):?>
	<table class="altrowstable" style="margin-left:320px;margin-top:100px;clear:left;">
	
	<tr style="background:99FF99; text-align:center;border:solid blue;">
		<td>Book Title</td>
		<td>Accession Number</td>
		<td>Due Date</td>
		<td>Fines</td>
		<td>Balances</td>			
	</tr>
	<?php foreach($result as $penalty):?>
	<tr>
					<td> <?php echo $penalty['book_title']; ?> </td>
					<td> <?php echo $penalty['book_access_num']; ?></td>
					<td> <?php echo $penalty['date_due']; ?></td>
					<td> <?php echo $penalty['penalty_total']; ?> </td>					
					<td> <?php echo $penalty['balance']; ?> </td>			
	</tr>
	<?php endforeach;?>
	</table>
	<?php endif;?>


		                <?php if(isset($_POST['submit']) || isset($id)):?>
                     <div id="pager" class="container">

				<h2>Book Search Result : </h2>
				<?php if(isset($_POST['key']) || isset($id)):?>
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
				<p><span><div style='clear:right;width:60px;margin-bottom:10px;'><img src="./images/img/<?php echo $key['book_id'];?>.gif" width ='50' height='80'/></div>
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
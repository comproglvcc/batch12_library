<?php
	session_start();
	if (empty($_SESSION)){
		header("location:index.php");
	} else {
		if ($_SESSION['level']!== 'admin'){
			echo "You are not allowed to view this page!";
		
		} else {
	$user_id = $_SESSION['id'];
	$student_id = $_SESSION['student_id'];
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
	$sql = "select * from requests r join users u on(u.student_id = r.student_id_num)
	join books b on(b.book_id = r.book_id) order by date_requested DESC";
	$res = mysql_query($sql);
	$num = mysql_num_rows($res);
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
 	}
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
<title>ADMIN MAIN PAGE</title>
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
<h2 style='padding:10px;background:99CCFF;'>Welcome To LVCC Library Management System <?php echo $name;?>, You are currently log in as administrator.
<a style= "color:red;"href="logout.php" title='Click to LOG OUT on SYSTEM'>Log Out</a>
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
			<li><a href='./penalty/readpenalty.php'>Fines</a></li>
			<li><a href="./transaction/addTransaction.php">Loans</a></li>
			<li><a href="./transaction/readTransaction.php">Current Loans</a></li>
			<li><a href="./borrowers/getBorrowers.php">Borrowers</a></li>
			<li><a href="./books/bookInventory.php">Inventory</a></li>
			<li><a href='admin_main.php'>Request</a></li>

		</ul>
	</div>
				<div id = 'class_nav' style='margin-top:-75px;'>
		<h2>CATEGORIES</h2>
		<hr>
		<table>
			 <?php foreach($classes as $c): ?>
			 <tr>
				 <td style='text-decoration: none;'><img onmouseover="this.style.zoom='120%';this.style.zoom='120%';" onmouseout="this.style.zoom='120%';this.style.zoom='100%';" src="./includes/img/class/<?php echo $c['class_id']; ?>.png" width='50' height='50'></td>
				 <td><a title = "<?php echo $c['class_description'];?>"style='text-decoration:none;color:black;'href="book_class_admin.php?id=<?php echo $c['class_id'];?>"><?php echo $c['class_name'];?></a></td>
			 </tr>
			 <?php endforeach; ?>
		</table>
		</div>
	<?php if(empty($_POST['submit']) && empty($id)):?>

<h2 style="margin-left:280px;margin-top:100px;margin-bottom:0px;">Book Reservation Request Status ( <?php echo $num;?> books were requested to be loaned )</h2>
	<div style="margin-left:280px;margin-top:0px;height:370px;width:820px;">

		<hr/>
	<table class="altrowstable">
	<?php foreach($results as $req):?>
	<tr class="buk">
		<td><?php echo $req['firstname'];?> <?php echo $req['lastname'];?></td>
		<td><?php echo $req['date_requested'];?></td>
		<td><?php echo $req['book_title'];?></td>
		<td><a title = "click to approve reservetion" style ="text-decoration:none;" href = "approve.php?id =<?php echo $req['request_id'];?>">APPROVE</a></td>

	</tr>
	<?php endforeach;?>
	</table>
	<?php endif;?>
</div>


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
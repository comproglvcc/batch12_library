<?php
	session_start();
	$user_id = $_SESSION['id'];
	$student_id = $_SESSION['student_id'];
	@$id = $_GET['id'];
	if(!empty($_GET['id'])){
	if(count(@$_SESSION['cart'])<3 && @!in_array($id, @$_SESSION['cart'])){
	$_SESSION['cart'][] = $id;
	}
	}

	mysql_connect('localhost', 'root');
	mysql_select_db('library_2012');
	
	if(isset($_POST['reserve'])){
		
		foreach($_SESSION['cart'] as $i){
		$query = "insert into requests(student_id_num, book_id, date_requested, state)
					values('{$_SESSION['student_id']}', '{$i}', curdate(), '')";

		$reserve= mysql_query($query);

		}
				if($reserve){
					$warn = "<span style='margin-top:80px;position:relative;width:500px;height:50px;background:E6DE4E;border:4px solid yellow;float:center;padding:20px;'><i>You have successfully reserved books</i></span>";
				}else{
					echo "Failed to reserve";
				}
	
	}
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
	$sql = "select * from requests where student_id_num='{$student_id}'";
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
	if(!empty($_SESSION['cart'])){
		foreach($_SESSION['cart'] as $i){
		
			$sql = "select * from books where book_id = {$i}";
			$res = mysql_query($sql);
			while(@$tmp = mysql_fetch_assoc($res)){
				$arr[] = $tmp; 
			}
		}
	}

  include "./utils/SearchUtils.php";
          if(isset($_POST['search'])){
               $key = $_REQUEST['key'];
               $field = $_REQUEST['field'];
               $result = SearchUtils::searchOnBook($key, $field);
			   $num_result = SearchUtils::countSearch($key, $field);
          }else{
				if(!empty($_GET['key']) || !empty($_GET['field'])){
				$key = $_GET['key'];
               $field = $_GET['field'];
               $result = SearchUtils::searchOnBook($key, $field);
			   $num_result = SearchUtils::countSearch($key, $field);
				}else{
			   $result = SearchUtils::searchOnBook();
			   $num_result = SearchUtils::countSearch();
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
<title>Request Records of <?php echo $name;?></title>
<?php
	  function de_color($name){
		$find = @$_POST['key'];
		$rep= "<b style = 'background-color:CCFFFF'>$find</b>";
		$newphrase = str_replace($find, $rep,$name);
		echo $newphrase;
		echo "<br>"; 
	}
?>

</head>
<body>
<h2 style='padding:10px;background:99CCFF;'>Welcome To LVCC Library Management System <?php echo $name;?>, You are currently log in as member.
<a style= "color:red;"href="logout.php" title='Click to LOG OUT on SYSTEM'>Log Out</a>
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
            <input type = 'submit' name = 'search' value = 'submit'/>

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
				 <td><a title = "<?php echo $c['class_description'];?>"style='text-decoration:none;color:black;'href="book_class.php?id=<?php echo $c['class_id'];?>"><?php echo $c['class_name'];?></a></td>
			 </tr>
			 <?php endforeach; ?>
		</table>
		</div>

               <div id="pager" class="container" style="clear:right;">
				<div style='margin-left:10px;'>
				<h2>Book Search Result : </h2>
				<?php if(isset($_POST['key'])):?>
				<?php	
										if($num_result>0){
										echo "<span ><i>Searching for any matches of <b>". @$_POST['key'] .":</b> </i><br>";
										echo "<h2>" .$num_result. "  record/s found</h2>";
										}else{
										echo "<span ><i>Searching for any matches of <b>". @$_POST['key'] .":</b> </i><br>";
										echo "<h2>no record found</h2>";
										}
										?></span>
				<?php else:?>
						<span ><i>Total Book Record</i><br>

						<h2><?php echo $num_result;?> record/s</h2>
				<?php endif;?>
				
				</div>
				<div class="page_navigation" ></div>
				
				<ul class="content">
				<table>
				<?php foreach($result as $key): ?>
				<p><span><div style='clear:right;width:60px;margin-bottom:10px;'><img src="./images/img/<?php echo $key['book_id'];?>.gif" width ='50' height='80'/></div>
				<div style='margin-top:-80px;clear:left;border-bottom:1px dashed 6699FF;margin-left:60px;font-size:15px;text-decoration:none;color:black;font-style:normal;'><a title="click to view details" style = href='accepted.php?id=<?php echo $key['book_id'];?>'>
						<b><?php de_color($key['book_title']); ?></b></div><div style='margin-left:60px;clear:left;'><b>Author :</b> <?php echo $key['au_firstname'];?> <?php echo $key['au_lastname'];?></div>
						<div style='margin-left:60px;clear:left;'><b style="color:green;"><?php echo $key['remaining_stock'];?></b> Available Stock/s</div>
						<div style='height:25px;margin-left:60px;margin-bottom:10px;clear:left;'><a  class="button_detail" title="click to view details" href='sendrequest.php?id=<?php echo $key['book_id'];?>'>DETAILS</a>
																					<a class = "button_request" title="click request for new loan" href='<?php echo $_SERVER['PHP_SELF'];?>?id=<?php echo $key['book_id'];?>'>ADD TO CART</a></div></span></p>				
				</div>
				<?php endforeach; ?>
			
                                </table>
				</ul>
				</div>
				

				<div style="float:left;margin-left:600px;margin-top:-420px;width:500px;height:100px;">
					<?php if(empty($reserve)):?>
					<h2 align = 'center'>Book Cart</h2>
					<hr>
					<table style = "width:400px;">
					<?php if(!empty($_SESSION['cart'])):?> 
				    <?php foreach($arr as $ar):?>
				   	<tr class='buk'>
				    <td style = "padding-left:10px;">	
					<?php echo $ar['book_title'];?></td><td align ="center"><a onclick = "return confirm('Do you really want to remove this book on CART?')" class="button_detail" style='margin-top:-80px;border:1pxsolid 6699FF;font-size:9px;text-decoration:none;color:black;font-style:normal; height:15px;margin-left:0px;margin-bottom:10px;clear:left;' href = "remove.php?id=<?php echo $ar['book_id'];?>">REMOVE</a></td>
					</tr>
					<?php endforeach;?>
					<?php else:?>
						<i>Add Book On Cart Maximum of 3 items only</i>
					<?php endif;?>
					
					

					</table>
					<hr>
					<form action = "<?php echo $_SERVER['PHP_SELF'];?>" method = "post">
					<?php if(!empty($_SESSION['cart'])):?> 
					<input type="submit" value = "SUBMIT BOOK RESERVATION" name = "reserve" onclick = "return confirm('Submit a reservation request for these books on CART?')"/>
					<?php endif;?>
					</form>		
					<?php endif;?>

					<?php
					if(@$reserve){
						echo @$warn;
						unset($_SESSION['cart']);
						}
					?>
				</div>
				
					</div>

					

</body>
</html>
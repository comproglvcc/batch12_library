<?php
	@$id = $_GET['id'];
	session_start();
	$user_id = $_SESSION['id'];
	@$email_user = "eunice@yahoo.com";
	@$student_id = "CP001";
	@$user_name = "eunice orozco";
	mysql_connect('localhost', 'root');
	mysql_select_db('library_2012');
	if(empty($_POST['submit'])){
	$sql1 = "select * from books b join book_status bs on(b.book_id = bs.book_id) 
	join authors a on(a.author_id=b.author_id) 
	join classification c on(c.class_id=b.classification_id)where bs.book_id ={$id}";
	$res1 = mysql_query($sql1);
	
	$resulta = array();
	while($r = mysql_fetch_assoc($res1)){
		$resulta[] =$r; 
	}
	foreach($resulta as $key){
	$book_id = $key['book_id'];
		$title = $key['book_title'];
		$class = $key['class_name'];
		$class_code = $key['class_code'];
		$copy = $key['copyright'];
		$au_lname = $key['au_lastname'];
		$au_fname = $key['au_firstname'];
		$birth = $key['date_birth'];
		$death = $key['date_death'];
		$au_desc = $key['au_description'];
		$stock = $key['remaining_stock'];
		$status = $key['status'];
		$pub = $key['publisher'];
	}
	}
	$date = date("Y")."-".date("m")."-".date("d");
	if(isset($_POST['request'])){
	$student_name = $_SESSION['firstname']. " ". $_SESSION['lastname'];
	$student_id = $_SESSION['student_id'];
	$email = $_SESSION['email'];
	
	if($stock>0){
				$query = "insert into requests(student_id_num, book_title, date_requested, student_email, student_name)
				values('{$student_id}',
				'{$title}',
				'{$date}',
				'{$email}',
				'{$student_name}')";
				$request = mysql_query($query);
				echo $query;

	 }else{
			$warning= "<span style='margin-top:90px;margin-left:-380px;float:center;border:solid red;background:pink;width:500px;'><i> Unable to process your request. This item is out of Stock</i></span>";	
	}

			if(@$request){
				$warning =  "<span style='margin:20px;padding:10px;float:right;border:solid blue;background:pink;width:490px;'><i><img src='checked.gif'/> You have sent your request successfully </i></span>";
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
		$find = $_POST['key'];
		$rep= "<b style = 'background-color:CCFFFF'>$find</b>";
		$newphrase = str_replace($find, $rep,$name);
		echo $newphrase;
		echo "<br>"; 
	}
?>

</head>

<body>
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
				 <td><a title = "<?php echo $c['class_description'];?>"style='text-decoration:none;color:black;'href="book_class.php?id=<?php echo $c['class_id'];?>"><?php echo $c['class_name'];?></a></td>
			 </tr>
			 <?php endforeach; ?>
		</table>
		</div>				<?php echo @$warning;?>
		<?php if(empty($_POST['submit'])):?>
		<div id="book_detail">

		<div><img style="width:200px;height:300px;padding:20px;"src='./images/img/<?php echo $book_id;?>.gif'></div>

	<table style="margin-left:250px;float:left;clear:left;margin-top:-300px;"> 
		<?php if(!empty($result)):?>
		<tr>
			<td colspan='2' style="padding:10px;"><h2 style="background:CCCCFF;padding:10px;"><?php echo $title;?></h2></td>
		</tr>
		<tr>
			<td valign='top'><b>Classification: </b></td>
			<td><?php echo $class_code;?><br/><i><?php echo $class ;?></i></td>
		</tr>
		<tr>
			<td><b>Copyright: </b></td>
			<td><?php echo $copy;?></td>
		</tr>
		<tr>
			<td><b>Publisher: </b></td>
			<td><?php echo $pub;?></td>
		</tr>
		<tr>
		<td colspan='2'>
			<table>
			<tr>
			<td valign='top' colspan='2' align='center' style="padding:10px;"><b>AUTHOR </b></td>
			</tr>
			<tr>
			<td><img src='./images/img/unknown.gif'/ width='100px' height='100px'></td>

			<td style="padding:15px;"><b>Name : </b><?php echo $au_fname ," ", $au_lname ;?><br>
				<b>Birth : </b><?php echo $birth;?><br>
				<b>Death : </b><?php echo $death;?><br>
				<b>Description : </b><br><?php echo $au_desc;?><br>				
			</td>
			</tr>
			</table>
		</td>
		</tr>
		<tr>
			<td><b>Synopsis: </b></td>
			<td></td>
		</tr>
		<tr>
			<td><b>Available Stocks: </b></td>
			<td><?php echo $stock;?></td>
		</tr>		
		<tr>
			<td><b>Status: </b></td>
			<td><?php echo $status;?></td>
		</tr>
		<tr>
			<form action="<?php $_SERVER['PHP_SELF'];?>" method='post'>
			<td colspan='2' align='right'><input type='submit' name='request' id='request' value="Send Request" onclick="return confirm('Do you want to send a request to the admin to lend you this book?')"/></td>
			</form>
		</tr>
	</table>
	<?php endif;?>
	<?php
	if(empty($result)){
	echo "<h1>No stock available<h1>";
	}
	?>
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
	
	
	
<html>
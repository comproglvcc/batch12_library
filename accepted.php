<?php
	session_start();
	$user_id = $_SESSION['id'];
	$student_id = $_SESSION['student_id'];
	@$id = $_REQUEST['id'];

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
	join books b on(b.book_id = r.book_id)where student_id_num='{$student_id}'";
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
               $key = $_POST['key'];
               $field = $_POST['field'];
			   header("location:searchfile.php?key={$key}&field={$field}");

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
				<h2 style="margin-left:280px;margin-top:100px;margin-bottom:0px;">Book Reservation Request Status</h2>
	<div style="margin-left:280px;margin-top:0px;height:370px;width:820px;">

		<hr/>
	<table class="altrowstable" >

	<?php foreach($results as $req):?>
	<tr class="buk">
		<td><?php echo $req['book_title'];?></td>
		<td><?php echo $req['date_requested'];?></td>
		<?php if($req['state']=='accepted'){
					echo "<td style='color:green; text-align:center;'><img style ='width:25px;height:25px;' src = '../includes/img/ok.png'>".$req['state']."</td>";
		}else{
					echo "<td style='color:#29088A; text-align:center;'>deffered</td>";	
		}
		?>
	</tr>
	<?php endforeach;?>
	</table>
	</div>



					</div>

					

</body>
</html>
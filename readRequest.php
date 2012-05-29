<?php

	session_start();
	@$id = $_REQUEST['id'];
	@$email_user = "eunice@yahoo.com";
	@$student_id = "CP001";
	@$user_name = "eunice orozco";
	mysql_connect('localhost', 'root');
	mysql_select_db('library_2012');
	$sql = "select * from requests where state !='accepted'";
	$res = mysql_query($sql);
		$result = array();
	while($r = mysql_fetch_assoc($res)){
		$result[] =$r; 
	}
	$query = "update requests set state='accepted' where request_id = {$id} ";
	$qry = "select * from requests where request_id={$id}";
	$result_update = mysql_query($query);
	$q = mysql_query($qry);
			$res_qry = array();
	while(@$r = mysql_fetch_assoc($q)){
		$res_qry[] =$r; 
	}
	foreach($res_qry as $fyi){
	$name = $fyi['student_name'];
	$b_title = $fyi['book_title'];
	}
	if($result_update===TRUE){
		echo "<span style='border:solid blue;background:pink;width:500px;'><i> The request of". $name ." is accepted.</i></span>";	
			$sql = "select * from requests where state !='accepted'";
			$res = mysql_query($sql);
			$result = array();
			while($r = mysql_fetch_assoc($res)){
				$result[] =$r; 
		}
	}
	$subject = "LVCC Library Confirmation";
	$message = "Your request has been accepted. Please see the LVCC Librarian for more information";
	if(@mail(@$email_user, $subject, $message)){
	
			echo "<span style='border:solid blue;background:pink;width:500px;'><i> The Customer is now confirmed of the current request.</i></span>";	
	
	}
?>

<html>
<head>
         <link type="text/css" rel="stylesheet" href="css/styles.css" />
        	<script type="text/javascript" src="js/jquery.min.js"></script>
        	<script type="text/javascript" src="js/jquery.pajinate.js"></script>
</head>

	<div id="navigation">
		<ul>
			<li><a href=#>Fines</a></li>
			<li><a href=#>Loans</a></li>
			<li><a href=#>Current Loans</a></li>
			<li><a href=#>Loan History</a></li>
			<li><a href=#>Request</a></li>

		</ul>
	</div>
	<div id = "content">
	<table id= "table-content">
	<tr style="background:pink; text-align:center;border:solid blue;">
		<td>Student ID Number</td>
		<td>Student Name</td>
		<td>Book Title</td>		
	</tr>
	<?php foreach($result as $key):?>
	<tr>
		<td><?php echo $key['student_id_num'];?></td>
		<td><?php echo $key['student_name'];?></td>
		<td><?php echo $key['book_title'];?></td>
		<td><a href='readRequest.php?id=<?php echo $key['request_id'];?>'><input type='submit' name='accept' id='accept' value="ACCEPT" onclick="return confirm('Do you really want to accept this request?')"/></td>
	</tr>
	<?php endforeach;?>
	</table>
	</div>
                <script>
			$(document).ready(function(){
				$('tr:odd, .content > *:odd').css('background-color','#FFD9BF');
			});
		</script>
</html>
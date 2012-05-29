<?php
session_start();
	if (@$_SESSION['user']=='admin'){
include "../utils/BorrowerUtils.php";
$id = $_GET['id'];
$get = BorrowerUtils::eachBorrower($id);

if (!empty($_POST)){
	$snumber=$_POST['snumber'];
	$fname=$_POST['firstname'];
	$lname=$_POST['lastname'];
	$course=$_POST['course'];
	$address=$_POST['address'];
	$contact=$_POST['number'];
	$result = BorrowerUtils::editBorrower($id, $snumber,$fname,$lname,$course,$address,$contact);
		if ($result){
			echo "Succesfully modified ". $fname . " " . $lname;
		} else {
			echo "Something wrong";

		}

} 
} else {
	 header("location:../admin/admin_restriction.php");
	 }

?>

?>
<html>
<head>
<script>

	function check_snumber(){
	bnumber=document.getElementById("snumber").value;
		if (bnumber.length == 0){	
			return false;
		}else{
			return true;
		}
	}
	
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
	
	function check_address(){
	address=document.getElementById("address").value;
		if (address.length == 0){
			return false;
		}else{
			return true;
		}
	}
	function check_contact(){
	contact=document.getElementById("contact").value;
		if (contact.length == 0){
			return false;
		}else{
			return true;
		}
	}
	
	
	
	function validate_editStudent(){
		if(check_snumber() && check_firstname() && check_lastname() && check_address()
			&& check_contact()){
			return true;
		}else{
			alert("Complete all the data needed!");
			return false;
		}
	}


</script>


<script type="text/javascript">
function altRows(id){
	if(document.getElementsByTagName){  
		
		var table = document.getElementById(id);  
		var rows = table.getElementsByTagName("tr"); 
		 
		for(i = 0; i < rows.length; i++){          
			if(i % 2 == 0){
				rows[i].className = "evenrowcolor";
			}else{
				rows[i].className = "oddrowcolor";
			}      
		}
	}
}

window.onload=function(){
	altRows('alternatecolor');
}
</script>

<link rel="stylesheet" href="../includes/css/try.css" type="text/css" media="screen">
<link rel="stylesheet" href="../includes/css/layout.css" type="text/css" media="screen">
</head>
<div id="background">

	
	
<div id="container">

	<div id="header">
	<img src="../includes/img/logo1.png" width='330' height='150'>	
		<div id="navigation">
		<ul>
			<li id="logout"><a href="logout.php"><img src="../includes/img/nav_icons/logout.png" width='30' height='30'>Log Out</a></li>
			<li id="inventory"><a href="#"><img src="../includes/img/nav_icons/inventory.png" width='30' height='30'>Inventory</a></li>
			<li id="update"><a href="login.php"><img src="../includes/img/nav_icons/.png"width='30' height='30'>Updates</a></li>
			<li id="home"><a href="login.php"><img src="../includes/img/nav_icons/home.png"width='30' height='30'>Home</a></li>
		</ul>
		</div>
	</div>

	<div id="content-container">
	
	<div id = "contentC">
	<p style="font-family: 'Impact', Helvetica, Arial, sans-serif;
	font-size: 30px; font-weight: normal;
	text-align: center;
	text-shadow: black 3px 3px 3px;
	color:white; background:#ccc;">Update Borrower Record</p>

	<form action="<?php $_SERVER['PHP_SELF']; ?>" method='POST'>
	<table class="altrowstable" id="alternatecolor" style="margin-top:0px; margin-left:15px;padding:-10px; height:200px;">
				<?php foreach($get as $row):?>
	<tr>
		<td class='first' >Student Number: </td>
		<td> <input type='text' name='snumber' id='snumber' size='30'onblur='check_snumber()'value="<?php echo $row['student_id'];?>"></td>
	</tr>
	<tr>
		<td class='first'>First Name: </td>
		<td> <input type='text' name='firstname' id='firstname' size='35'onblur='check_firstname()' value="<?php echo $row['firstname'];?>"></td>
		<td class='first'>Last Name: </td>
		<td> <input type='text' name='lastname' id='lastname' size='35'onblur='check_lastname()' value="<?php echo $row['lastname'];?>"></td>
		
	</tr>
	
	
	<tr>
		<td class='first'>Year & Course: </td>
		<td><select name ="course">
		<?php $course = array(' Select Year & Course',
							'1st Year - International Cookery',
							'1st Year - Nursing Assistant',
							'2nd Year - Nursing Assistant',
							'1st Year - Computer Programming',
							'2nd Year - Computer Programming',
							'1st Year - Mass Communication Tech',
							'2nd Year - Mass Communication Tech',
							'1st Year - Office Management',
							'2nd Year - Office Manaement',
							'1st Year - AB Broadcasting',
							'2nd Year - AB Broadcasting',
							'3rd Year - AB Broadcasting',
							'4th Year - AB Broadcasting');
		?>
		<?php for($i=0;$i<14;$i++): ?>
		<option value='<?php echo $course[$i]; ?>'><?php echo $course[$i]; ?></option>
		<?php endfor; ?>
		</select>
	</td>
	
	</tr>
	
	<tr>
		<td class='first' valign='top'>Address: </td>
		<td colspan='2' > <textarea name='address' id='address' rows='2' cols='60' onblur='check_address()'><?php echo $row['address'];?></textarea></td>
		</td>
		
	</tr>
	
	<tr>
		<td class='first'>Contact Number: </td>
		<td> <input type='text' name='number' id='contact' size='30'onblur='check_contact()' value="<?php echo $row['contact'];?>"></td>
		
	</tr>
	
	<tr>
	
		<td colspan='4'align='center'><input type='submit' name='submit' value= "Save Changes" onclick ="return validate_editStudent()" /></td>
	</tr>	
	<?php endforeach; ?>
</table>
</form>
	<div id="navigation2BG">
		<div id="navigation2">
			<table align='center'>
				<tr>
				<td><a title='payments' href="../payment/readPayment.php"><img src="../includes/img/nav_icons/payment.png" width='80' height='80' onmouseover="this.style.zoom='200%';this.style.zoom='200%';" onmouseout="this.style.zoom='100%';this.style.zoom='100%';"></a></td>
				<td><a title='author' href="../authors/getAuthors.php"><img src="../includes/img/nav_icons/author.png" width='80' height='80' onmouseover="this.style.zoom='200%';this.style.zoom='200%';" onmouseout="this.style.zoom='100%';this.style.zoom='100%';"></a></td>
				<td><a title='penalties' href="../penalty/readPenalty.php"><img src="../includes/img/nav_icons/safe.png" width='80' height='80' onmouseover="this.style.zoom='200%';this.style.zoom='200%';" onmouseout="this.style.zoom='100%';this.style.zoom='100%';"></a></td>
				<td><a title='borrowers' href="../borrowers/getBorrowers.php"><img src="../includes/img/nav_icons/borrower.png" width='80' height='80' onmouseover="this.style.zoom='200%';this.style.zoom='200%';" onmouseout="this.style.zoom='100%';this.style.zoom='100%';"></a></td>
				<td><a title='transaction' href="../transaction/readTransaction.php"><img src="../includes/img/nav_icons/transaction.png" width='80' height='80' onmouseover="this.style.zoom='200%';this.style.zoom='200%';" onmouseout="this.style.zoom='100%';this.style.zoom='100%';"></a></td>
				<td><a title='classification' href="../classification/getClass.php"><img src="../includes/img/nav_icons/classification.png" width='80' height='80' onmouseover="this.style.zoom='200%';this.style.zoom='200%';" onmouseout="this.style.zoom='100%';this.style.zoom='100%';"></a></td>
				<td><a title='books' href="../books/addBook.php"><img src="../includes/img/nav_icons/books.png" width='80' height='80' onmouseover="this.style.zoom='200%';this.style.zoom='200%';" onmouseout="this.style.zoom='100%';this.style.zoom='100%';"></a></td>		
				</tr>
			</table>
		</div>
	</div>
	</div>
	</div>
</div>
</html>

<?php	
session_start();
	if (@$_SESSION['user']=='admin'){
include "../utils/AuthorUtils.php";
$id = $_GET['id'];
$result = AuthorUtils::eachAuthor($id);


if (!empty($_POST)){
			
			$firstname= strip_tags($_POST['firstname']);
			$lastname = strip_tags($_POST['lastname']);
			$birth = $_POST['bmonth']." / ".$_POST['bday']." / ".$_POST['byear'];
			$death = $_POST['dmonth']." / ".$_POST['dday']." / ".$_POST['dyear'];
			$description = strip_tags($_POST['description']);
			$results = AuthorUtils::editAuthor($id, $firstname, $lastname, $birth, $death, $description);
					if ($results === TRUE){
					echo "<i>Successfully modified ". $firstname . " ". $lastname ."</i>";
			
				} else{
						echo " <i>Sorry something went wrong!</i>";	
				}
				
		
}
} else {
	 header("location:../admin/admin_restriction.php");
	 }


?>
<html>
<head>

<script>


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
	

	
	
	function validate_editAuthor(){
		if( check_firstname() && check_lastname()){
			return true;
		}else{
			alert("First name and the last name of the author required!");
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
	color:white; background:#ccc;">Update Author Record</p>
	
<form action="<?php $_SERVER['PHP_SELF']; ?>" method='POST'>
<div style="margin-top:2px;">
<table style="margin-top:-10px; margin-left:50px;margin-bottom:80px;" class="altrowstable" id="alternatecolor">
	<?php foreach($result as $auth): ?>
	<tr>
		<td class='first'>First Name: </td>
		<td> <input type='text' name='firstname' id='firstname' size='40'onblur='check_firstname()' value="<?php echo $auth['firstname'];?>"></td>
		<td class='first'>Last Name: </td>
		<td> <input type='text' name='lastname' id='lastname' size='40'onblur='check_lastname()' value="<?php echo $auth['lastname'];?>"></td>
		
	</tr>
	
	
	<tr>
		<td class='first'>Date of Birth: </td>
		<td>
		<i> If its <font color='red'>unknown</font>, use this   "<font color='red'>- -</font>" </i><br/><br/>
		<option value='mm'> - - </option>
		<select name ="bmonth">
		<?php $months = array(' - - ',
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
		<?php for($m=0;$m<13;$m++): ?>
		<option value='<?php echo $months[$m]; ?>'><?php echo $months[$m]; ?></option>
		<?php endfor; ?>
		</select>
		
		<select name='bday'>
		<option value='dd'> - - </option>
		<?php for($d=1; $d<32; $d++): ?>
		<option value='<?php echo $d; ?>'><?php echo $d; ?></option>
		<?php endfor; ?><br/>
		</select>
		
		
		<select name='byear'>
		<option value='yyyy'> - - - - </option>
		<?php for($y=2012; $y>=1960; $y--): ?>
		<option value='<?php echo $y; ?>'><?php echo $y; ?></option>
		<?php endfor; ?>
		</select>
	</td>
	
		<td class='first'>Date of Death: </td>
		<td colspan='2'>
		<i> If its <font color='red'>unknown</font>, use this   "<font color='red'>- -</font>" </i><br/><br/>
		<option value='mm'> - - </option>
		<select name ="dmonth">
		<?php $months = array('- -',
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
		<?php for($m=0;$m<13;$m++): ?>
		<option value='<?php echo $months[$m]; ?>'><?php echo $months[$m]; ?></option>
		<?php endfor; ?>
		</select>
		
		<select name='dday'>
		<option value='dd'> - - </option>
		<?php for($d=1; $d<32; $d++): ?>
		<option value='<?php echo $d; ?>'><?php echo $d; ?></option>
		<?php endfor; ?><br/>
		</select>
		
		
		<select name='dyear'>
		<option value="yyyy"> - - - - </option>
		<?php for($y=2012; $y>=1960; $y--): ?>
		<option value='<?php echo $y; ?>'><?php echo $y; ?></option>
		<?php endfor; ?>
		</select>
	
	</td>
	
	<tr>
		<td class='first'> Description: </td>
		<td colspan='3'> <textarea name='description' cols='80' rows='3'><?php echo $auth['description'];?></textarea> </td>
	</tr>
	
	<tr>
		<td colspan='4'align='center'><input type='submit' name='submit' value= "Save Changes" onclick ="return validate_editAuthor()" /></td>
	</tr>	

	<?php endforeach; ?>
</table>
</form>
	<div id="navigation2BG">
		<div id="navigation2">
			<table align='center'>
				<tr>
				<td><a title='payments' href="../payment/readPayment.php"><img src="../includes/img/nav_icons/payment.png" width='80' height='80' onmouseover="this.style.zoom='150%';this.style.zoom='150%';" onmouseout="this.style.zoom='100%';this.style.zoom='100%';"></a></td>
				<td><a title='author' href="../authors/getAuthors.php"><img src="../includes/img/nav_icons/author.png" width='80' height='80' onmouseover="this.style.zoom='150%';this.style.zoom='150%';" onmouseout="this.style.zoom='100%';this.style.zoom='100%';"></a></td>
				<td><a title='penalties' href="../penalty/readPenalty.php"><img src="../includes/img/nav_icons/safe.png" width='80' height='80' onmouseover="this.style.zoom='150%';this.style.zoom='150%';" onmouseout="this.style.zoom='100%';this.style.zoom='100%';"></a></td>
				<td><a title='borrowers' href="../borrowers/getBorrowers.php"><img src="../includes/img/nav_icons/borrower.png" width='80' height='80' onmouseover="this.style.zoom='150%';this.style.zoom='150%';" onmouseout="this.style.zoom='100%';this.style.zoom='100%';"></a></td>
				<td><a title='transaction' href="../transaction/readTransaction.php"><img src="../includes/img/nav_icons/transaction.png" width='80' height='80' onmouseover="this.style.zoom='150%';this.style.zoom='150%';" onmouseout="this.style.zoom='100%';this.style.zoom='100%';"></a></td>
				<td><a title='classification' href="../classification/getClass.php"><img src="../includes/img/nav_icons/classification.png" width='80' height='80' onmouseover="this.style.zoom='150%';this.style.zoom='150%';" onmouseout="this.style.zoom='100%';this.style.zoom='100%';"></a></td>
				<td><a title='books' href="../books/readBooks.php"><img src="../includes/img/nav_icons/books.png" width='80' height='80' onmouseover="this.style.zoom='150%';this.style.zoom='150%';" onmouseout="this.style.zoom='100%';this.style.zoom='100%';"></a></td>		
				</tr>
			</table>
		</div>	
	</div>
</div>


	</div>
	</div>
</div>
</html>

<?php
session_start();
include "./utils/UserUtils.php";

if(!empty($_POST['login'])){
	$username = strip_tags($_POST['username']);
	$password = sha1($_POST['password']);

	$result = UserUtils::login($username, $password);

	if ($result === FALSE){
		$warning= "<span style='margin:30px; background:pink; border:solid red;padding:5px;font-style:italic;font-family:Times New Roman;' ><img style='width:20px;height:20px;' src='./includes/img/res.png'/>  Log in failed Invalid password</span>";
	}else if(count($result)==1){
		$warning= "<span style='margin:30px; background:pink; border:solid red;padding:5px;font-style:italic;font-family:Times New Roman;' ><img style='width:20px;height:20px;' src='./includes/img/res.png'/>  Log in failed Username doesnt exist</span>";
	}else{
			$_SESSION = $result;
			if ($_SESSION['level']=='admin'){
				header("location:admin_main.php");
			} else if ($_SESSION['level']=='student'){
				header("location:accepted.php");
			}
	
	}
	
}

if (isset($_POST['submit'])){
	$snumber = strip_tags($_POST['snumber']);
	$fname = strip_tags($_POST['fname']);
	$lname = strip_tags($_POST['lname']);
	$username = strip_tags($_POST['uname']);
	$email = strip_tags($_POST['email']);
	$password  = sha1($_POST['pass1']);
	$course = $_POST['course'];
	$address = strip_tags($_POST['address']); 
	$contact = strip_tags($_POST['contact']);
	$level = "student";
	
		$result=UserUtils::check_ifexist($snumber);
		if($result===FALSE){
			$result = UserUtils::addUser($snumber, $fname, $lname, $username, $email, $password,
									$course, $address, $contact, $level);
				if ($result === TRUE){
					$confirmation = "Your are successfully registered to our system. Log in now!";
			}else{
				$confirmation = "Sorry something went wrong with your registration";		
			}
		}else{
			foreach($result as $user){
				$db_snumber = $user['student_id'];
				$db_email = $user['email'];
			}
			$confirmation = "FAILED TO REGISTER! <br/>Student <b>$db_snumber</b> <br/>with email <i>$db_email</i> already registered!" ;
		}
	}


?>
<html>

<head>
         <link type="text/css" rel="stylesheet" href="./includes/css/css/styles.css" />
		 <link type="text/css" rel="stylesheet" href="./includes/css/class_table.css" />
			<script type="text/javascript" src="./includes/css/js/jquery.min.js"></script>
        	<script type="text/javascript" src="./includes/css/js/jquery.pajinate.js"></script>	

<script>
function check_snumber(){
	num=document.getElementById("snumber").value;
		if (num.length == 0){
			document.getElementById("help_snumber").innerHTML="<img src='./includes/img/res.png'' height='20' title='Do not leave this field empty'>";	
			return false;
		}else{
			document.getElementById("help_snumber").innerHTML="<img src='./includes/img/ok.png' height='20'>";
			return true;
		}
	}
	
	function check_fname(){
	fname=document.getElementById("fname").value;
		if (fname.length == 0){
			document.getElementById("help_fname").innerHTML="<img src='./includes/img/res.png'' height='20' title='Do not leave this field empty'>";	
			return false;
		}else{
			document.getElementById("help_fname").innerHTML="<img src='./includes/img/ok.png' height='20'>";
			return true;
		}
	}
	
	

	function check_lname(){
	lname=document.getElementById("lname").value;
		if (lname.length == 0){
			document.getElementById("help_lname").innerHTML="<img src='./includes/img/res.png' height='20' title='Do not leave this field empty'>";	
			return false;
		}else{
			document.getElementById("help_lname").innerHTML="<img src='./includes/img/ok.png' height='20'>";
			return true;
		}
	}
	
	function check_uname(){
	user = document.getElementById("uname").value;
		if (user.length == 0){
			document.getElementById("help_uname").innerHTML = "<img src='./includes/img/res.png'' height='20' title='Do not leave this field empty'>";
		return false;		
		}else{
		document.getElementById("help_uname").innerHTML="<img src='./includes/img/ok.png' height='20'>";
		return true;
		}
	}

	
	function check_email(){
	em=document.getElementById("email").value;
	at=em.indexOf('@');
	dot=em.indexOf('.');
		if (at < 0 && dot < 0){
			document.getElementById("help_email").innerHTML="<img src='./includes/img/warn.png'' height='20' title='Email should have @ and .'>";	
			return false;
		}else{
			document.getElementById("help_email").innerHTML="<img src='./includes/img/ok.png' height='20'>";
			return true;
		}
	}

	
	
	function check_pass1(){
	pass1 = document.getElementById("pass1").value;
		if (pass1.length <= 5  ){
			document.getElementById("help_pass1").innerHTML = "<img src='./includes/img/warn.png'' height='20' title='Password should atleast 6 characters'>";
		return false;		
		}else{
		document.getElementById("help_pass1").innerHTML="<img src='./includes/img/ok.png'' height='20'>";
		return true;
		}
	}
	
	function check_pass2(){
	pass1 = document.getElementById("pass1").value;
	pass2 = document.getElementById("pass2").value;	
		if (pass1 !==pass2){
				alert ("Password didn't match");
		return false;	
		} else {
		document.getElementById("help_pass2").innerHTML="<img src='./includes/img/ok.png' height='20'>";
		return true;
		}
	}
	

	
	function check_contact(){
	contact=document.getElementById("contact").value;
		if (contact.length == 0){
			document.getElementById("help_contact").innerHTML="<img src='./includes/img/res.png' height='20' title='Do not leave this field empty'>";	
			return false;
		}else{
			document.getElementById("help_contact").innerHTML="<img src='./includes/img/ok.png' height='20'>";
			return true;
		}
	}
	

	function validate_reg(){
		if(check_snumber() && check_fname() && check_uname() && 
			check_lname() && check_contact() && 
			check_email() && check_pass1() && check_pass2()){
			return true;
		}else{
			alert("Data MUST be Complete!");
			return false;
		}
	}			
 </script>
</head>
<body>
	<div id="header">
	LVLib<img style = "width:100px; height:25px;margin-bottom:-10px;margin-left:-10px;"src='./includes/img/buk.gif'/>
	<p class='logo'>La Verdad Christian College Library System</p>
	</div>
<div id = "bodyback">
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method='post'>
<p style='padding:10px;background:99CCFF;text-align:right;font-family:Tahoma;font-size:15px;'>
<?php echo @$warning; ?>
Username : <input type='text' size='10' name='username' />
Password : <input type='password' size='10' name='password' />
<input type='submit' name='login' value='Log In'>
</p>
<form>

	<div id="registration">
	<img title="Student Registration" style="margin-left:50px;margin-top:-15px;float:left;width:100px;height:90px;"src="./includes/img/borrower.png"><p class="register">Not yet a member?<br>Register here</p>
	<form action="<?php $_SERVER['PHP_SELF']; ?>" method='POST'>
<table id= "registration_table">

	<tr>
		<td colspan='3' style='color:white;background:gray; '><?php echo @$confirmation; ?></td>
	</tr>

	<tr>
		<td>Student Number: </td>
		<td><input type='text' name='snumber' id='snumber' size='30' onblur='check_snumber()'  style="border-radius:10px;"></td>
		<td><span id='help_snumber'></span></td> 
	<tr>
		<td>First Name: </td>
		<td><input type='text' name='fname' id='fname' size='30' onblur='check_fname()' style="border-radius:10px;"></td>
		<td><span id='help_fname'></span></td> 
	</tr>
	
	<tr>
		<td>Last Name: </td>
		<td><input type='text' name='lname' id='lname' size='30' onblur='check_lname()' style="border-radius:10px;"></td>
		<td><span id='help_lname'></span></td> 
	</tr>
	
	<tr>
		<td>Username: </td>
		<td><input type='text' name='uname' id='uname' size='30' onblur='check_uname()' style="border-radius:10px;"></td>
		<td><span id='help_uname'></span></td> 
	</tr>
	
	<tr>
		<td>Email Address: </td>
		<td><input type='text' name='email' id='email'  size='30' onblur='check_email()' style="border-radius:10px;"></td>
		<td><span id='help_email'></span></td>
	</tr>
	
	<tr>
		<td>Password: </td>
		<td><input type='password' name='pass1' id='pass1'size='30' onblur='check_pass1()' style="border-radius:10px;"></td>
		<td><span id='help_pass1'></span></td> 
	</tr>
	
	<tr>
		<td>Confirm Password: </td>
		<td><input type='password' name='pass2' id='pass2' size='30' onblur='check_pass2()' style="border-radius:10px;"></td>
		<td><span id='help_pass2'></span></td> 
	</tr>

	<tr>
		<td>Year & Course: </td>
		<td><select name='course'>
		
		<?php $courses=array(0,
							'1st Year	-  International Cookery',
							'1st Year	-  Computer Programming',
							'2nd Year	-  Computer Programming',
							'1st Year	-  Nursing Assistant',
							'2nd Year	-  Nursing Assistant',
							'1st Year	-  Mass Communication',
							'2nd Year	-  Mass Communication',
							'1st Year	-  Office Management',
							'2nd Year	-  Office Management',
							'1st Year	-  AB Broadcasting',
							'2nd Year	-  AB Broadcasting',
							'3rd Year	-  AB Broadcasting',
							'4th Year	-  AB Broadcasting')?>
		<?php for($i=1;$i<14;$i++): ?>
		<option value='<?php echo $courses[$i]; ?>'><?php echo $courses[$i]; ?></option>
		<?php endfor; ?>
		
		</select>
		</td>
		
	<tr>
		<td valign='top'>Address: </td>
		<td><textarea name='address' id='address' onblur='check_address()' cols='23'></textarea></td>
	</tr>
	
	<tr>
		<td>Contact Number: </td>
		<td><input type='text' name='contact' size='30' id='contact' onblur='check_contact()' style="border-radius:10px;"></td>
		<td><span id='help_contact'></span></td>
	</tr>

	</table>
	<hr>
	<table>
	<tr id="buttons">	
		<td align='center'><input type='submit' name='submit' value='REGISTER' onclick="return validate_reg()"></td>		
		<td align='center'><input type='reset' name='reset' value='RESET FIELDS' onclick="return confirm('Are you sure you want to reset all fields?')"></td>
	</tr>
</table>
</form>
	
	</div>
	
</div>
</body>
</html>
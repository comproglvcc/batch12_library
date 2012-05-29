<?php
	include 'ClassificationUtils.php';
	include 'AuthorUtils.php';
	include 'BookUtils.php';
	$class = ClassificationUtils::getClass();
	$author = AuthorUtils::getAuthors();	
	if(isset($_POST['submit'])){
	$access = $_POST['baccess'];
	$name = $_POST['bname'];
	$copyright = $_POST['bcopy'];
	$publisher = $_POST['bpublisher'];
	$page = $_POST['bpage'];
	$author = $_POST['author'];
	$class = $_POST['class'];
	$price = $_POST['bprice'];
	$location = $_POST['blocation'];
	$isExisting = BookUtils::exist($access, $name, $copyright, $publisher, $page, $author, $class, $price, $location);

        if($isExisting){
            @$result = BookUtils::addBook($access, $name, $copyright, $publisher, $page, $author, $class, $price, $location);
	}else{
              echo "<span color='red'>This item is already existing in the database, cannot be saved again.</span>";
 }
        if(@$result=='true'){
            echo "<span color='green'>Successfully saved another item.</span>";
        }
        }

?>

<html>

<head>
<script>
	function check_name(){
	fn = document.getElementById("bname").value;
		if(fn.length == 0){
			document.getElementById("help_name").innerHTML = "Empty Field!";
			return false;
		}else{
				document.getElementById("help_name").innerHTML = "Ok";
		        return true;
		}
	}

        }
	function check_access(){
	fn = document.getElementById("baccess").value;
		if(fn.length == 0){
			document.getElementById("help_access").innerHTML = "Empty Field!";
			return false;
		}else{
				document.getElementById("help_access").innerHTML = "Ok";
		        return true;
		}
	}

        }
	function check_copy(){
	fn = document.getElementById("bcopy").value;
		if(fn.length == 0){
			document.getElementById("help_copy").innerHTML = "Empty Field!";
			return false;
		}else{
				document.getElementById("help_copy").innerHTML = "Ok";
		        return true;
		}
	}

        }
	function check_publisher(){
	fn = document.getElementById("bpublisher").value;
		if(fn.length == 0){
			document.getElementById("help_publisher").innerHTML = "Empty Field!";
			return false;
		}else{
				document.getElementById("help_publisher").innerHTML = "Ok";
		        return true;
		}
	}

        }
	function check_page(){
	fn = document.getElementById("bpage").value;
		if(fn.length == 0){
			document.getElementById("help_page").innerHTML = "Empty Field!";
			return false;
		}else{
				document.getElementById("help_page").innerHTML = "Ok";
		        return true;
		}
	}

        }
	function check_location(){
	fn = document.getElementById("blocation").value;
		if(fn.length == 0){
			document.getElementById("help_location").innerHTML = "Empty Field!";
			return false;
		}else{
				document.getElementById("help_location").innerHTML = "Ok";
		        return true;
		}
	}

        }
	function check_author(){
	fn = document.getElementById("author").value;
		if(fn.length == 0){
			document.getElementById("help_author").innerHTML = "Empty Field!";
			return false;
		}else{
				document.getElementById("help_author").innerHTML = "Ok";
		        return true;
		}
	}

        }
	function check_class(){
	fn = document.getElementById("class").value;
		if(fn.length == 0){
			document.getElementById("help_class").innerHTML = "Empty Field!";
			return false;
		}else{
				document.getElementById("help_class").innerHTML = "Ok";
		        return true;
		}
	}

        }
	function check_price(){
	fn = document.getElementById("baccess").value;
		if(fn.length == 0){
			document.getElementById("help_price").innerHTML = "Empty Field!";
			return false;
		}else{
				document.getElementById("help_price").innerHTML = "Ok";
		        return true;
		}
	}

        }

	</script>
</head>
<form action ="<?php echo $_SERVER['PHP_SELF'];?>" method='post'>
<table border='1'>
<tr><td colspan='2' align = 'center'>Create New Book Record</td></tr>
<tr>
<td>
<table>
<tr>
	<td>Accession Number :</td>
	<td><input type ='text' id='baccess' name='baccess' size='28' onBlur="check_access()"/></br>
        <span id="help_access"></span>
        </td>
</tr>
<tr>
	<td valign='top'>Book Name :</td>
	<td><textarea name='bname' cols='20' row='2'></textarea></br>
        <span id="help_name"></span>
        </td>
</tr>

<tr>
	<td>Copyright :</td>
	<td><input type ='text' id='bcopy' name='bcopy' size='28' onblur="check_copy()"/></br>
        <span id="help_copy"></span>
        </td>
</tr>
<tr>
	<td>Publisher :</td>
	<td><input type ='text' id='bpublisher' name='bpublisher' size='28' onblur="check_publisher()"/></br>
        <span id="help_publisher"></span>
        </td>
</tr>
<tr>
	<td>Number of Pages :</td>
	<td><input type ='text' id='bpage' name='bpage' size='28' onblur="check_page()"/>
        </br>
        <span id="help_page"></span>
        </td>
</tr>
</table>
	</td>

	<td>
<table>
<tr>
	<td valign='top'>Author :</td>
	<td>
	<select name="author" size="3" multiple="multiple">
	<?php foreach($author as $auth):?>
                <option value="<?php echo $auth['id'];?>"><?php echo $auth['lastname'];?> <?php echo $auth['firstname'];?> </option>
	<?php endforeach;?>
	</select>
	<a href=''><br/>
        </br>
        <span id="help_author"></span>
        click to add new author<a>
	</td>
</tr>
<tr>
	<td valign='top'>Classification :</td>
	<td>
	<select name="class" size="4" multiple="multiple">
	<?php foreach($class as $classify):?>
                <option value="<?php echo $classify['id'];?>"><?php echo $classify['class_name'];?></option>
	<?php endforeach;?>
	</select>
	</br>
        <span id="help_class"></span>
	</td>
</tr>
<tr>
	<td>Unit Price :</td>
	<td><input type ='text' id='bprice' name='bprice' size='15' onblur="check_price()"/> Pesos</br>
        <span id="help_price"></span>
        </td>
</tr>
<tr>
	<td>Location :</td>
	<td><input type ='text' id='blocation' name='blocation' size='28' onblur="check_location()"/></br>
        <span id="help_locaion"></span></td>
</tr>

</table>
</td>
</tr>
<tr>
	<td colspan='2' align='center'><input type = 'submit' name='submit' value='submit'/></br><a href='bookread.php'>View Books</a></td>
</tr>
</table>

</form>

</html>

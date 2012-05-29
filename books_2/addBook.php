<?php

include "../utils/ClassificationUtils.php";
include "../utils/AuthorUtils.php";
$classes=ClassificationUtils::getClass();
$authors=AuthorUtils::getAuthors();
?>
<head>

<script>

	function check_bnumber(){
	bnumber=document.getElementById("bnumber").value;
		if (bnumber.length == 0){	
			return false;
		}else{
			return true;
		}
	}
	
	function check_btitle(){
	title=document.getElementById("btitle").value;
		if (title.length == 0){	
			return false;
		}else{
			return true;
		}
	}
	

	
	function check_bcopyright(){
	copyright=document.getElementById("bcopyright").value;
		if (copyright.length == 0){	
			return false;
		}else{
			return true;
		}
	}
	
	function check_bpublisher(){
	publisher=document.getElementById("bpublisher").value;
		if (publisher.length == 0){
			return false;
		}else{
			return true;
		}
	}
	function check_bpagenumber(){
	numpages=document.getElementById("bpagenumber").value;
		if (numpages.length == 0){
			return false;
		}else{
			return true;
		}
	}
	
	function check_bprice(){
	price=document.getElementById("bprice").value;
		if (price.length == 0){
			return false;
		}else{
			return true;
		}
	}
	
	function check_blocation(){
	location=document.getElementById("blocation").value;
		if (location.length == 0){
			return false;
		}else{
			return true;
		}
	}
	
	function validate_addBook(){
		if(check_bnumber() && check_btitle() && check_bcopyright() && check_bpublisher()
			&& check_bpagenumber() && check_bprice() && check_blocation()){
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

</head>
<form action="<?php $_SERVER['PHP_SELF']; ?>" method='POST'>
<table style="margin-left:50px;" class="altrowstable" id="alternatecolor">
	<tr>
		<td class='first' >Accession Number: </td>
		<td> <input type='text' name='bnumber' id='bnumber' size='35'onblur='check_bnumber()'></td>
	</tr>
	<tr>
		<td class='first'>Book Title: </td>
		<td colspan='3'> <input type='text' name='btitle' id='btitle' size='118'onblur='check_btitle()'></td>
	</tr>
	<tr>
		<td class='first'>Book Copyright: </td>
		<td> <input type='text' name='bcopyright' id='bcopyright' size='35'onblur='check_bcopyright()'></td>
		<td class='first'>Book Publisher: </td>
		<td> <input type='text' name='bpublisher' id='bpublisher' size='35'onblur='check_bpublisher()'></td>
	</tr>
	
	
	<tr>
		<td class='first'>Page Number: </td>
		<td> <input type='text' name='bpagenumber' id='bpagenumber' size='35'onblur='check_bpagenumber()'></td>
		<td class='first'>Classification: </td>
		<td><select name ="bclassification">
			<?php foreach($classes as $class):?>
			<option value=<?php echo $class['id']; ?>><?php echo $class['class_name'];?></option>
			<?php endforeach;?>
		</select>
	</td>
	</tr>
	
	<tr>
		<td class='first'>Author: </td>
		<td><select name ="bauthor">
			<?php foreach($authors as $author):?>
			<option value=<?php echo $author['id']; ?>><?php echo $author['firstname']." ".$author['lastname'];?></option>
			<?php endforeach;?>
			</select>
		</td>
		<td colspan='2'>
			<i>If the author of the book doesn't exist, <a href='../authors/addAuthor.php'>click</a> here.</i>
		</td>
	</tr>
	
	<tr>
		<td class='first'>Unit Price: </td>
		<td> <input type='text' name='bprice' id='bprice' size='30'onblur='check_bprice()'> Php</td>
		<td class='first'>Location: </td>
		<td> <input type='text' name='blocation' id='blocation' size='35'onblur='check_blocation()'></td>
	</tr>
	
	<tr>
		<td colspan='4'align='center'><input type='submit' name='submit' value= "Add New Book" onclick ="return validate_addBook()" /></td>
	</tr>	

</table>
</form>

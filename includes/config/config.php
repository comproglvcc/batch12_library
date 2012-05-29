<?php
$conn = mysql_connect("localhost","root") && mysql_select_db("library_2012");
if ($conn){
	echo "";
} else {
	echo " Something  wrong in your connection";
}
?>
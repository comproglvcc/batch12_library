<?php

class AuthorUtils{
      public static function addAuthor($firstname,$lastname){
    		mysql_connect('localhost','root');
		mysql_select_db('library_2012');
             	$query = mysql_query("INSERT INTO author(fname,lname)VALUES('{$firstname}','{$lastname}')");
        	if($query){
        		return header('location:../author/readAuthor.php');
        	}else{
        		return false;
        	}
      }
      
      public static function getAuthors(){
    		mysql_connect('localhost','root');
		mysql_select_db('library_2012');
		$query="SELECT * FROM author";
		$result=mysql_query($query);
		$authors=array();
		while ($author=mysql_fetch_assoc($result)){
			$authors[]=$author;
		} return $authors;
	}


}

?>
<?php

include "../includes/config/config.php";
class AuthorUtils {

public static function check_ifexist($firstname,$lastname){
		$f_red = "color:red; font-family:Berlin Sans FB; font-size:20px; text-align:center; padding:4px;float: left;width: 1000px;background:#FFCCCC;border:groove solid red;margin-bottom:3px";
		$sql = "SELECT * FROM authors WHERE firstname ='{$firstname}' && lastname='{$lastname}'";
		$result = mysql_query($sql);
		while ($author= mysql_fetch_assoc($result)){
			if ($result === True){
				return False;
			}else{
				return True;
			}
			
		}
	
		}
	public static function addAuthor($firstname, $lastname, $birth, $death, $description){
		$query="INSERT INTO authors(firstname, lastname, date_birth, date_death, description)
						VALUES('{$firstname}', '{$lastname}', '{$birth}', '{$death}', '{$description}')";
		$result=mysql_query($query);
		if (mysql_affected_rows()>0){
			return TRUE;
		} else {
			return False;
		}
								
								
	}

	public static function getAuthors(){
		$query = "SELECT * FROM authors order by firstname asc";
		$result= mysql_query($query);
		$authors = array();
		while($author= mysql_fetch_assoc($result)){
			$authors[]=$author;
			
		} return $authors;
	
	}
	
	public static function eachAuthor($id){
		$query = "SELECT * FROM authors where id=".$id;
		$result= mysql_query($query);
		$authors = array();
		while($author= mysql_fetch_assoc($result)){
			$authors[]=$author;
			
		} return $authors;
	
	}

	public static function eachAuthorBook($id){
		$query = "SELECT * FROM books b JOIN authors a ON (b.author_id=a.id) where a.id=".$id;
		$result= mysql_query($query);
		$authors = array();
		while($author= mysql_fetch_assoc($result)){
			$authors[]=$author;
			
		} return $authors;
	
	}
	
	public static function editAuthor($id, $fname, $lname, $birth, $death, $description){
		$query = "UPDATE authors SET firstname='{$fname}',
											lastname='{$lname}',
											date_birth='{$birth}',
											date_death='{$death}',
											description='{$description}'
											where id=".$id;
		$result=mysql_query($query);
		if (mysql_affected_rows()>0){
			return header("location:eachAuthor.php?id={$id}");
		}	else {
			return false;
		}
	}


}



?>

<?php

class ClassificationUtils {

	public static function addClass($code, $name, $description){
	       mysql_connect('localhost','root');
		mysql_select_db('library_2012');
		$query="INSERT INTO classification (class_code, class_name, class_description)
				VALUES ('{$code}','{$name}','{$description}')" ;
		$result = mysql_query($query);
		if ($result){
			return TRUE;
		} else {
			return FALSE;
		}
	}	
		
	public static function editClass($id,$code,$name,$description){
	       mysql_connect('localhost','root');
		mysql_select_db('library_2012');
		$query ="UPDATE clasifcation SET class_code='{$code}',
										class_name='{$name}',
										class_description='{$description}'
										WHERE id=".$id;
		$result = mysql_query($query);
		if ($result){
			return TRUE;
		} else {
			return FALSE;
		}
	
	}
	
	public static function getClass(){
	       mysql_connect('localhost','root');
		mysql_select_db('library_2012');
		$query="SELECT * FROM classification";
		$result=mysql_query($query);
		$classes=array();
		while ($class=mysql_fetch_assoc($result)){
			$classes[]=$class;
		} return $classes;
	}
	
	
	

}




?>
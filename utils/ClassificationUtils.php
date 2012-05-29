<?php

include "../includes/config/config.php";
class ClassificationUtils {


	public static function getClass(){
		$query = "SELECT * FROM classification";
		$result= mysql_query($query);
		$classes = array();
		while($class= mysql_fetch_assoc($result)){
			$classes[]=$class;
			
		} return $classes;
	
	}
	
	public static function eachClass($id){
		$query = "SELECT * FROM classification where id=".$id;
		$result= mysql_query($query);
		$classes = array();
		while($class= mysql_fetch_assoc($result)){
			$classes[]=$class;
			
		} return $classes;
	
	}

	public static function editClass($id, $code, $name, $description){
		$query = "UPDATE classification SET class_code='{$code}',
											class_name='{$name}',
											class_description='{$description}'
											where id=".$id;
		$result=mysql_query($query);
		if (mysql_affected_rows()>0){
			return true;
		}	else {
			return false;
		}
	}

}



?>
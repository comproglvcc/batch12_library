<?php

mysql_connect("localhost","root");
mysql_select_db("library_2012");

class UserUtils{
	public static function check_ifexist($snumber){
		$query ="SELECT * FROM users where student_id='{$snumber}'";
		echo $query;
		$result = mysql_query($query);
		if (mysql_num_rows($result)>0){
			$user_info=array();
			while($user=mysql_fetch_assoc($result)){
				$user_info[]=$user;
			} return $user_info;
		} else {
			return FALSE;
		}
	}
	
	public static function addUser($snumber, $fname, $lname, $username, $email, $password,
									$course, $address, $contact, $level){
		$query= "INSERT INTO users(student_id,firstname, lastname, username, email, password,
									course, address, contact, level) VALUES
				('{$snumber}','{$fname}','{$lname}','{$username}','{$email}','{$password}',
					'{$course}', '{$address}', '{$contact}','{$level}')";
		$result=mysql_query($query);
		if (mysql_affected_rows()>0){
			return TRUE;
		} else {
			return FALSE;
		}
									
	}
	
	public static function login($user, $pass){

	$query = "SELECT * FROM users WHERE username='{$user}'";
	$result = mysql_query($query);
	
		if (mysql_num_rows(@$result) > 0){
			$db = mysql_fetch_assoc($result);
				if(($db['username'] == $user) && ($db['password'] == $pass)){
					return $db;
				}else{
					return False;
				}
				
		}else{
			return "Username doesn't exist";
			}

	}
	
	public static function viewUsers(){
		$query ="SELECT * FROM users where level='student'";
		$result = mysql_query($query);
		if (mysql_num_rows($result)>0){
			$user_info=array();
			while($user=mysql_fetch_assoc($result)){
				$user_info[]=$user;
			} return $user_info;
		} else {
			return FALSE;
		}
	}
	
	public static function eachUser($id){
		$query ="SELECT * FROM users where level='student' && id=".$id;
		$result = mysql_query($query);
		if (mysql_num_rows($result)>0){
			$user_info=array();
			while($user=mysql_fetch_assoc($result)){
				$user_info[]=$user;
			} return $user_info;
		} else {
			return FALSE;
		}
	}
	
	public static function editUser($id, $fname, $lname, $username, $email, $password,
									$course, $address, $contact ){
			
		$query="UPDATE users SET firstname='{$fname}', lastname='{$lname}',
												username='{$username}', email='{$email}', password='{$password}',
												course='{$course}', address='{$address}', contact='{$contact}'
													WHERE id={$id}";
		
		$result = mysql_query($query);
		if (mysql_affected_rows() > 0){
					return TRUE;
		} else {
					echo $query;
					return FALSE;			
		}
		
	}
	
	public static function deleteUser($id){
	
		$query = "DELETE FROM users WHERE id={$id}";
		mysql_query($query);
		if (mysql_affected_rows() > 0){
				return TRUE;
		}else{
				return False;
		}
	}
	
	public static function viewCourses(){
		$query ="SELECT * FROM courses";
		$result = mysql_query($query);
		if (mysql_num_rows($result)>0){
			$courses=array();
			while($course=mysql_fetch_assoc($result)){
				$courses[]=$course;
			} return $courses;
		} else {
			return FALSE;
		}
	}

}
?>
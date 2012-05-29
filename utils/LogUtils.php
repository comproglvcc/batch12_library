<?php
include "./includes/config/config.php";

class LogUtils{
	public static function login($username,$password){
		$query = mysql_query("SELECT * FROM users WHERE username='{$username}'");
		if (mysql_num_rows($query)!=0){
			while ($row=mysql_fetch_assoc($query)){
				$user = $row['username'];
				$pass = $row['password'];	
			} if ($user==$username and $pass==$password){
					return TRUE;	
			} else {
					return FALSE;
			}
		
		} else {
			return "Username doesn't exist";
		}
	
	
	
	
	}




}


?>

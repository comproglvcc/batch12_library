<?php

include"../includes/config/config.php";

	class BorrowerUtils{
	
	public static function check_ifexist($snumber, $firstname,$lastname){
		$f_red = "color:red; font-family:Berlin Sans FB; font-size:20px; text-align:center; padding:4px;float: left;width: 1000px;background:#FFCCCC;border:groove solid red;margin-bottom:3px";
		$sql = "SELECT * FROM borrowers WHERE student_id='{$snumber}' && firstname ='{$firstname}' && lastname='{$lastname}'";
		$result = mysql_query($sql);
		while ($borrowers= mysql_fetch_assoc($result)){
			if ($result === True){
				return False;
			}else{
				return True;
			}
			
		}
	
		}
		
	
	
		public static function addBorrower($snumber, $fname, $lname, $course, $address, $contact){                
			$query= "INSERT INTO borrowers(student_id, firstname, lastname, course, address, contact) 
					VALUES('{$snumber}','{$fname}','{$lname}','{$course}','{$address}','{$contact}')";
			$result= mysql_query($query);
			if($result){
				return header("location:getBorrowers.php");
			} else {
				return FALSE;
			}

	}
		public static function eachBorrower($id){
		$query = "SELECT * FROM borrowers WHERE id={$id}";
		$result=mysql_query($query) or die("Error in your query");
		if(mysql_num_rows($result)>0){
					$borrowers = array();
					while($borrower=mysql_fetch_assoc($result)){
						$borrowers[] = $borrower;
					}
					return $borrowers;
						}else{
					return NULL;
					}
		}
		
		public static function borrower_in($id){
			mysql_connect("localhost", "root") && mysql_select_db("library_2012");
			$query= "SELECT * FROM borrowers WHERE student_id='{$id}'";
			$result=mysql_query($query);
			$borrowers=array();
			while($borrower=mysql_fetch_assoc($result)){
				$borrowers[]= $borrower;
			}
				return $borrowers;
		}
		
		public static function check_exist($snumber){
		$sql = "SELECT * FROM borrowers WHERE student_id='{$snumber}'";
		$result = mysql_query($sql);
		if (mysql_num_rows($result)>0){

					return true;
				}else{
			return False;
			}
	
		}


		public static function getBorrowers(){    
			$query = "SELECT * FROM borrowers order by lastname asc";
			$result=mysql_query($query) or die("Error in your query");
			if(mysql_num_rows($result)>0){
					$borrowers = array();
					while($borrower=mysql_fetch_assoc($result)){
						$borrowers[] = $borrower;
					}
					return $borrowers;
						}else{
					return NULL;
					}
		}
		
		public static function getBorrowerCourse($course){    
			$query = "SELECT * FROM borrowers where course='{$course}' order by lname asc";
			$result=mysql_query($query) or die("Error in your query");
			if(mysql_num_rows($result)>0){
					$res = array();
					while($r=mysql_fetch_assoc($result)){
						$res[] = $r;
					}
					return $res;
						}else{
					return NULL;
					}
		}
		
		public static function deleteBorrower($id){
			$query = "DELETE FROM borrowers WHERE id={$id}";
			mysql_query($query) or die("Error in your query");
				if(mysql_affected_rows()>0){
					return true;
				}else{
					return $query;
			}
		}


		public static function editBorrower($id, $snumber, $fname, $lname, $course, $address, $contact){
			$query = "UPDATE borrowers SET student_id='{$snumber}', firstname='{$fname}', lastname='{$lname}',
						course='{$course}', address='{$address}', contact='{$contact}' WHERE id={$id}";
			mysql_query($query) or die("Error in your query");
				if(mysql_affected_rows()>0){
					return header("location:eachBorrower.php?id={$id}");
				}else{
					return false;
		}
}


}

?>

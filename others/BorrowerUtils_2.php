<?php
	class BorrowerUtils{
		public static function create($id, $name, $lname, $course, $contact, $address){
                $conn = mysql_connect("localhost", "root");
                $connect = mysql_select_db("library_2012");
		$sql = "INSERT INTO borrowers(student_id, name, lname, course, address, contact) VALUES('{$id}','{$name}','{$lname}','{$course}','{$address}','{$contact}')";
		$result = mysql_query($sql);
		if($result){
			return header('location:readBorrower.php');
			}else{
			return FALSE;
		}

	}
		public static function getBorrower($id){
                $conn = mysql_connect("localhost", "root");
                $connect = mysql_select_db("library_2012");
		$query = "SELECT * FROM borrowers WHERE id={$id}";
		$result=mysql_query($query) or die("Error in your query");
			if(mysql_num_rows($result)>0){
				$bo = mysql_fetch_assoc($result);
				return $bo;
			}else{
				return NULL;
	}
}
		public static function getALLBorrower(){
                $conn = mysql_connect("localhost", "root");
                $connect = mysql_select_db("library_2012");
		$query = "SELECT * FROM borrowers";
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
                $conn = mysql_connect("localhost", "root");
                $connect = mysql_select_db("library_2012");
		$query = "DELETE FROM borrowers WHERE id={$id}";
		mysql_query($query) or die("Error in your query");
			if(mysql_affected_rows()>0){
				return header('location:readBorrower.php');
			}else{
				return $query;
	}
}
                public static function updateBorrower($id, $bid, $name, $lname, $course, $contact, $address){
                $conn = mysql_connect("localhost", "root");
                $connect = mysql_select_db("library_2012");
		$query = "UPDATE borrowers SET student_id='{$bid}', name='{$name}', lname='{$lname}', course='{$course}', address='{$address}', contact='{$contact}' WHERE id={$id}";
		mysql_query($query) or die("Error in your query");
			if(mysql_affected_rows()>0){
				return header('location:readBorrower.php');
			}else{
				return header('location:updateBorrower.php');
	}
}


}

?>

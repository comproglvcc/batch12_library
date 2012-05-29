<?php
class LibraryUpdates{

	public static function outOfStock(){
	mysql_connect('localhost', 'root');
	mysql_select_db('library_2012');
	$query = mysql_query("select b.book_id from books b join book_status bs on(bs.book_id=b.book_id) where bs.status = 'out' or bs.status='lost' ");
	$book_id = array();
	while($tempo = mysql_fetch_assoc($query)){
		$book_id[] = $tempo;
	}
	return $book_id;
}
	public static function originalStock(){
	mysql_connect('localhost', 'root');
	mysql_select_db('library_2012');
	$query = mysql_query("select book_id ,stock from books");
	$book_stock = array();
	while($tempo = mysql_fetch_assoc($query)){
		$book_stock[] = $tempo;
	}
	return $book_stock;
}


	public static function totalOutOfStock(){
	mysql_connect('localhost', 'root');
	mysql_select_db('library_2012');
	$query = mysql_query("select * from book_status where status = 'out' or status='lost' ");
	$total = mysql_num_rows($query);
	if(mysql_num_rows($query)>0){
		return $total;
	}else{
		return 0;
	}
}

	public static function remainingStock(){
	mysql_connect('localhost', 'root');
	mysql_select_db('library_2012');
	$query = mysql_query("select * from books where remaining_stock <= 5 ");
		$stock_array = array();
		while($stock = mysql_fetch_assoc($query)){
			$stock_array[]=$stock;
		}
		if(mysql_num_rows($query)){
			return $stock_array;
		}else{
			return 0;
	}
}

	public static function totalBookLost(){
	mysql_connect('localhost', 'root');
	mysql_select_db('library_2012');
	$query = mysql_query("select * from books b join book_status bs on(bs.book_id=b.book_id) where bs.status='lost' ");
	$total =mysql_num_rows($query); 
	if(mysql_num_rows($query)>0){
			return $total;
		}else{
			return 0;
}
}
	public static function readBookLost(){
	mysql_connect('localhost', 'root');
	mysql_select_db('library_2012');
	$query = mysql_query("select * from books b join book_status bs on(bs.book_id=b.book_id) where bs.status='lost' ");
		$lost_array = array();
		while($lost = mysql_fetch_assoc($query)){
			$lost_array[]=$lost;
		}
		if(mysql_num_rows($query)){
			return $lost_array;
		}else{
			return 0;
	}
}

	public static function totalBookOut(){
	mysql_connect('localhost', 'root');
	mysql_select_db('library_2012');
	$query = mysql_query("select * from book_status where status='out' ");
	$total = mysql_num_rows($query);
		if(mysql_num_rows($query)>0){
			return $total;
		}else{
			return 0;
}
}
	public static function readBookOut(){
	mysql_connect('localhost', 'root');
	mysql_select_db('library_2012');
	$query = mysql_query("select * from books b join book_status bs on(bs.book_id=b.book_id) where bs.status='out' ");
		$out_array = array();
		while($lost = mysql_fetch_assoc($query)){
			$out_array[]=$lost;
		}
		if(mysql_num_rows($query)){
			return $out_array;
		}else{
			return 0;
	}
}


}
?>
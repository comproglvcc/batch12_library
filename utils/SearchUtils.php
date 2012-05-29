<?php
  class SearchUtils{
   
   public static function searchOnBook($key ='', $field ='book_title'){
 		mysql_connect('localhost','root');
		mysql_select_db('library_2012');
		$query = "select * from books b join authors a on(a.author_id=b.author_id)where b.{$field} like '%{$key}%'";
		$res = mysql_query($query);

                         $arr_book = array();
                         while($r = mysql_fetch_assoc($res)){
                                  $arr_book[] = $r;
                         }
                  return $arr_book;




  }
     
   public static function countSearch($key = '', $field = 'book_title'){
 		mysql_connect('localhost','root');
		mysql_select_db('library_2012');
		$query = "select * from books where {$field} like '%{$key}%'";
		$res = mysql_query($query);
		$count = mysql_num_rows($res);
                  return $count;

  }
  
   }
?>
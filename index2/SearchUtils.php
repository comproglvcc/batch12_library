<?php
  class SearchUtils{
   
   public static function searchOnBook($key, $field){
 		mysql_connect('localhost','root');
		mysql_select_db('library_2012');
		$query = "select * from books where {$field} like '%{$key}%'";
		$res = mysql_query($query);

                         $arr_book = array();
                         while($r = mysql_fetch_assoc($res)){
                                  $arr_book[] = $r;
                         }
                  return $arr_book;




  }
  
   }
?>
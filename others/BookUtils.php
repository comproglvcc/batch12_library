<?php
class BookUtils {
	public static function addBook($access, $name, $copyright, $publisher, $page, $author, $class, $price, $location){
		mysql_connect('localhost','root');
		mysql_select_db('library_2012');
		$query = "INSERT INTO books (book_title, copyright, publisher, page_number, author_id, classification_id, unit_price, original_stock, location)
				VALUES ('{$name}', '{$copyright}', '{$publisher}', '{$page}', '{$author}', '{$class}', '{$price}', 1, '{$location}')" ;
		$result1 = mysql_query($query) or die("Error in your query");
		$id = mysql_insert_id();
		$result = mysql_query("insert into book_status(book_id, accession_num, status) values('{$id}', '{$access}', 'in')");
		$query1 = "select * from book_status where book_id={$id}";
		$result2 = mysql_query($query1);
                $count = mysql_num_rows($result2);
                $query2 = "update books set stock='{$count}' where book_id={$id}";
                $result3 = mysql_query($query2);
                if(mysql_affected_rows()>0){
			return FALSE;
		}else{
			return True;
		}
	}

	public static function exist($access, $name, $copyright, $publisher, $page, $author, $class, $price, $location){
		mysql_connect('localhost','root');
		mysql_select_db('library_2012');
		$query = "select * from books b join book_status bs on(b.book_id=bs.book_id) where bs.accession_num = '{$access}' and b.book_title='{$name}' and
                        b.copyright ='{$copyright}' and b.publisher = '{$publisher}' and b.page_number='{$page}' and
                        b.classification_id='{$class}' and b.author_id='{$author}' and b.unit_price ='{$price}' and b.location='{$location}'";
		$result=mysql_query($query) or die("Error in your query");
		if(mysql_num_rows($result)>0){
			return FALSE;
		}else{
			return TRUE;

				}
			}
	public static function readBooks(){
		mysql_connect('localhost','root');
		mysql_select_db('library_2012');
		$query = "select * from books b join book_status bs on(b.book_id=bs.book_id)";
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
	public static function bookInventory(){
		mysql_connect('localhost','root');
		mysql_select_db('library_2012');
		$query = "select * from books";
		$result=mysql_query($query) or die("Error in your query");
		if(mysql_num_rows($result)>0){
				$res = array();
					while($r=mysql_fetch_assoc($result)){
						$res[] = $r;
						}
			return $res;
		}else{
			return $query;

		}
	}
	public static function readBookstock($id){
		mysql_connect('localhost','root');
		mysql_select_db('library_2012');
		$query = "select * from books b join book_status bs on(b.book_id=bs.book_id) join classification
			c on(c.id=b.classification_id) join author a on(a.id=b.author_id) where b.book_id={$id}";
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

	public static function readBook($id){
		mysql_connect('localhost','root');
		mysql_select_db('library_2012');
		$query = "select * from books b join book_status bs on(b.book_id=bs.book_id) join classification
			c on(c.id=b.classification_id) join author a on(a.id=b.author_id) where b.book_id={$id}";
		$result=mysql_query($query) or die("Error in your query");
		if(mysql_num_rows($result)>0){
				$res = array();
					while($r=mysql_fetch_assoc($result)){
						$res[] = $r;
						}
			return $res;
		}else{
			return $query;

		}
	}
	
	public static function readEachBooks(){
		mysql_connect('localhost','root');
		mysql_select_db('library_2012');
		$query = "select * from books";
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

	public static function countStock($id){
		mysql_connect('localhost','root');
		mysql_select_db('library_2012');
		$query1 = "select * from book_status where book_id={$id}";
		$result1 = mysql_query($query1);
		$count = mysql_num_rows($result1);
                $query2 = "update books set original_stock='{$count}' where book_id={$id}";
                $result2 = mysql_query($query2);
                if(mysql_affected_rows()>0){
                  return TRUE;
                }else{
                  return FALSE;
		}

  }

      public static function addStock($id, $access, $status){
    		mysql_connect('localhost','root');
		mysql_select_db('library_2012');
                $add = mysql_query("insert into book_status(book_id, accession_num, status) values('{$id}', '{$access}', '{$status}')");
		$stock1 = mysql_query("select * from book_status where book_id={$id}");
		$stock2 = mysql_query("select * from book_status where book_id={$id} and status ='in'");
		$count1 = mysql_num_rows($stock1);
		$count2 = mysql_num_rows($stock2);
		$update_orig_stock = mysql_query("update books set original_stock='{$count1}' where book_id={$id}");
		$update_rem_stock = mysql_query("update books set remaining_stock='{$count1}' where book_id={$id}");

                if(mysql_affected_rows()>0){
                  return header("location:viewStock.php?id={$id}");
                }else{
                  return FALSE;
		}


      }
}

?>

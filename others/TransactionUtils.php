<?php

class TransactionUtils{

      public static function addTransaction($book_access, $borrower, $issue, $due){
       mysql_connect('localhost', 'root');
       mysql_select_db('library_2012');
       $result = mysql_query("insert into transaction(book_access_num, borrowers_id, date_issue, date_due) values('{$book_access}','{$borrower}','{$issue}','{$due}')");
       $updateBstat = mysql_query("update book_status set status='out' where accession_num='{$book_access}'");
		$id = mysql_query("select book_id from book_status where accession_num='{$book_access}'");
	   $temp = mysql_fetch_assoc($id);
	   $book_id = $temp['book_id'];
	   $remaining = mysql_query("select * from book_status where status = 'in' and book_id={$book_id}");
	   $remaining_stock = mysql_num_rows($remaining);
	   $update_remaining_stock = mysql_query("update books set remaining_stock='{$remaining_stock}' where book_id={$book_id}");
		
		if(mysql_affected_rows()>0){
             return header('location:readTransaction.php');
		}else{
             return false;
      }

      }	

	  public static function returnBook($id, $return){
       mysql_connect('localhost', 'root');
       mysql_select_db('library_2012');
	   #recording the date that the book was returned
       $result = mysql_query("update transaction set date_returned ='{$return}' where trans_id='{$id}'") or die("Error Update Query");
       #fetching the book accession num for feedback
	   $book_access = mysql_query("select book_access_num from transaction where trans_id='{$id}'") or die("Error select Query");
	   $tempo = mysql_fetch_assoc($book_access);
       $accession = $tempo['book_access_num'];
			#sequence of code for penalty computation 
			$days = mysql_query("select DATEDIFF(date_returned, date_due) as days from transaction where trans_id = {$id}");
			$tmp = mysql_fetch_assoc($days);
			$overdue = $tmp['days'];
			#getting the amount that corresponds per day from penalty_amount table
			$penalty = mysql_query("select amount from penalty_amount");
			$temp = mysql_fetch_assoc($penalty);
			$penalty_amount = $temp['amount'];
			$total_penalty = $overdue * $penalty_amount;
			#recording penalty
			$penalty_in = mysql_query("insert into penalty(transaction_id, penalty_amount, num_of_days, penalty_total, status, balance, description) 
						values('{$id}', '{$penalty_amount}','{$overdue}', '{$total_penalty}', 'unpaid', '{$total_penalty}','overdue' ) ")
						or die("Error penalty recording query");

       if(mysql_num_rows($book_access)>0){
		return $accession;
		}else{
        return null;
		}
      }


       public static function updateBookStatus($baccess){
       mysql_connect('localhost', 'root');
       mysql_select_db('library_2012');
       $updateBstat = mysql_query("update book_status set status='in' where accession_num='{$baccess}'");
	   $id = mysql_query("select book_id from book_status where accession_num='{$baccess}'");
	   $temp = mysql_fetch_assoc($id);
	   $book_id = $temp['book_id'];
	   $remaining = mysql_query("select * from book_status where status = 'in' and book_id={$book_id}");
	   $remaining_stock = mysql_num_rows($remaining);
	   $update_remaining_stock = mysql_query("update books set remaining_stock='{$remaining_stock}' where book_id={$book_id}");
		if(mysql_affected_rows()>0){
             return true;
      }else{
             return false;
      }


      }


	
	public static function readTransaction(){
       mysql_connect('localhost', 'root');
       mysql_select_db('library_2012');
       $result = mysql_query("select * from transaction t join book_status b on(b.accession_num=t.book_access_num) where b.status = 'out' order by t.trans_id DESC ");
       $res = array();
       while($r = mysql_fetch_assoc($result)){
         $res[]=$r;
       }

        return $res;
      }

      public static function readTransactionJoin($id){
       mysql_connect('localhost', 'root');
       mysql_select_db('library_2012');
       $result = mysql_query("select * from transaction t join borrowers b on(b.student_id=t.borrowers_id)
               join book_status bs on(bs.accession_num=t.book_access_num)
			   join books bk on(bk.book_id=bs.book_id) where trans_id={$id}");
       $res = array();
       while($r = mysql_fetch_assoc($result)){
         $res[]=$r;
       }
        return $res;
      }


      public static function readTransacLost($id){
       mysql_connect('localhost', 'root');
       mysql_select_db('library_2012');
       $result = mysql_query("select * from transaction t join borrowers b on(b.student_id=t.borrowers_id)
               join book_status bs on(bs.accession_num=t.book_access_num) join books bk on(bk.book_id=bs.book_id) where trans_id='{$id}'");
       $res = array();
       while($r = mysql_fetch_assoc($result)){
         $res[]=$r;
       }

        return $res;
      }

}


?>
<?php
class PenaltyUtils{
	public static function readAmount(){
       mysql_connect('localhost', 'root');
       mysql_select_db('library_2012');	
		$query = "select amount from penalty_amount";
		$res = mysql_query($query);
		$tmp = mysql_fetch_assoc($res);
		$amount = $tmp['amount'];
		return $amount;
	}


		public static function lostBook($id, $access, $price){
       mysql_connect('localhost', 'root');
       mysql_select_db('library_2012');
	   #declaring book as lost
       $updates = mysql_query("update book_status set status='lost' where accession_num ='{$access}'");
	   
		   #sequence of code for updating the remaining stock of book
		   $id = mysql_query("select book_id from book_status where accession_num='{$access}'");
		   $temp = mysql_fetch_assoc($id);
		   $book_id = $temp['book_id'];
		   $remaining = mysql_query("select * from book_status where status = 'in' and book_id={$book_id}");
		   $remaining_stock = mysql_num_rows($remaining);
		   $update_remaining_stock = mysql_query("update books set remaining_stock='{$remaining_stock}' where book_id={$book_id}");
		   
       #recording penalty lost into database
	   $insert = mysql_query("insert into penalty(transaction_id, penalty_amount, num_of_days, penalty_total, status, balance, description) 
				values('{$id}', '-','-', '{$price}', 'unpaid', '{$price}','lost' ) ");
		
      if(mysql_affected_rows()>0){
             return header("location:readTransaction.php");
      }else{
             return false;
      }


      }


	public static function readPenalty(){
       mysql_connect('localhost', 'root');
       mysql_select_db('library_2012');
       $result = mysql_query("select * from penalty p join transaction t on(p.transaction_id=t.trans_id)
										join book_status b on(b.accession_num=t.book_access_num)
										join users u on(u.student_id=t.borrowers_id)
										join books bo on(bo.book_id=b.book_id) where p.status != 'paid' and balance != 0
										order by t.trans_id DESC ");
       $res = array();
       while($r = mysql_fetch_assoc($result)){
         $res[]=$r;
       }

        return $res;
      }
	public static function readPenalty2($id){
       mysql_connect('localhost', 'root');
       mysql_select_db('library_2012');
       $result = mysql_query("select * from penalty p join transaction t on(p.transaction_id=t.trans_id)
										join book_status b on(b.accession_num=t.book_access_num)
										join users u  on(u.student_id=t.borrowers_id)
										join books bo on(bo.book_id=b.book_id)
										join classification c on(c.class_id=bo.classification_id)where
										p.penalty_id={$id}");
       $res = array();
       while($r = mysql_fetch_assoc($result)){
         $res[]=$r;
       }

        return $res;
      }
	public static function readPenalties($id){
       mysql_connect('localhost', 'root');
       mysql_select_db('library_2012');
       $result = mysql_query("select * from penalty where penalty_id ={$id}");
       $res = array();
       while($r = mysql_fetch_assoc($result)){
         $res[]=$r;
       }

        return $res['penalty_id'];
      }
public static function updatePenalty($amount){
	mysql_connect('localhost','root');
	mysql_select_db('library_2012');
	$query = mysql_query("update penalty_amount set amount='{$amount}'");
	if(mysql_affected_rows()>0){
		return TRUE;
	}else{
		return FALSE;
	}
}

public static function computePenalty($id){
	mysql_connect('localhost','root');
	mysql_select_db('library_2012');
	$days = mysql_query("select DATEDIFF(date_returned, date_due) as days from transaction where trans_id = {$id}");
	$tmp = mysql_fetch_assoc($days);
	$overdue = $tmp['days'];
	$penalty = mysql_query("select amount from penalty_amount");
	$temp = mysql_fetch_assoc($penalty);
	$penalty_amount = $tmp['amount'];
	$total_penalty = $overdue * $penalty_amount;
	$penalty_in = mysql_query("insert into penalty(transaction_id, penalty_amount, num_of_days, penalty_total, status, balance, description) 
				values('{$id}', '{$penalty_amount}','{$overdue}', '{$total_penalty}', 'unpaid', '{$total_penalty}','overdue' ) ");

	if(mysql_affected_rows()>0){
		return true;
	}else{
		return false;
	}
}
public static function recordPayment($id, $date, $payment){

	mysql_connect('localhost','root');
	mysql_select_db('library_2012');
	
	#selecting first the current balance of the penalty
	$penalty = mysql_query("select balance from penalty where penalty_id ={$id}");
	$tmp = mysql_fetch_assoc($penalty);
	$penalty_amount = $tmp['balance'];
	
	#subtracting the balance from the payment given by the borrower
	$balance = $penalty_amount - $payment;
	
	#recording the payments and date
	$query = "insert into payment(penalty_id, payment_date, amount) values('{$id}', '{$date}', {$payment})";
	$record = mysql_query($query) or die("Error in your Query");
	
	#checking whether the penalty has 0 balance to declare paid or installed 
		if($balance <=0){
			$update = mysql_query("update penalty set status ='paid', balance = '0' where penalty_id={$id}");
		}else{
			$update= mysql_query("update penalty set status ='installment', balance = '{$balance}' where penalty_id={$id}" ); 
		}
	if(mysql_affected_rows()>0){
		return TRUE;
	}else{
		return FALSE;
		}
	}

public static function readPaymentOfBorrower($id){
	mysql_connect('localhost','root');
	mysql_select_db('library_2012');
	$payment = mysql_query("select *, sum(py.amount) as total_payment from payment py 
							join penalty pe on(py.penalty_id=pe.penalty_id) where py.penalty_id ={$id}");
	$payment_array = array();
	while($pay = mysql_fetch_assoc($payment)){
		$payment_array[] = $pay;
	}
	return $payment_array;
}

public static function readPreviousPayment($id){
	mysql_connect('localhost','root');
	mysql_select_db('library_2012');
	$payment = mysql_query("select sum(amount) as previous_payment from payment where penalty_id ={$id}");
	$tempo = mysql_fetch_assoc($payment);
	$previous = $tempo['previous_payment'];
	if(mysql_num_rows($payment)>0){
		return $previous;
	}else{
		return 0;
	}
}

public static function readAllPayments(){
	mysql_connect('localhost','root');
	mysql_select_db('library_2012');
	$payment = mysql_query("select *, sum(py.amount) as total_payment from payment py 
							join penalty pe on(py.penalty_id=pe.penalty_id)
							join transaction t on(pe.transaction_id=t.trans_id)
							join book_status b on(b.accession_num=t.book_access_num)
							join borrowers br on(br.student_id=t.borrowers_id)
							join books bo on(bo.book_id=b.book_id) where p.status != 'paid' and balance != 0
							order by t.trans_id DESC ");
	$payment_array = array();
	while($pay = mysql_fetch_assoc($payment)){
		$payment_array[] = $pay;
	}
	return $payment_array;
}
}
?>

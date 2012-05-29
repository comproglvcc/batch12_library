<?php

     include 'TransactionUtils.php';

        if(isset($_POST['submit'])){

    $m = $_POST['month'];
	$d = $_POST['day'];
	$y = $_POST['year'];
	$date = $y . "-" . $m . "-" . $d;
	if(checkdate($m, $d, $y) === FALSE){
	    echo "<span>Invalid Date</span>";
        echo "<a href='" . $_SERVER['PHP_SELF'] . "'>Restart Fill up Book Transaction Form</a>";
        exit;

	}

        $book = $_POST['bAccess'];
        $borower = $_POST['bId'];
        $date_issue = date("Y")."-".date("m")."-".date("d");
        $date_due = $date;

        $result = TransactionUtils::addTransaction($book, $borower, $date_issue, $date_due);

        }

?>

<html>
<head>
      <script>
        function display_date(){
                 datethe = new Date();
		 month = datethe.getMonth() + 1;
		 date = datethe.getDate();
		 year = datethe.getFullYear();
		 day = datethe.getDay();
		 hour = datethe.getHours();
		 mins = datethe.getMinutes();

		 document.getElementById("datedate").innerHTML= " " + month + "/" + date + "/" + year + " - " + hour + ":" + mins + " " + day;

        }


	</script>
</head>

<div align='center'>
<table>
	<tr>
		<td>Add |</td>
		<td>Search</td>
	</tr>
</table>
</div>
<body onLoad="display_date()">
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method='POST'>
            <table>
            <tr>
                <td>Today is:<span id = "datedate"></span></td>
            </tr>
                   <tr>
                       <td>Borrowers id:</td>
                       <td><input type='text' name='bId' id='bId' size='20'/></td>
                   </tr>
                   <tr>
                       <td>Book Accession Number:</td>
                       <td><input type='text' name='bAccess' id='bAccess' size='20'/></td>
                   </tr>
                   <tr>
                       <td>Date Due:</td>
                       <td>
                           <select name='month' id = "month" onBlur="check_date()">
		<?php
		$months=array(0,
					'Jan',
					'Feb',
					'Mar',
					'Apr',
					'May',
					'June',
					'July',
					'Aug',
					'Sept',
					'Oct',
					'Nov',
					'Dec');
		?>
		<?php for($m=1; $m <= 12; $m++):?>
		<option value="<?php echo $m; ?>"><?php echo $months[$m];?></option>
		<?php endfor; ?>
		</select>

		<select name='day' id = "day" onBlur="check_date()">
		<?php for($d=1; $d <= 31; $d++):?>
		<option value="<?php echo $d?>"><?php echo $d?></option>
		<?php endfor;?>
		</select>

		,
		<select name='year' id ="year" onBlur="check_date()">
		<?php $year_now=date("Y");?>
		<?php for($y=$year_now; $y >= 1960; $y--):?>
		<option value="<?php echo $y;?>"><?php echo $y;?></option>
		<?php endfor;?>
		</select>

		</br>
			<span id="help_date"></span>

                       </td>
                   </tr>
                   <tr>
                   <td colspan='2' align='center'><input type = 'submit' name='submit' value='submit'/></td>
                   </tr>
            </table>
      </form>


</html>
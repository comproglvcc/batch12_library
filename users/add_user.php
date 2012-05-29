<?php

include "../includes/config/config.php";
include "../utils/UserUtils.php";

	if (!empty ($_POST) ) {
		$username=$_POST['username'];
		$password = sha1($_POST['password']);

		$result = UserUtils::addUser($username,$password);
			if ($result) {
				echo "Successfully added " . $username. " as a new user";
			} else {
				echo " Adding " .$username. " failed";
			}
	}
?>



<body>
<form action="add_user.php"  method ="POST">
<table border='1'>
	<tr>
		<td colspan='2' align='center'> <h2>Add User</h2> </td>
	</tr>

	<tr>
		<td> Username : </td>
		<td> <input type='text' name='username'> </td>
	</tr>

	<tr>
		<td> Password : </td>
		<td> <input type='password' name='password'></td>
	</tr>

	<tr>
		<td colspan='2' align='center'><input type='submit' name='submit' value='ADD USER'></td>
	</tr>
</table>
</form>
</body>

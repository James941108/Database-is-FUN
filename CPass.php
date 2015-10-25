
Change password form
<hr>

<?PHP
	session_start();
	
	if(isset($_POST['confirm'])){
		$oldpass = trim($_POST['oldpass']);
		$newpass1 = trim($_POST['newpass1']);
		$newpass2 = trim($_POST['newpass2']);
		$id = $_SESSION['ID'];
		if($newpass1 == $newpass2){
			$conn = oci_connect("system", "Hanuman4162", "//localhost/XE");
			if (!$conn) {
				$m = oci_error();
				echo $m['message'], "\n";
				exit;
			}
			$query = "SELECT * FROM AA_LOGIN WHERE password='$oldpass'";
			$parseRequest = oci_parse($conn, $query);
			oci_execute($parseRequest);
			// Fetch each row in an associative array
			$row = oci_fetch_array($parseRequest, OCI_RETURN_NULLS+OCI_ASSOC);
			
			if($row){
				$query = "UPDATE AA_LOGIN SET password = '$newpass1' WHERE id = '$id'";
				$parseRequest = oci_parse($conn, $query);
				oci_execute($parseRequest);
				
				echo "Change password Successful.<br><br>";
				
			}else{
				echo "Change password Fail.<br><br>";
			}	
		}else{
			echo "Password not match.<br><br>";
		}
	}
	else if(isset($_POST['back'])){
		echo '<script>window.location = "MemberPage.php";</script>';
	};
	oci_close($conn);
?>

<form action='CPass.php' method='post'>
	Old Password<br>
	<input name='oldpass' type='password'><br>
	New Password<br>
	<input name='newpass1' type='password'><br>
	Confirm New Password<br>
	<input name='newpass2' type='password'><br><br>
	<input name='confirm' type='submit' value='Confirm'>
	<input name='back' type='submit' value='Back'>
</form>

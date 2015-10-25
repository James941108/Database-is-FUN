<?PHP
	session_start();
	if(isset($_POST['CPass'])){
		echo '<script>window.location = "CPass.php";</script>';
	}
	else if(isset($_POST['Logout'])){
		echo '<script>window.location = "login.php";</script>';
	}
?>

Member page
<hr>

<?PHP
	echo "ID : ".$_SESSION['ID']."<br>";
	echo "NAME : ".$_SESSION['NAME']."<br>";
	echo "SURNAME : ".$_SESSION['SURNAME']."<br><br>";
	
	//echo "<a href='Logout.php'>Logout</a>";
?>

<form action='MemberPage.php' method='post'>
	<input name='CPass' type='submit' value='Change Password'>
	<input name='Logout' type='submit' value='Logout'>
</form>


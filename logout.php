<?php 
session_start();
	if ((isset($_SESSION['id_korisnika'])) or (isset($_SESSION['id_admina']))){
		session_unset();
		session_destroy();
	}
	header("Location: index.php?akcija=login");
?>




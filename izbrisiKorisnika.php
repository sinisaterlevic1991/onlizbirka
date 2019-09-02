<?php
session_start();
if((isset($_SESSION['id_admina']))){


	if(isset($_GET['id'])){
		include "konekcija.php";
	$id=$_GET['id'];
$sql = "DELETE FROM korisnici WHERE id='$id'";
if ($link->query($sql) === TRUE) {
    
	header( "Location: index.php?akcija=login&radnje=korisnici" );
	
	} else {
    echo "Error deleting record: " . $conn->error;
}
}}else {
	
	header( "Location: index.php?akcija=login" );
}
?>
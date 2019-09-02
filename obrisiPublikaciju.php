<?php
session_start();
if((isset($_SESSION['id_admina']))){


	if(isset($_GET['id'])){
		include "konekcija.php";
	$id=$_GET['id'];
$sql = "DELETE FROM podaci WHERE id='$id'";
if ($link->query($sql) === TRUE) {
    
	header( "Location: index.php?akcija=pretrazivanje" );
	
	} else {
    echo "Error deleting record: " . $conn->error;
}
}}else {
	
	if((isset($_SESSION['id_korisnika']))){
		
		
	if(isset($_GET['id'])){
		include "konekcija.php";
	$id=$_GET['id'];
$sql = "DELETE FROM podaci WHERE id='$id'";
if ($link->query($sql) === TRUE) {
    
	header( "Location: index.php?akcija=pretrazivanje" );
	
	} else {
    echo "Error deleting record: " . $conn->error;
}
		
	}else{

	
	header( "Location: index.php?akcija=login" );
}}}
?>
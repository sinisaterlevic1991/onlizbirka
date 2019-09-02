<?php

session_start();
if((isset($_SESSION['id_admina']))){
	
	
	
	
	
	if(isset($_GET['id'])){
	include "konekcija.php";
	$id=$_GET['id'];
	
	$upit = "SELECT ovlast FROM korisnici where id='$id'";
	
	$result=mysqli_query($link, $upit);
	while($row = $result->fetch_array()){
		
		$ovlast=$row['ovlast'];
		
		
		
		
	}
	
	if($ovlast=='Korisnik'){
		$sql = "UPDATE korisnici SET ovlast='admin' WHERE id='$id' ";
if ($link->query($sql) === TRUE) {
    
	header( "Location: index.php?akcija=login&radnja=korisnici" );
	
	} else {
    echo "Error deleting record: " . $conn->error;
}
		
		
		
		
	}else{
		$sql = "UPDATE korisnici SET ovlast='Korisnik' WHERE id='$id' ";
if ($link->query($sql) === TRUE) {
    
	header( "Location: index.php?akcija=login&radnja=korisnici" );
	
	} else {
    echo "Error deleting record: " . $conn->error;
}
		
		
		
		
	}
	

}}else {
	
	header( "Location: index.php?akcija=login" );
}




?>
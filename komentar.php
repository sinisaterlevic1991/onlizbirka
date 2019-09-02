<?php 
session_start();
if((isset($_SESSION['id_korisnika'])) or (isset($_SESSION['id_admina']))){
	
include "konekcija.php";

$komentar=$_POST['komentar'];
$id=$_POST['id'];
$idPublikacije=$_POST['idPublikacije'];
$datum=$_POST['datum'];

$sql = "INSERT INTO komentari SET idKorisnika='$id', idPublikacije='$idPublikacije', komentar='$komentar',datum='$datum'";

$var=mysqli_query($link,$sql);

if($var){

header("Location: index.php?akcija=login&radnja=vise&id=$idPublikacije");	
	
	
}else{
	
	echo "ne radi";
}

}else{
	
	include "login.php";
	
}
?>



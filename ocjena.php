<?php 
session_start();
if((isset($_SESSION['id_korisnika'])) or (isset($_SESSION['id_admina']))){
	
include "konekcija.php";
 



$ocjena=$_POST['ocjena'];
$id=$_POST['id'];
$idPublikacije=$_POST['idPublikacije'];



$sql = "INSERT INTO `ocjene` (`idKorisnika`, `idPublikacije`, `ocjena`) VALUES ('$id', '$idPublikacije', '$ocjena')";
$var=mysqli_query($link,$sql);

echo $ocjena;
echo "-ocj " ;
echo $id;
echo"-id "; 
echo $idPublikacije;
echo "-publik ";


if($var){

header("Location: index.php?akcija=login&radnja=vise&id=$idPublikacije");	
	
	
}else{
	
	echo "ne radi baš baš";
	
}

}else{
	
	include "login.php";
	
}
?>
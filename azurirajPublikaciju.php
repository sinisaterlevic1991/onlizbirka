<?php
session_start();
if((isset($_SESSION['id_korisnika'])) or (isset($_SESSION['id_admina']))){
	


include 'konekcija.php';

 @$idPublikacije=$_POST['idPublikacije'];
 @$naziv=$_POST['naziv'];
 @$autor=$_POST['autor'];
 @$godina=$_POST['godina'];
 @$izdavac=$_POST['izdavac'];
 echo @$odabir=$_POST['odabir'];
 
 
if(mysqli_query($link,"UPDATE podaci SET naziv='".$naziv."',autor='".$autor."',godina='".$godina."',izdavac='".$izdavac."',idVrsta='".$odabir."'  WHERE id='".$idPublikacije."'"))
{
	
header("Location: index.php?akcija=login");

}else {
	
	echo " <script> alert'Nije proslo'; </script>";
	echo 'smrad';
	}	
 
 
 


}else{
	
	include "login.php";
	
	
}

?>
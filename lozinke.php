<?php
if((isset($_GET['poruka']))) { if(($_GET['poruka'])=='1'){ echo "<script> alert('Podaci koje ste unijeli se ne podudaraju!');</script>"; } }
if((isset($_POST['staraLozinka']))) {
session_start(); }
if((isset($_SESSION['id_korisnika'])) or (isset($_SESSION['id_admina']))){
if(isset($_SESSION['id_korisnika'])){$id=$_SESSION['id_korisnika'];}else{$id=$_SESSION['id_admina'];}

if((isset($_POST['staraLozinka'])) and (isset($_POST['novaLozinka']))and (isset($_POST['novaLozinka1']))){ 

include("konekcija.php");

$query= "Select * from korisnici where id='$id'"; 
$result =mysqli_query($link,$query);

$staraLozinka=$_POST['staraLozinka'];
$novaLozinka=$_POST['novaLozinka'];
$novaLozinka1=$_POST['novaLozinka1'];

if($novaLozinka==$novaLozinka1) { $provjera=true; } else{$provjera=false;}

while($row = $result -> fetch_row()){
		
			$password_iz_baze=$row[2];
	
	if($password_iz_baze==md5($staraLozinka)){ $provjera1=true; 
	}else {$provjera1=false;}}

	if(($provjera)and ($provjera1)) {
	
	$noviPassword=md5($novaLozinka);
	if(mysqli_query($link,"UPDATE korisnici SET password='".$noviPassword."' WHERE id='".$id."'"))
{
header("Location: logout.php");

}else {echo "Nije proslo";}
	
	
	
	}else{
		header("Location: index.php?akcija=login&radnja=lozinke&poruka=1");
		
	
}} else {

?>

<form action="lozinke.php" method="post" >
<table>
<tr><td> Unesi staru lozinku: </td><td> <input type="password" name="staraLozinka" required /> </td></tr>
<tr><td> Unesi novu lozinku: </td><td> <input type="password" name="novaLozinka" required />  </td></tr>
<tr><td> Unesi ponovno novu lozinku: </td><td> <input type="password" name="novaLozinka1"  required/> </td></tr>
<tr><td></td></tr>
<br>
<tr><td></td></tr>
<tr><td> <input type='submit' value='Natrag' id="gumb" onclick="history.go(-1);" /> </td>

<td> <input type='submit' value='Spremi' id="gumb" /> </td>

</tr>
</table>
<br>

</form>



<?php
}}
else{
header("Location: index.php?akcija=login");
}


?>
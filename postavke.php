


<?php

if((isset($_SESSION['id_korisnika'])) or (isset($_SESSION['id_admina']))){

if(isset($_SESSION['id_korisnika'])){$id=$_SESSION['id_korisnika'];}else{$id=$_SESSION['id_admina'];}

include 'konekcija.php';


if(isset($_POST['username'])){
	
$ime=$_POST['ime'];
$prezime=$_POST['prezime'];
$username=$_POST['username'];
$password=$_POST['password'];
$datumRodjenja=$_POST['datumRodjenja'];
$adresa=$_POST['adresa'];
$grad=$_POST['grad'];
$drzava=$_POST['drzava'];
$telefon=$_POST['telefon'];
$email=$_POST['email'];

if(mysqli_query($link,"UPDATE korisnici SET ime='".$ime."',prezime='".$prezime."',username='".$username."',password='".$password."',datumRodjenja='".$datumRodjenja."',
adresa='".$adresa."',grad='".$grad."', drzava='".$drzava."',telefon='".$telefon."',email='".$email."' WHERE id='".$id."'"))
{
header("Location: index.php?akcija=login");

}else {echo " <script> alert'Nije proslo'; </script>";}	
	
}else{

$upit="SELECT * FROM `korisnici` WHERE id='".$id."'   ";
$result= $link->query($upit);

	while($row=$result->fetch_assoc()){
		
		echo "Dobrodošao <b>"; 
		echo $row['username'];
		echo "</b>!";
?>

		<br><br>
		
	<form action="index.php?akcija=login&radnja=postavke" method="POST">
	<div class="tablereg"> 
	<table>
	<tr><td> 
	Ime:    </td>
	<td><input type="text" name="ime"  value="<?php echo $row['ime']; ?>"required /></td>
	</tr>
	
	<tr><td><br></td></tr>
	
	<tr>
	<td>Prezime:</td>
	<td><input type="text" name="prezime" value="<?php echo $row['prezime']; ?>"required /></td>
	</tr>

	
	
	
	
	
	<tr><td><br></td></tr>
	
	<tr>
	<td>Datum Rođenja:</td>
	<td><input type="date" name="datumRodjenja" value="<?php echo $row['datumRodjenja']; ?>" required/></td>
	</tr>
	
	<tr><td><br></td></tr>
	
	<tr>
	<td>Adresa:</td>
	<td><input type="text" name="adresa" value="<?php echo $row['adresa']; ?>" required/></td>
	</tr>
	
	
	<tr><td><br></td></tr>
	
	<tr>
	<td>Grad:</td>
	<td><input type="text" name="grad" value="<?php echo $row['grad']; ?>" required/></td>
	</tr>
	
	<tr><td><br></td></tr>
	
	<tr>
	<td>Država:</td>
	<td><input type="text" name="drzava" value="<?php echo $row['drzava']; ?>" required /></td>
	</tr>
	
	<tr><td><br></td></tr>
	
	<tr>
	<td>Telefon:</td>
	<td><input type="text" name="telefon" value="<?php echo $row['telefon']; ?>" required/></td>
	</tr>
	
	<tr><td><br></td></tr>
	
	<tr>
	<td>Email:</td>
	<td><input type="email" name="email" value="<?php echo $row['email']; ?>" required/></td>
	</tr>
	
	
	<tr><td><br></td></tr>
	
	<input type="hidden" name="username" value="<?php echo $row['username']; ?>" />	
	<input type="hidden" name="password" value="<?php echo $row['password']; ?>" />
	
	<tr>
	<td><input type="submit"  value="Natrag" id="gumb"  onclick="history.go(-1);" />
	</td>
	<td><input type="submit"  value="Spremi promjene" id="gumb" />
	</td>
	</tr>
	</table>
	
	<br><br>
	
	
	</form>
	
	
	
	
	
      
    </div>
		
		<?php
}}}	else{
		include 'login.php';

		
}	
	?>
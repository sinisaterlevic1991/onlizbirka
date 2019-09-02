

<?php

if((isset($_SESSION['id_korisnika'])) or (isset($_SESSION['id_admina']))){

include 'login.php';

	
}	else{
		
		
if(isset($_POST['ime'])){

include 'konekcija.php';

$ime=$_POST['ime'];
$prezime=$_POST['prezime'];
$username=$_POST['username'];
$password=md5($_POST['password']);
$datumRodjenja=$_POST['datumRodjenja'];
$adresa=$_POST['adresa'];
$grad=$_POST['grad'];
$drzava=$_POST['drzava'];
$telefon=$_POST['telefon'];
$email=$_POST['email'];

$upit="SELECT username,email FROM `korisnici` WHERE username='".$username."' or email='".$email."'  ";
$result= $link->query($upit);
$row_cnt = $result->num_rows;

if($row_cnt > '0' ){ $provjera=false;}else{$provjera=true;}

if($provjera){


$var=mysqli_query($link,"insert into `korisnici` (id,ime,prezime,username,password,datumRodjenja,adresa,grad,drzava,telefon,email,ovlast) 
											VALUES (NULL,'$ime','$prezime','$username','$password','$datumRodjenja','$adresa','$grad','$drzava','$telefon','$email','Korisnik')");


if($var){
echo "<script> alert('Uspješno ste registrirani.');</script>";
include 'login.php';
}else {echo "<script> alert('Registracija nije uspjela.');</script>";}
//header("Location: index.php?akcija=login");
}else{

echo "<script> alert('Korisnik s unesenim email-om ili userom postoji');</script>";
//header("Location: index.php?akcija=registracija");
//include 'registracija.php';
}

}else{

?>

		<br><br>
		
	<form action="index.php?akcija=registracija" method="POST">
	<div class="tablereg"> 
	<table>
	<tr><td> 
	Ime:    </td>
	<td><input type="text" name="ime"  required /></td>
	</tr>
	
	<tr><td><br></td></tr>
	
	<tr>
	<td>Prezime:</td>
	<td><input type="text" name="prezime" required /></td>
	</tr>

	
	<tr><td><br></td></tr>
	
	<tr>
	<td>Username:</td>
	<td><input type="text" name="username" required /></td>
	</tr>
	
	<tr><td><br></td></tr>
	
	<tr>
	<td>Password:</td>
	<td><input type="password" name="password" required /></td>
	</tr>
	
	
	<tr><td><br></td></tr>
	
	<tr>
	<td>Datum Rođenja:</td>
	<td><input type="date" name="datumRodjenja" required /></td>
	</tr>
	
	<tr><td><br></td></tr>
	
	<tr>
	<td>Adresa:</td>
	<td><input type="text" name="adresa" required /></td>
	</tr>
	
	
	<tr><td><br></td></tr>
	
	<tr>
	<td>Grad:</td>
	<td><input type="text" name="grad" required /></td>
	</tr>
	
	<tr><td><br></td></tr>
	
	<tr>
	<td>Država:</td>
	<td><input type="text" name="drzava" required /></td>
	</tr>
	
	<tr><td><br></td></tr>
	
	<tr>
	<td>Telefon:</td>
	<td><input type="text" name="telefon" required /></td>
	</tr>
	
	<tr><td><br></td></tr>
	
	<tr>
	<td>Email:</td>
	<td><input type="email" name="email" required /></td>
	</tr>
	
	
	<tr><td><br></td></tr>
	
	<tr>
	<td><input type="submit"  value="Registriraj se" id="gumb"/>
	</td>
	</tr>
	</table>
	
	
	
	
	</form>
	
	
	
	
	
      
    </div>
	
		
		<?php
}	}
	?>
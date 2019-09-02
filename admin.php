<?php 

	if((isset($_SESSION['id_korisnika'])) or (isset($_SESSION['id_admina']))){
?>
<br><br>
<h2>Administracija</h2>
<br><br>
<?php if(isset($_SESSION['id_admina'])){?>
<button ONCLICK="window.location.href='index.php?akcija=login&radnja=korisnici'" id="gumb" > Ispis korisnika</button>&nbsp&nbsp
<?php }?>
<button ONCLICK="window.location.href='index.php?akcija=login&radnja=postavke'" id="gumb" > Uređivanje podataka</button>&nbsp&nbsp
<?php ?>
<button ONCLICK="window.location.href='index.php?akcija=login&radnja=lozinke'" id="gumb" > Izmjena lozinke</button>


<br><br>
<h2>Publikacije</h2>
<br><br>
<?php ?>
<button ONCLICK="window.location.href='index.php?akcija=login&radnja=dodavanjePublikacija'" id="gumb" > Dodaj publikaciju</button>&nbsp&nbsp
<?php ?>
<button ONCLICK="window.location.href='index.php?akcija=pretrazivanje'" id="gumb" > Ispis i uređivanje publikacija</button>&nbsp&nbsp

<button ONCLICK="window.location.href='index.php?akcija=login&radnja=mojePublikacije'" id="gumb" > Moje publikacije</button><br>
<br><br>



<?php
	}else{
		
		include "login.php";
		
		
	}	



?>
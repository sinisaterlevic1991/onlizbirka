<?php

include("konekcija.php");
session_start();





?>
<html>

	<head>
		<title>ONLIZbirka</title>
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="design.css" />
		<link rel="stylesheet" type="text/css" href="slide.css" />
		
	</head>

	<body>

		<div id="banner">
		<br><h1>ONLIZbirka</h1>
		
		- online zbirka -
		</div>
		
		<div id="poravnanje">
			<div id="lijeviizbornik">
			</div>
			<br><br><br><br><br><br><br>
			
			<ul class="nav">
				
				
				
 <?php if((isset($_SESSION['id_korisnika'])) or (isset($_SESSION['id_admina']))){
	 echo "<div id='user'>";
							if(isset($_SESSION['id_korisnika'])) { $id=$_SESSION['id_korisnika'];}else{$id=$_SESSION['id_admina'];}
							
							
							$upit="SELECT * FROM `korisnici` WHERE id='".$id."'   ";
							$result= $link->query($upit);
							echo "<h3>Dobrodošao <b>"; 
							
							
							while($row=$result->fetch_assoc()){
							
							echo  $row['ime'];
							echo "</b>!</h3> ";   

			
	
	}
	echo "</div>";
	}
	 
			
	 
 ?>
				
				
				
				<div>
				<li <?php if((@$_GET['akcija']=='izbornik') or !isset($_GET['akcija']) ){ ?> class="active"> <?php }else{ echo ">";} ?><a href="index.php"  class="butunknjige1" ><b>Početna</b></a></li>
				</div>
				
				
				<div>
				<li <?php if(@$_GET['akcija']=='pretrazivanje' ){ ?> class="active"> <?php }else{ echo ">";} ?><a href="index.php?akcija=pretrazivanje"  class="butunknjige3"><b>Pretraživanje</b></a></li>
				</div>
				
				<div>
				<li <?php if(@$_GET['akcija']=='kontakt' ){ ?> class="active"> <?php }else{ echo ">";} ?><a href="index.php?akcija=kontakt" class="butunknjige4"><b>Kontakt</b></a></li>
				</div>		
				
				
				
				
				<?php																																													
							
	if(@$_GET['akcija']=='login' ){
	
	if((isset($_SESSION['id_korisnika'])) or (isset($_SESSION['id_admina']))){if((isset($_SESSION['id_admina']))){echo "<div><li class='active' ><a href='index.php?akcija=login' class='butunknjige5'><b>Admin panel</b></a></li></div>";}else{if((isset($_SESSION['id_korisnika']))){echo "<div><li class='active' ><a href='index.php?akcija=login'  class='butunknjige5'><b>User panel</b></a></li></div>";}} }else{echo "<div><li class='active'><a href='?akcija=login'   class='butunknjige5'><b>Login</b></a></li></div>";}
	if((isset($_SESSION['id_korisnika'])) or (isset($_SESSION['id_admina']))){ echo "<div><li ><a href='logout.php'  class='butunknjige3'><b>Odjava</b></a></li></div>";}
			
	}else{
		
		
	if((isset($_SESSION['id_korisnika'])) or (isset($_SESSION['id_admina']))){if((isset($_SESSION['id_admina']))){echo "<div><li><a href='index.php?akcija=login' class='butunknjige5'><b>Admin panel</b></a></li></div>";}else{if((isset($_SESSION['id_korisnika']))){echo "<div><li><a href='index.php?akcija=login'  class='butunknjige5'><b>User panel</b></a></li></div>";}} }else{echo "<div><li><a href='?akcija=login'   class='butunknjige5'><b>Login</b></a></li></div>";}
	if((isset($_SESSION['id_korisnika'])) or (isset($_SESSION['id_admina']))){ echo "<div><li><a href='logout.php'  class='butunknjige3'><b>Odjava</b></a></li></div>";}
		
		
	}	
			
			
			?>
	



			
				</ul>
				
				</div>
	  
	  
  <div id="desno">
	
		
  
  
</div>
  
   
	<div id="srednjidio" align="center" >
	<br><br>
	
	<?php

	if((@$_GET['akcija']=='izbornik') or (!isset($_GET['akcija']))){include('pocetna.php');}
	
	if(@$_GET['akcija']=='pretrazivanje'){include('pretrazivanje.php');}
	if(@$_GET['akcija']=='kontakt'){include('kontakt.php');}
	if(@$_GET['akcija']=='login'){
		
		if(@$_GET['radnja']==''){include('admin.php');}
		if(@$_GET['radnja']=='korisnici'){include('korisnici.php');}
		if(@$_GET['radnja']=='postavke'){include('postavke.php');}
		if(@$_GET['radnja']=='lozinke'){include('lozinke.php');}
		if(@$_GET['radnja']=='dodavanjePublikacija'){include('dodavanjePublikacija.php');}
		if(@$_GET['radnja']=='vise'){include('komentarOcjena.php');}
		if(@$_GET['radnja']=='mojePublikacije'){include('mojePublikacije.php');}
		if(@$_GET['radnja']=='urediPublikaciju'){include('urediPublikaciju.php');}
		}
		
	if(@$_GET['akcija']=='registracija'){include('registracija.php');}
	


	?>
	
	</div>

		


		
</body>
</html>
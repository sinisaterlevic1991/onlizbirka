<?php 

	if((isset($_SESSION['id_admina']))){
		 include ('konekcija.php');
?>


<br>
 <h3><p>Pretraživanje korisnika</p></h3>
    
    <form  method="get" action="index.php?akcija=login&radnja=korisnici0"  id="searchform">
      <input  type="text" name="name"  />
	   <input  type="hidden" name="akcija" value="login"  />
	    <input  type="hidden" name="radnja" value="korisnici"  />
      <input  type="submit"  value="Traži" id="gumb">
    </form><br>

	<div class="ispis">

<?php


	
	@$name=$_GET['name'];
	
	if(@$name){$provjera=true;}else{$provjera=false;}


	$sort = "";
		if(isset($_GET['sort'])){
			switch($_GET['sort']){
				case 0:
				$sort = " ORDER BY id DESC"; 
                break;
				
				case 1:
				$sort = " ORDER BY id ASC"; 
                break;
				
				case 2:
				$sort = " ORDER BY username DESC"; 
                break;
				
				case 3:
				$sort = " ORDER BY username ASC"; 
                break;
				
				case 4:
				$sort = " ORDER BY ime DESC"; 
                break;
				
				case 5:
				$sort = " ORDER BY ime ASC"; 
                break;
				
				case 6:
				$sort = " ORDER BY prezime DESC"; 
                break;
				
				case 7:
				$sort = " ORDER BY prezime ASC"; 
                break;
			}
			
			
			
		}



//@$name=$_GET['name'];


if(@$name){  
      if(preg_match("/^[  a-zA-Z]+/", $_GET['name'])){
		  
  //$query = "SELECT * FROM korisnici WHERE username LIKE '%" . @$name .  "%' OR ime LIKE '%" . @$name ."%' OR prezime LIKE '%" . @$name . "%' $sort";
	  
  
 
  
  $sql="SELECT id,username,ime, prezime,ovlast FROM korisnici WHERE username LIKE '%" . @$name .  "%' OR ime LIKE '%" . @$name ."%' OR prezime LIKE '%" . @$name . "%' $sort ";
  
  $result=mysqli_query($link, $sql);
   
	print("<table border='1' style=\"font-family: verdana\"");
	print("<tr> <th><b>Id</b> </th>
	
	<th>");
	?>
		
	<a href='index.php?akcija=login&radnja=korisnici&sort=0&name=<?php echo $name; ?>'><img width='15' height='15' src='images/gore.jpg' /></a>
	<a href='index.php?akcija=login&radnja=korisnici&sort=1&name=<?php echo $name; ?>'><img width='15' height='15' src='images/dolje.jpg' /></a>
	
	
	</th><th><b>Korisničko ime</b></th>
	<th>
	
	<a href='index.php?akcija=login&radnja=korisnici&sort=2&name=<?php echo $name; ?>'><img width='15' height='15' src='images/gore.jpg' /></a>
	<a href='index.php?akcija=login&radnja=korisnici&sort=3&name=<?php echo $name; ?>'><img width='15' height='15' src='images/dolje.jpg' /></a>
	
	
	</th>



	<th><b>Ime</b></th> 
	
	
	<th>
	
	<a href='index.php?akcija=login&radnja=korisnici&sort=4&name=<?php echo $name; ?>'><img width='15' height='15' src='images/gore.jpg' /></a>
	<a href='index.php?akcija=login&radnja=korisnici&sort=5&name=<?php echo $name; ?>'><img width='15' height='15' src='images/dolje.jpg' /></a>
	
	
	</th>
	
	
	
	<th><b>Prezime</b></th>
	
	<th>
	
	<a href='index.php?akcija=login&radnja=korisnici&sort=6&name=<?php echo $name; ?>'><img width='15' height='15' src='images/gore.jpg' /></a>
	<a href='index.php?akcija=login&radnja=korisnici&sort=7&name=<?php echo $name; ?>'><img width='15' height='15' src='images/dolje.jpg' /></a>
	
	
	</th>

	<th><b>Ovlast</b></th> <th><b>Uređivanje</b></th></tr>
	<?php
 
	$id=$_SESSION['id_admina'];
	while($row = $result->fetch_array()){ 
		
			If($id==$row['id']){$provjera=false;}else{$provjera=true;}
			
			if($provjera){
			
print("<tr><td colspan='2'>" . @$row["id"] . "</td>  <td  colspan='2'>" . @$row["username"] . "</td> <td  colspan='2'>" . @$row["ime"] . "</td> <td colspan='2'>" . @$row["prezime"] . "</td> <td>" . @$row["ovlast"] . "</td> <td>     <a href='ovlasti.php?id=".@$row['id']."'><img width='20' height='20' title='Dodavanje ovlasti' src='images/ovlast.png' /></a>  					    <a href='izbrisiKorisnika.php?id=".@$row['id']."'><img width='20' height='20' title='Obriši korisnika' src='images/izbrisi.png' /></a></td></tr>");   					
				
			}else{
print("<tr><td colspan='2'>" . @$row["id"] . "</td>  <td  colspan='2'>" . @$row["username"] . "</td> <td  colspan='2'>" . @$row["ime"] . "</td> <td colspan='2'>" . @$row["prezime"] . "</td> <td>" . @$row["ovlast"] . "</td> <td>-</td></tr>");   						
			}
			
  }
  
  
 
  }
  
  else { 
  
  echo "<script> alert ('Nema takvog !!!!!!');</script>";
  }
	
	
	
	
}else{
	
	$query="SELECT * FROM `podaci`  $sort ";
        $result= $link->query($query);	
	
	$sql="SELECT id,username,ime, prezime,ovlast FROM korisnici $sort ";
  
  $result=mysqli_query($link, $sql);
  $id=$_SESSION['id_admina'];
	print("<table border='1' class='koris' style=\"font-family: verdana\""); 
	print("<tr><th><b>Id</b></th>	<th>");
	
	?>
	
		
	<a href='index.php?akcija=login&radnja=korisnici&sort=0&name=<?php echo $name; ?>'><img width='15' height='15' src='images/gore.jpg' /></a>
	<a href='index.php?akcija=login&radnja=korisnici&sort=1&name=<?php echo $name; ?>'><img width='15' height='15' src='images/dolje.jpg' /></a>
	
	
	</th><th><b>Username</b></th>
	<th>
	
	<a href='index.php?akcija=login&radnja=korisnici&sort=2&name=<?php echo $name; ?>'><img width='15' height='15' src='images/gore.jpg' /></a>
	<a href='index.php?akcija=login&radnja=korisnici&sort=3&name=<?php echo $name; ?>'><img width='15' height='15' src='images/dolje.jpg' /></a>
	
	
	</th>



	<th><b>Ime</b></th> 
	
	
	<th>
	
	<a href='index.php?akcija=login&radnja=korisnici&sort=4&name=<?php echo $name; ?>'><img width='15' height='15' src='images/gore.jpg' /></a>
	<a href='index.php?akcija=login&radnja=korisnici&sort=5&name=<?php echo $name; ?>'><img width='15' height='15' src='images/dolje.jpg' /></a>
	
	
	</th>
	
	
	
	<th><b>Prezime</b></th>
	
	<th>
	
	<a href='index.php?akcija=login&radnja=korisnici&sort=6&name=<?php echo $name; ?>'><img width='15' height='15' src='images/gore.jpg' /></a>
	<a href='index.php?akcija=login&radnja=korisnici&sort=7&name=<?php echo $name; ?>'><img width='15' height='15' src='images/dolje.jpg' /></a>
	
	
	</th>

<th><b>Ovlast</b></th> <th colspan='2'><b>Uređivanje</b></th></tr>

<?php 
	
	while($row = $result->fetch_array()){
		
			
			
			If($id==$row['id']){$provjera=false;}else{$provjera=true;}
			
			if($provjera){
			
print("<tr><td colspan='2'>" . @$row["id"] . "</td>  <td colspan='2'>" . @$row["username"] . "</td> <td  colspan='2'>" . @$row["ime"] . "</td> <td  colspan='2'>" . @$row["prezime"] . "</td> <td>" . @$row["ovlast"] . "</td> <td>     <a href='ovlasti.php?id=".@$row['id']."'><img width='20' height='20' title='Dodavanje ovlasti' src='images/ovlast.png' /></a>  </td><td>              				<a href='izbrisiKorisnika.php?id=".@$row['id']."'><img width='20' height='20' title='Obriši korisnika' src='images/izbrisi.png' /></a>  </td></tr>");   					
				
			}else{
print("<tr><td colspan='2'>" . @$row["id"] . "</td>  <td  colspan='2'>" . @$row["username"] . "</td> <td  colspan='2'>" . @$row["ime"] . "</td> <td  colspan='2'>" . @$row["prezime"] . "</td> <td>" . @$row["ovlast"] . "</td> <td>-</td> <td>-</td></tr>");   						
			}

  }
	
}

	}else{
		
		include "login.php";
		
		
	}	
?>		<br></table>
<br>
		<input type="button" value="Natrag" id="gumb" onclick="history.go(-1);" />
		
		<br><br>
		</div>

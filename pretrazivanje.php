
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
<div class="forma">

    <h3><p>Pretraživanje po ključnoj riječi.</p></h3>
    
    <form  method="GET" action="index.php?akcija=pretrazivanje"  id="searchform">
<input  type="hidden" name="akcija" value="pretrazivanje"  />
	<input  type="text" name="name"  />
      <input  type="submit" value="Traži" id="gumb">
    </form><br>
	
	</div>
	
	<div class="ispis">
	
	<?php
	include 'konekcija.php';
	
	@$name=$_GET['name'];
	
	if(@$name){$provjera=true;}else{$provjera=false;}
	
?>	

	<table class="pretra" style="font-family: verdana"\>
	<tr>
	<th><b>ID 
	</th><th> <a href="index.php?akcija=pretrazivanje&sort=0&name=<?php echo $name; ?>"><img width="15" height="15" src="images/gore.jpg" /></a>
	<a href="index.php?akcija=pretrazivanje&sort=1&name=<?php echo $name; ?>"><img width="15" height="15" src="images/dolje.jpg" /></a>
	</b></th> 
		<th><b>Slika
		</b></th> 
	<th><b>Vrsta
	</th><th> <a href="index.php?akcija=pretrazivanje&sort=2&name=<?php echo $name; ?>"><img width="15" height="15" src="images/gore.jpg" /></a>
	<a href="index.php?akcija=pretrazivanje&sort=3&name=<?php echo $name; ?>"><img width="15" height="15" src="images/dolje.jpg"/></a>
	</b></th> 
	
	<th><b>Naziv 
	</th><th> <a href="index.php?akcija=pretrazivanje&sort=4&name=<?php echo $name; ?>"><img width="15" height="15" src="images/gore.jpg" /></a>
	<a href="index.php?akcija=pretrazivanje&sort=5&name=<?php echo $name; ?>"><img width="15" height="15" src="images/dolje.jpg" /></a>
	</b></th> 
	
	<th><b>Autor 
	</th><th> <a href="index.php?akcija=pretrazivanje&sort=6&name=<?php echo $name; ?>"><img width="15" height="15" src="images/gore.jpg" /></a>
	<a href="index.php?akcija=pretrazivanje&sort=7&name=<?php echo $name; ?>"><img width="15" height="15" src="images/dolje.jpg" /></a>
	</b></th> 
	
	<th><b>Godina 
	</th><th> <a href="index.php?akcija=pretrazivanje&sort=8&name=<?php echo $name; ?>"><img width="15" height="15" src="images/gore.jpg" /></a>
	<a href="index.php?akcija=pretrazivanje&sort=9&name=<?php echo $name; ?>"><img width="15" height="15" src="images/dolje.jpg" /></a>
	</b></th> 
	
	<th><b>Izdavač 
	</th><th> <a href="index.php?akcija=pretrazivanje&sort=15&name=<?php echo $name; ?>"><img width="15" height="15" src="images/gore.jpg" /></a>
	<a href="index.php?akcija=pretrazivanje&sort=11&name=<?php echo $name; ?>"><img width="15" height="15" src="images/dolje.jpg" /></a>
	</b></th>
	<?php if((isset($_SESSION['id_korisnika'])) or (isset($_SESSION['id_admina']))){ ?>
	
	<th colspan="4">
			Uređivanje/Preuzimanje 
	
	</th>
	<?php } ?>
	</tr>
<?php


	$sort = "";
        if(isset($_GET['sort'])) {
            switch ($_GET['sort'] ) {
            case 0: 
                        $sort = " ORDER BY id DESC"; 
                        break;
            case 1:
                        $sort = " ORDER BY id ASC ";
                        break;
            case 2:
                        $sort = ' ORDER BY idVrsta DESC';
                        break;
            case 3:
                        $sort = ' ORDER BY idVrsta ASC'; 
                        break;
            case 4: 
                        $sort = ' ORDER BY naziv DESC';
                        break;
            case 5:
                        $sort = ' ORDER BY naziv ASC';
                        break;
            case 6:
                        $sort = ' ORDER BY autor DESC';
                        break;           
			case 7:
                        $sort = ' ORDER BY autor ASC';
                        break;           
			case 8:
                        $sort = ' ORDER BY godina DESC';
                        break;           
            case 9:
                        $sort = ' ORDER BY godina ASC';
                        break;           
			case 15:
                        $sort = ' ORDER BY izdavac DESC';
                        break;           
			case 11:
                        $sort = ' ORDER BY izdavac ASC';
                        break;           
						}
        }
		
		
if($provjera){
	$query = "SELECT * FROM podaci WHERE autor LIKE '%" . @$name .  "%' OR naziv LIKE '%" . @$name ."%' OR izdavac LIKE '%" . @$name . "%' $sort";
	    $result= $link->query($query);



		
		while($row=$result->fetch_assoc()){
		
			echo "            <tr>\r\n";
          
            echo "                <td colspan='2'><a href='index.php?akcija=login&radnja=vise&id=".$row['id']."'>" . $row['id'] . "</a></td>\r\n";
			echo "<td><img src=\"imageView.php?idSlike=" . $row["id"] . "\" width='50' height=''50></td>\r\n";
$upit1="SELECT * FROM `vrsta` ";			
$result1= $link->query($upit1);			
        while($row1=$result1->fetch_assoc()){ if($row['idVrsta']==$row1['id']){   
			
			echo "                <td colspan='2'>" . $row1['nazivKategorije'] . "</td>\r\n";
		}}
			
			
			echo "                <td colspan='2'>" . $row['naziv'] . "</td>\r\n";
			
            echo "                <td colspan='2'>" . $row['autor'] . "</td>\r\n";
            echo "                <td colspan='2'>" . $row['godina'] . "</td>\r\n";
            echo "                <td colspan='2'>" . $row['izdavac'] . "</td>\r\n";
			
			
		
				if((isset($_SESSION['id_korisnika'])) or (isset($_SESSION['id_admina']))){
					
				if((isset($_SESSION['id_korisnika']))){
					if($row['idKorisnika']==$_SESSION['id_korisnika']){
			echo "          <td><a href='index.php?akcija=login&radnja=urediPublikaciju&id=".@$row['id']."'><img width='35' height='35' title='Uredi publikaciju' src='images/edit.png' /></a> </td>
							<td><a href='obrisiPublikaciju.php?id=".@$row['id']."'><img width='35' height='35' title='Obriši publikaciju' src='images/izbrisi.png' /></a></td>
							<td><a href='preuzimanje.php?id=".@$row['id']."'><img width='35' height='35' title='Preuzmi prilog' src='images/preuzimanje.jpg' /></a> </td>
							<td><a href='index.php?akcija=login&radnja=vise&id=".@$row['id']."'><img width='35' height='35' title='Komentari' src='images/komentar.jpg' /></a> </td>";
					
				}else{echo "<td>-</td> 
							<td>-</td>
							<td><a href='preuzimanje.php?id=".@$row['id']."'><img width='35' height='35' title='Preuzmi prilog' src='images/preuzimanje.jpg' /></a></td> 
							<td><a href='index.php?akcija=login&radnja=vise&id=".@$row['id']."'><img width='35' height='35' title='Komentari' src='images/komentar.jpg' /></a> </td>";}
				}else{
					echo " 	<td><a href='index.php?akcija=login&radnja=urediPublikaciju&id=".@$row['id']."'><img width='35' height='35' title='Uredi publikaciju' src='images/edit.png' /></a> </td> 
							<td><a href='obrisiPublikaciju.php?id=".@$row['id']."'><img width='35' height='35' title='Obriši publikaciju' src='images/izbrisi.png' /></a></td>
							<td><a href='preuzimanje.php?id=".@$row['id']."'><img width='35' height='35' title='Preuzmi prilog' src='images/preuzimanje.jpg' /></a> </td>
							<td><a href='index.php?akcija=login&radnja=vise&id=".@$row['id']."'><img width='35' height='35' title='Komentari' src='images/komentar.jpg' /></a> </td>";
					
				}
				}else{
				

			
			}
            echo "            </tr>\r\n";
        }
        echo "       <br><br><br> </table>\r\n"; 
		
		
    
	}
	else{
		$query="SELECT * FROM `podaci`  $sort ";
        $result= $link->query($query);
		
		while($row=$result->fetch_assoc()){
		
			echo "            <tr>\r\n";
          //  echo "                <td>nesto</td>\r\n";
            echo "                <td colspan='2'><a href='index.php?akcija=login&radnja=vise&id=".@$row['id']."'>" . $row['id'] . "</a></td>\r\n";
			echo "<td><img src=\"imageView.php?idSlike=" . $row["id"] . "\" width='50' height='50'></td>\r\n";
          $upit1="SELECT * FROM `vrsta` ";
$result1= $link->query($upit1);
        while($row1=$result1->fetch_assoc()){ if($row['idVrsta']==$row1['id']){   
			
			echo "                <td colspan='2'>" . $row1['nazivKategorije'] . "</td>\r\n";
		}}

		  echo "                <td colspan='2'>" . $row['naziv'] . "</td>\r\n";
            echo "                <td colspan='2'>" . $row['autor'] . "</td>\r\n";
            echo "                <td colspan='2'>" . $row['godina'] . "</td>\r\n";
            echo "                <td colspan='2'>" . $row['izdavac'] . "</td>\r\n";
		
				if((isset($_SESSION['id_korisnika'])) or (isset($_SESSION['id_admina']))){
					
				if((isset($_SESSION['id_korisnika']))){
					if($row['idKorisnika']==$_SESSION['id_korisnika']){
			echo "              <td><a href='index.php?akcija=login&radnja=urediPublikaciju&id=".@$row['id']."'><img width='35' height='35' title='Uredi publikaciju' src='images/edit.png' /></a> </td> 
								<td><a href='obrisiPublikaciju.php?id=".@$row['id']."'><img width='35' height='35' title='Obriši publikaciju' src='images/izbrisi.png' /></a></td>
								<td><a href='preuzimanje.php?id=".@$row['id']."'><img width='35' height='35' title='Preuzmi prilog' src='images/preuzimanje.jpg' /></a> </td>
								<td><a href='index.php?akcija=login&radnja=vise&id=".@$row['id']."'><img width='35' height='35' title='Komentari' src='images/komentar.jpg' /></a> </td>";
					
				}else{echo" 	<td>-</td>
								<td>-</td>
								<td><a href='preuzimanje.php?id=".@$row['id']."'><img width='35' height='35' title='Preuzmi prilog' src='images/preuzimanje.jpg' /></a></td> 
								<td><a href='index.php?akcija=login&radnja=vise&id=".@$row['id']."'><img width='35' height='35' title='Komentari' src='images/komentar.jpg' /></a> </td>";}
				}else{
					echo "      <td><a href='index.php?akcija=login&radnja=urediPublikaciju&id=".@$row['id']."'><img width='35' height='35' title='Uredi publikaciju' src='images/edit.png' /></a> </td>
								<td><a href='obrisiPublikaciju.php?id=".@$row['id']."'><img width='35' height='35' title='Obriši publikaciju' src='images/izbrisi.png' /></a></td>
								<td><a href='preuzimanje.php?id=".@$row['id']."'><img width='35' height='35' title='Preuzmi prilog' src='images/preuzimanje.jpg' /></a> </td>
								<td><a href='index.php?akcija=login&radnja=vise&id=".@$row['id']."'><img width='35' height='35' title='Komentari' src='images/komentar.jpg' /></a> </td>";				
					
				}
				}else{
				

			
			}
            echo "            </tr>\r\n";
        }
        echo "        </table>\r\n"; 
    
	}
	?>
	<br>
	<br>
	</div>
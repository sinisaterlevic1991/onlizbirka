<?php


	
include 'konekcija.php';

$idPublikacije=$_GET['id'];	

$upit1="SELECT * FROM `vrsta` ORDER BY nazivKategorije ASC";
$result1= $link->query($upit1);

$upit="SELECT * FROM `podaci` WHERE  id=$idPublikacije";
$result= $link->query($upit);

$sql1="SELECT * FROM `ocjene` WHERE  idPublikacije=$idPublikacije";
$result21= $link->query($sql1);
@$brojac = $result21->num_rows;

$sql11="SELECT SUM(ocjena) FROM `ocjene` WHERE  idPublikacije=$idPublikacije";
$result211= $link->query($sql11);
$row111 = $result211->fetch_array();

$suma=$row111[0];

@$prosjek=$suma/$brojac;

if($prosjek==null){$prosjek="-";}
	
while($row = $result->fetch_array()){
	?>
	<table  style="size:30em" font="size:'6'">
	
	
	
	
	
<tr><td rowspan='7'>
 
 <img src="imageView.php?idSlike=<?php echo $_GET['id']; ?>" width='300' height='360' />
 
 </td>
 <?php
$upit2="SELECT * FROM `vrsta` WHERE id NOT like '".$row['idVrsta']."' ORDER BY nazivKategorije ASC";
$result2= $link->query($upit2);

////////////////////////////////////////////////////////////////////////////////	
?>	
<br><br>

	
	
	<input type="hidden" name="idPublikacije" value="<?php  echo $_GET['id']; ?>" />
		<td>
	Id publikacije:
	</td><td><b><?php echo $_GET['id']; ?></b></td>
	</tr>
	
	<tr><td> 
	Vrsta dijela:     </td>
	<td>
	
	
	<?php 
	
	while($row1 = $result1->fetch_array()){
		
	if($row['idVrsta']==$row1['id']){
	
	echo $row1['nazivKategorije']; 
		
	
	}
	
	}


?>	
	</select>
	</td>
	</tr>
	
	
	<tr><td> 
	Naziv djela:     </td>
	<td><?php echo $row['naziv']; ?></td>
	</tr>
	
	
	
	<tr>
	<td>Autor djela: </td>
	<td><?php echo $row['autor']; ?></td>
	</tr>
	

	
	<tr>
	<td>Godina izdavanja:</td>
	<td><?php echo $row['godina']; ?></td>
	</tr>
	
	
	
	<tr>
	<td>Izdavač:</td>
	<td><?php echo $row['izdavac']; ?></td>
	</tr>
	<tr>
	<td>Ocjena:</td>
	<td><b><?php echo (round($prosjek, 2)); ?></b></td>
	<tr><td>      </td></tr>
	<tr><td>      </td></tr>
	</tr>
	
	<tr>
	<td colspan='3'><input type="button"  value="Natrag" id="gumb" onclick="history.go(-1);"/>
	</td>
	<tr><td>      </td></tr>
	<tr><td>      </td></tr>
	
	</tr>
	
	
<?php 

if((isset($_SESSION['id_korisnika'])) or (isset($_SESSION['id_admina']))){
if(isset($_SESSION['id_korisnika'])){$id=$_SESSION['id_korisnika'];}else{$id=$_SESSION['id_admina'];}

$upit11="SELECT * FROM `ocjene` WHERE idKorisnika='".$id."' AND idPublikacije='".$idPublikacije."'";
$result11= $link->query($upit11);
$row_cnt = $result11->num_rows;

if($row_cnt<1){
?>	
	
	
	<form action="ocjena.php" method="POST" >
	<input type="hidden" name="id" value="<?php echo $id; ?>" />
	<input type="hidden" name="idPublikacije" value="<?php echo $idPublikacije; ?>" />
	<tr><td colspan='3'>  
	<input type="radio" name="ocjena" value="1" /> 
	<input type="radio" name="ocjena" value="2" />	
	<input type="radio" name="ocjena" value="3" />	
	<input type="radio" name="ocjena" value="4" />
	<input type="radio" name="ocjena" value="5" />
	&nbsp &nbsp  
	</td><td>
	<button type="submit" id="gumb">Ocjeni!</button>
	<tr><td colspan='3'>  1   &nbsp&nbsp 2 &nbsp 3&nbsp 4&nbsp&nbsp 5</td></tr>
	</form>
<?php }
 ?>	<form action="komentar.php" method="post" >
	<tr ><td rowspan="3" colspan='1'>  Unesi komentar: </td><td colspan="2"><textarea name="komentar"> </TEXTAREA> </td>
	<input type="hidden" name="datum" value="<?php echo $today= date("d.m.Y H:i:s");?>" />
	<input type="hidden" name="id" value="<?php echo $id; ?>" />
	<input type="hidden" name="idPublikacije" value="<?php echo $idPublikacije; ?>" />
	<td><button type="submit" id="gumb">Komentiraj!</button></td></tr>
	</form>
	</table>
	
	<br><br>
<!-- ------------------------------------------------- -- -->	
<table border='1'>
<th>Username</th><th>Komentari</th>
<?php
include"konekcija.php";

$upit12="SELECT * FROM `komentari` WHERE idPublikacije='$idPublikacije' ORDER BY datum DESC ";			
$result12= $link->query($upit12);	
		
while($row12=$result12->fetch_assoc()){

$upit122="SELECT * FROM `korisnici` ";			
$result122= $link->query($upit122);	
	
			?>
			
<tr>
<td>
<?php 
while($row122=$result122->fetch_assoc()){
 if($row12['idKorisnika']==$row122['id']){
	echo $row122['username']; 
 }
}?>
</td>
<td>
<?php echo $row12['komentar']; ?>
</td>
<!-- 
<td>
<?php echo $row12['datum']; ?>
</td>
-->
</tr>
<?php
		}
		?>
</table>	
	
	
<!-- ------------------------------------------------- -- -->		
	</form>
	
<?php
}}
?>
 
 
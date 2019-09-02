<?php 
if((isset($_SESSION['id_korisnika'])) or (isset($_SESSION['id_admina']))){
	
$idPublikacije=$_GET['id'];	
include "konekcija.php";

$upit1="SELECT * FROM `vrsta` ORDER BY nazivKategorije ASC";
$result1= $link->query($upit1);


	
if(isset($_SESSION['id_korisnika'])) { 
//ovdje korisnik dela

$id=$_SESSION['id_korisnika'];
include "konekcija.php";

$upit="SELECT * FROM `podaci` WHERE idKorisnika=$id AND id=$idPublikacije";
$result= $link->query($upit);
	
while($row = $result->fetch_array()){
	
$upit2="SELECT * FROM `vrsta` WHERE id NOT like '".$row['idVrsta']."' ORDER BY nazivKategorije ASC";
$result2= $link->query($upit2);

////////////////////////////////////////////////////////////////////////////////	
?>	
<br><br>
<form name="frmImage" enctype="multipart/form-data" action="azurirajPublikaciju.php" method="post" id="frmImage" class="frmImageUpload">
	<div class="tablereg"> 
	<table >
	<input type="hidden" name="idPublikacije" value="<?php  echo $_GET['id']; ?>" />
		<tr><td>
	Id publikacije:
	</td><td><b><?php echo $_GET['id']; ?></b></td></tr>
	<tr><td><br></td></tr>
	<tr><td> 
	Vrsta dijela:     </td>
	<td>
	<select name="odabir" id="odabir" form="frmImage" required>
	
	<?php 
	
	while($row1 = $result1->fetch_array()){
	if($row['idVrsta']==$row1['id']){
		?>
		<option value="<?php echo $row1['id']; ?>"> <?php echo $row1['nazivKategorije']; ?></option>
		
		<?php
	}
	
	}

	while($row2 = $result2->fetch_array()){
	
	?>

<option value="<?php echo $row2['id']; ?>"><?php echo $row2['nazivKategorije']; ?></option>	

<?php 

} 

?>	
	</select>
	</td>
	</tr>
	
	<tr><td><br></td></tr>
	
	<tr><td> 
	Naziv djela:     </td>
	<td><input type="text" name="naziv"   value="<?php echo $row['naziv']; ?>" required /></td>
	</tr>
	
	<tr><td><br></td></tr>
	
	<tr>
	<td>Autor djela: </td>
	<td><input type="text" name="autor" value="<?php echo $row['autor']; ?>" required /></td>
	</tr>

	
	<tr><td><br></td></tr>
	
	<tr>
	<td>Godina izdavanja:</td>
	<td><input type="text" name="godina" value="<?php echo $row['godina']; ?>" required /></td>
	</tr>
	
	<tr><td><br></td></tr>
	
	<tr>
	<td>Izdavač:</td>
	<td><input type="text" name="izdavac" value="<?php echo $row['izdavac']; ?>" required /></td>
	</tr>
	<tr><td><br></td></tr>
	
	<tr>
	<td><input type="button"  value="Natrag" id="gumb" onclick="history.go(-1);"/>
	</td>
	<td><input type="submit"  value="Ažuriraj publikaciju u bazi" id="gumb"/>
	</td>
	</tr>
	</table>
	
	<br><br>
	
	
	</form>
	
	

<?php
///////////////////////////////////////////////////////////////////////////////
	}


}else{
//ovdje admin ako ima tj sve	
$id=$_SESSION['id_admina'];
///////////////////////////////////////////////////////////////////////
$upit="SELECT * FROM `podaci` WHERE  id=$idPublikacije";
$result= $link->query($upit);
	
while($row = $result->fetch_array()){
	
$upit2="SELECT * FROM `vrsta` WHERE id NOT like '".$row['idVrsta']."' ORDER BY nazivKategorije ASC";
$result2= $link->query($upit2);

?>
	
<br><br>
<form name="frmImage" enctype="multipart/form-data" action="azurirajPublikaciju.php" method="post" id="frmImage" class="frmImageUpload">
	<div class="tablereg"> 
	<table>
	<input type="hidden" name="idPublikacije" value="<?php  echo $_GET['id']; ?>" />
	<tr><td>
	Id publikacije:
	</td><td><b><?php echo $_GET['id']; ?></b></td></tr>
	<tr><td><br></td></tr>
	<tr><td> 
	Vrsta dijela:     </td>
	<td>
	<select name="odabir" id="odabir" form="frmImage" required>
	
	<?php 
	
	while($row1 = $result1->fetch_array()){
	if($row['idVrsta']==$row1['id']){
		?>
		<option value="<?php echo $row1['id']; ?>"> <?php echo $row1['nazivKategorije']; ?></option>
		
		<?php
	}
	
	}

	while($row2 = $result2->fetch_array()){
	
	?>

<option value="<?php echo $row2['id']; ?>"><?php echo $row2['nazivKategorije']; ?></option>	

<?php 

} 

?>	
	</select>
	</td>
	</tr>
	
	<tr><td><br></td></tr>
	
	<tr><td> 
	Naziv djela:     </td>
	<td><input type="text" name="naziv"   value="<?php echo $row['naziv']; ?>" required /></td>
	</tr>
	
	<tr><td><br></td></tr>
	
	<tr>
	<td>Autor djela: </td>
	<td><input type="text" name="autor" value="<?php echo $row['autor']; ?>" required /></td>
	</tr>

	
	<tr><td><br></td></tr>
	
	<tr>
	<td>Godina izdavanja:</td>
	<td><input type="text" name="godina" value="<?php echo $row['godina']; ?>" required /></td>
	</tr>
	
	<tr><td><br></td></tr>
	
	<tr>
	<td>Izdavač:</td>
	<td><input type="text" name="izdavac" value="<?php echo $row['izdavac']; ?>" required /></td>
	</tr>
	<tr><td><br></td></tr>
	
	<tr>
	<td><input type="button"  value="Natrag" id="gumb" onclick="history.go(-1);"/>
	</td>
	<td><input type="submit"  value="Ažuriraj publikaciju u bazi" id="gumb"/>
	</td>
	</tr>
	</table>
	
	<br><br>
	
	
	</form>
	
	

	
	
	
	
	<?php
///////////////////////////////////////////////////////////////////////////////
}}


?>





<?php
	}else{
		
		include "login.php";
		
		
	}	
?>
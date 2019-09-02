<?php

if((isset($_SESSION['id_korisnika'])) or (isset($_SESSION['id_admina']))){

if(isset($_SESSION['id_korisnika'])){$id=$_SESSION['id_korisnika'];}else{$id=$_SESSION['id_admina'];}

if((isset($_POST['odabir']))){

if($_POST['odabir']!=0){

if(count($_FILES) > 0) {
	
	

@$naziv=$_POST['naziv'];
@$autor=$_POST['autor'];
@$godina=$_POST['godina'];
@$izdavac=$_POST['izdavac'];
echo @$odabir=$_POST['odabir'];
	

if(is_uploaded_file($_FILES['userImage']['tmp_name'])) {
	include "konekcija.php";
	
	$imgData =addslashes(file_get_contents($_FILES['userImage']['tmp_name']));
	$imageProperties = getimageSize($_FILES['userImage']['tmp_name']);
	
	$fileType = $_FILES['userData']['type'];
	$tmpName  = $_FILES['userData']['tmp_name'];

$fp      = fopen($tmpName, 'r');
$docData = fread($fp, filesize($tmpName));
$docData = addslashes($docData);
fclose($fp);

	
	$docData =addslashes(file_get_contents($_FILES['userData']['tmp_name']));
	$docProperties = getimageSize($_FILES['userData']['tmp_name']);
	
	$sql = "INSERT INTO podaci SET extSlike='".$imageProperties['mime']."',idVrsta='$odabir',slika='$imgData', extPriloga='".$fileType."', naziv='$naziv',
 autor='$autor', godina='$godina', izdavac='$izdavac',idKorisnika='$id',prilog='".$docData."'	";
	
	
	$current_id = mysqli_query($link,$sql); //or die("<b>Error:</b> Problem on  Insert<br/>" . mysqli_error());
	if(isset($current_id)) {
		header("Location: index.php?akcija=login&radnja=mojePublikacije");
	}
	
}}
}else{
	
	header("Location: index.php?akcija=login&radnja=dodavanjePublikacija&error=true");
	

}
}else{
	///////////////////////////
	
//include 'konekcija.php';


$upit="SELECT * FROM `vrsta` ORDER BY nazivKategorije ASC";
$result= $link->query($upit);

if(isset($_GET['error'])){if($_GET['error']=='true'){
	
	echo "<script>alert('Potrebno je odabrati vrstu dokumenta!');</script>";
	
}}

?>


	
	<br><br>
<form name="frmImage" enctype="multipart/form-data" action="index.php?akcija=login&radnja=dodavanjePublikacija" method="post" id="frmImage" class="frmImageUpload">
	<div class="tablereg"> 
	<table>
	
	<tr><td> 
	Vrsta dijela:     </td>
	<td>
	<select name="odabir" id="odabir" form="frmImage" required>
	
	<option value="0">Odaberi..</option>
<?php while($row = $result->fetch_array()){?>
<option value="<?php echo $row['id']; ?>"><?php echo $row['nazivKategorije']; ?></option>	
<?php } ?>	
	</select>
	</td>
	</tr>
	
	<tr><td><br></td></tr>
	
	<tr><td> 
	Naziv djela:     </td>
	<td><input type="text" name="naziv"  required /></td>
	</tr>
	
	<tr><td><br></td></tr>
	
	<tr>
	<td>Autor djela: </td>
	<td><input type="text" name="autor" required /></td>
	</tr>

	
	<tr><td><br></td></tr>
	
	<tr>
	<td>Godina izdavanja:</td>
	<td><input type="text" name="godina" required /></td>
	</tr>
	
	<tr><td><br></td></tr>
	
	<tr>
	<td>Izdavač:</td>
	<td><input type="text" name="izdavac" required /></td>
	</tr>
	<tr><td><br></td></tr>
	<tr>
	<td>Slika:</td>
	<td><input name="userImage" type="file" class="inputFile"  id="gumb"required /><br><br></td>
	</tr>
	<tr>
	<td>Prilog:</td>
	<td><input name="userData" type="file" class="inputFile" id="gumb" required /><br><br></td>
	</tr>
	
	<tr><td><br></td></tr>
	
	
	<tr><td><br></td></tr>
	<tr>
	<td><input type="submit"  value="Natrag" id="gumb" onclick="history.go(-1);"/>
	</td>
	<td><input type="submit"  value="Dodaj publikaciju u bazu" id="gumb"/>
	</td>
	</tr>
	</table>
	
	<br><br>
	
	
	</form>
	

	<?php
}



 }else{

	header("Location: index.php?akcija=login");
	

} ?>
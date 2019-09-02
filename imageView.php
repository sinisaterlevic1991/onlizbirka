<?php
	
	
    if(isset($_GET['idSlike'])) {
        include "konekcija.php";
		$idSlike=$_GET['idSlike'];
		$sql = "SELECT * FROM podaci WHERE id='" .$idSlike. "'";
		$result = mysqli_query($link,$sql);
		while($row = $result -> fetch_row()){
		header("Content-type: " . $row[7]);
        echo $row[6];
	}}
	//mysql_close($conn);
?>
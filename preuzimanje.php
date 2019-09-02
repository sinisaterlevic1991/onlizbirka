<?php
if(isset($_GET['id'])) 
{
// if id is set then get the file with the id from database

include 'konekcija.php';

$id    = $_GET['id'];
$sql = "SELECT extPriloga, prilog FROM podaci WHERE id = '$id'";

	$result = mysqli_query($link,$sql) or die('Error, query failed');

while($row = $result -> fetch_row()){
		header("Content-type: " . $row[0]);
        echo $row[1];
	}	

}
?>


	<title>Login</title>
	


<?php 
	
include("konekcija.php");

	
	if( !empty($_POST['username']) && !empty($_POST['password']) ){
		$username=$_POST['username'];
		$password=$_POST['password'];


		
		
		$query= "Select id,username,password,ovlast from korisnici where username='$username'"; 

		$result =mysqli_query($link,$query);
		
		
		if(mysqli_num_rows($result) <= 0){
			//print("<table border='0' width='200px' align='center'");
			//echo "<tr><td align='center'><b>Unjeli ste krive podatke!</b></td></tr>";
			//echo "<br>";
			//print("<tr><td align='center'><input class='submit' value='Idi natrag!' type='button' onclick='history.back()'/></td></tr>");
			header( "Location: index.php?akcija=login&q=1" );
		} else {
		
		 while($row = $result -> fetch_row()){
	//	var_dump($row);
		
			$password_iz_baze=$row[2];
			$username_iz_baze=$row[1];
			$ovlast=$row[3];
		
			if($password_iz_baze==md5($password)){
				
				if($ovlast=='admin'){
					session_start();
					$id_admina=$row[0]; 
					$_SESSION['id_admina']= $id_admina;
					// echo "ID korisnik" .$id_korisnika;
					// echo "ID korisnik $id_korisnika";
					 header("Location: index.php?akcija=login");
					}else{
										
					session_start();
					$id_korisnika=$row[0]; 
					$_SESSION['id_korisnika']= $id_korisnika;
					// echo "ID korisnik" .$id_korisnika;
					// echo "ID korisnik $id_korisnika";
					 header("Location: index.php?akcija=login");
					
					}
					
				}else{
				
			//	print("<table border='0' width='200px' align='center'");
			//echo "<tr><td align='center'><b>Unjeli ste krive podatke!</b></td></tr>";
			//echo "<br>";
			//print("<tr><td align='center'><input class='submit' value='Idi natrag!!!' type='button' onclick='history.back()'/></td></tr>");
			header( "Location: index.php?akcija=login&q=1" );
			
			}
			
			} 
		}
	} else {
	
		header( "Location: index.php?akcija=login" );
	}
?>

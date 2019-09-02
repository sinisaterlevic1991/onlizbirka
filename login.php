

<?php

if(isset($_GET['q'])){if($_GET['q']=='1'){ echo "<script> alert ('Unjeli ste krive podatke!');</script>";}}

if((isset($_SESSION['id_korisnika']))or (isset($_SESSION['id_admina']))){ 

include ("admin.php");


} 
else{

?>


		<br><br>


<form action="login1.php" method="post" >
    <label><h3>Username</h3></label><br>
                    <input type="text" name="username" size="30" /><br><br>
                    <label><h3>Password</h3></label><br>
                    <input type="password" name="password" size="30" /><br><br>

                    <button type="submit" id="gumb">Log in</button>
					<a href="?akcija=registracija" id="gumb">Registriraj se</a>
					<br><br>
</form>



<?php
}
?> 

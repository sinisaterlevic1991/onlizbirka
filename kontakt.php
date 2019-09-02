
		<br><br>



				<br>
				<h1>Kontaktirajte nas !</h1>
				<form action="phpdioforme.php" method="POST">
					<p><h2>Ime</h2></p> <input type="text" name="name" required />
					<p><h2>Prezime</h2></p> <input type="text" name="prez" required />
					<p><h2>Email</h2></p> <input type="email" name="email" required />
 

 
					<p><h2>Vrsta kontakta</h2></p>
					<select name="type" size="1"  >
					<option value="update">Ažuriranje stranice</option>
					<option value="change">Promjena podataka</option>
					<option value="addition">Dodavanje podataka</option>
					<option value="new">Novi proizvodi</option>
					</select>
					<br />
 
					<p><h2>Poruka</h2></p><textarea name="message" rows="10" cols="70"></textarea><br />
					<br><input type="submit" value="Pošalji" id="gumb">    <input type="reset" value="Izbriši" id="gumb">
					
				</form>
				<br>
			

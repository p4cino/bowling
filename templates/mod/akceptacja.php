<div class="jumbotron jumbotron-fluid bg-inverse" id="bg1">
	<div class="container">
		<h1 class="display-3">Akceptacjia Rezerwacji.</h1>
		<br />
	</div>
</div>
<div class="container">
	<?php
	$db = Baza::dajDB();

	if (!empty($_GET['s2']) && !empty($_GET['s3'])) {
		if ($_GET['s3'] == "yes") {
			$sql = "UPDATE `rezerwacje` SET `potwierdzenie` = '1' WHERE `rezerwacje`.`id` = :id";
			$stmt = $db->prepare($sql);                                   
			$stmt->bindParam(':id', $_GET['s2'], PDO::PARAM_INT);   
			$stmt->execute(); 
		}
		if ($_GET['s3'] == "delete") {
			$sql = "DELETE FROM `rezerwacje` WHERE `rezerwacje`.`id` = :id";
			$stmt = $db->prepare($sql);                                   
			$stmt->bindParam(':id', $_GET['s2'], PDO::PARAM_INT);   
			$stmt->execute(); 
		}
	}

	$zap = $db->query("SELECT rezerwacje.id, rezerwacje.tor, rezerwacje.data, uzytkownicy.imie FROM rezerwacje INNER JOIN uzytkownicy ON uzytkownicy.id = rezerwacje.id_uzytkownika WHERE potwierdzenie = 0");
	while($tab = $zap->fetch()){
		echo "".$tab['imie']." | Tor: ".$tab['tor']." | Rezerwacja na: ".$tab['data']." 
		<a class='btn btn-outline-primary' href='akceptacja/".$tab['id']."/yes'>Akceptacja</a>
		<a class='btn btn-outline-danger' href='akceptacja/".$tab['id']."/delete'>Usuń</a><hr />";
	}
	?>
</div>
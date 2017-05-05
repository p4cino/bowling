<div class="jumbotron jumbotron-fluid bg-inverse" id="bg1">
	<div class="container">
		<h1 class="display-3">Nadawanie Uprawnień.</h1>
		<br />
	</div>
</div>
<div class="container">
	<?php
		$db = Baza::dajDB();

		if (!empty($_GET['s2']) && !empty($_GET['s3'])) {
		if ($_GET['s3'] == "user") {
			$sql = "UPDATE `uzytkownicy` SET `ranga` = '0' WHERE `id` = :id";
			$stmt = $db->prepare($sql);                                   
			$stmt->bindParam(':id', $_GET['s2'], PDO::PARAM_INT);   
			$stmt->execute(); 
		}
		if ($_GET['s3'] == "mod") {
			$sql = "UPDATE `uzytkownicy` SET `ranga` = '1' WHERE `id` = :id";
			$stmt = $db->prepare($sql);                                   
			$stmt->bindParam(':id', $_GET['s2'], PDO::PARAM_INT);   
			$stmt->execute(); 
		}
		if ($_GET['s3'] == "adm") {
			$sql = "UPDATE `uzytkownicy` SET `ranga` = '2' WHERE `id` = :id";
			$stmt = $db->prepare($sql);                                   
			$stmt->bindParam(':id', $_GET['s2'], PDO::PARAM_INT);   
			$stmt->execute(); 
		}
	}

	$zap = $db->query("SELECT `id`, `login`, `ranga` FROM `uzytkownicy`");
	while($tab = $zap->fetch()){

		switch ($tab['ranga']) {
			case 0:
			$ranga = "Uzytkownik";
			break;
			case 1:
			$ranga = "Moderator";
			break;
			case 2:
			$ranga = "Administrator";
			break;
			default:
			$ranga = "Uzytkownik";
			break;
		}
		if ($tab['ranga'] == 2) {
			echo "<a class='btn btn-danger mx-2' href='role/".$tab['id']."/mod'>Zmień na Moderatora</a>";
			echo "<a class='btn btn-success mx-2' href='role/".$tab['id']."/user'>Zmień na normalnego użytkownika</a>";
		}
		else {
			if ($tab['ranga'] == 1) {
				echo "<a class='btn btn-danger mx-2' href='role/".$tab['id']."/adm'>Nadaj Administratora</a>";
				echo "<a class='btn btn-success mx-2' href='role/".$tab['id']."/user'>Zmień na normalnego użytkownika</a>";
			}
			else {
				echo "<a class='btn btn-warning mx-2' href='role/".$tab['id']."/mod'>Nadaj Moderatora</a>
				<a class='btn btn-danger mx-2' href='role/".$tab['id']."/adm'>Nadaj Administratora</a>";
			}
		}
		echo "".$tab['login']." | Ranga: ".$ranga." 
		<hr />";
	}
	?>
</div>
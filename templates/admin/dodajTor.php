<div class="jumbotron jumbotron-fluid bg-inverse" id="bg1">
	<div class="container">
		<h1 class="display-3">Dodawanie toru.</h1>
		<br />
	</div>
</div>
<?php
if(!empty($_POST['nazwa']) && !empty($_POST['opis'])){
	$db = Baza::dajDB();
	$zap = $db->prepare("INSERT INTO tory (nazwa_toru, opis) VALUES (:nazwa, :opis)");
	$zap->bindValue(":nazwa", $_POST['nazwa'], PDO::PARAM_STR);
	$zap->bindValue(":opis", $_POST['opis'], PDO::PARAM_STR);
	$zap->execute();
	echo '<div class="alert alert-success m-0" role="alert">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<strong>Sukces!</strong> Dodano Tor!
</div>';
}
?>
<div class="container">
	<form role="form" method="POST">
		<div class="form-group">
			<label for="name">Nazwa toru</label>
			<div class="input-group Name">
				<input type="text" class="form-control" name="nazwa" required>
			</div>
		</div>
		<div class="form-group">
			<label for="exampleTextarea">Opis toru</label>
			<textarea class="form-control" name="opis" rows="3" required></textarea>
		</div>

		<button type="submit" class="btn btn-primary">Dodaj</button>
	</form>
</div>
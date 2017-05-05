<!DOCTYPE html>
<html >
<head>
	<meta charset="UTF-8">
	<title>BowlingClub</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<?php
    //jeśli jest kilka /folder/folder/folder to linki leżą po ustaleniu base href wiedzą gdzie mają główne źródło
	echo "<base href='".WWW."'>";
	?>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
	<link rel='stylesheet prefetch' href='./layout/bootstrap-4.0.0-alpha.6-dist/css/bootstrap.min.css'>
	<script src='./layout/js/tether.min.js'></script>
	<!--Ikonki glyphicons-->
	<link rel="stylesheet" href="./layout/fonts/font-awesome.min.css">
	<!--Style modyfikujące-->
	<link rel="stylesheet" href="./layout/style1.css">
</head>

<body>
	<nav class="navbar navbar-inverse navbar-toggleable-md bg-inverse">
		<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#rozwin" aria-controls="rozwin" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<a class="navbar-brand" href=""><i class="fa fa-bullseye"></i>BowlingClub</a>

		<div class="collapse navbar-collapse" id="rozwin">

			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<a class="nav-link" href="#bg1">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#galeria">Galeria</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#footer">Kontakt</a>
				</li>

			</ul>
			<a href="#" class="btn btn-outline-info mx-2" data-toggle="modal" data-target=".bd-example-modal-sm" >Logowanie</a>
			<a href="#" class="btn btn-outline-success mx-2" data-toggle="modal" data-target=".bd-example-modal-lg">Rejestracja</a>
		</div>
	</nav>

	<!--Okienko rejestracji-->
	<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Rejestracja</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="home/register" method="POST">

						<div class="form-group">
							<label for="Login">Login</label>
							<input type="text" name="login" class="form-control" placeholder="Podaj login" pattern=".{4,}" title="Login musi mieć co najmiej 4 znaki" required>
						</div>
						<div class="form-group">
							<label for="Imie">Imie</label>
							<input type="text" name="imie" class="form-control" placeholder="Podaj imie" required>
						</div>
						<div class="form-group">
							<label for="Login">Nazwisko</label>
							<input type="text" name="nazwisko" class="form-control" placeholder="Podaj Nazwisko" required>
						</div>
						<div class="form-group">
							<label for="Email">Email</label>
							<input type="email" name="email" class="form-control" placeholder="Podaj adres Email" required>
						</div>
						<div class="form-group">
							<label for="Telefon">Telefon</label>
							<input type="text" name="telefon" class="form-control" placeholder="Podaj telefon" pattern=".{9,}" title="Telefon musi mieć co najmniej 9 cyfr" required>
						</div>
						<div class="form-group">
							<label for="Test hasła">Hasło</label>
							<input type="password" name="password1" class="form-control" placeholder="Twoje tajne hasło" pattern=".{6,}" title="Hasło musi mieć 6 lub więcej znaków" required>
						</div>
						<div class="form-group">
							<label for="Test Hasła 2">Hasło</label>
							<input type="password" name="password2" class="form-control" placeholder="Twoje tajne hasło" pattern=".{6,}" title="Hasło musi mieć 6 lub więcej znaków" required>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Zamknij</button>
						<button type="submit" class="btn btn-primary" >Zarejstruj</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!--Okienko logowania-->
	<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Logowanie</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="home/login" method="POST">
						<div class="form-group">
							<label for="Login">Login</label>
							<input type="text" name="login" class="form-control" placeholder="Podaj login" pattern=".{4,}" title="Login musi mieć co najmiej 4 znaki" required>
						</div>
						<div class="form-group">
							<label for="Test hasła">Hasło</label>
							<input type="password" name="password" class="form-control" placeholder="Twoje tajne hasło" pattern=".{6,}" title="Hasło musi mieć 6 lub więcej znaków" required>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Zamknij</button>
						<button type="submit" class="btn btn-primary">Zaloguj</button>
					</form>
				</div>
			</div>
		</div>
	</div>

	<?php
	if (!empty($_POST)) {
		if ($_GET['s2'] == "login") {
			fx('logowanie');
			if (!empty($_POST['login'])) {
				$user = logowanie($_POST['login'], $_POST['password']);
				if($user){
					reload('');
				}
				else {
					echo '<div class="alert alert-danger m-0" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<strong>Błąd!</strong> Podano niepoprawne dane logowania!
				</div>';
			}
		}
	}
	if ($_GET['s2'] == "register") {
		fx('rejestracja');
		if(!empty($_POST['login'])){
			$wynik = rejestracja($_POST['login'], $_POST['email'], $_POST['password1'], $_POST['password2'], $_POST['imie'], $_POST['nazwisko'], $_POST['telefon']);
			if($wynik == ""){
				echo '<div class="alert alert-success m-0" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<strong>Sukces!</strong> Pomyślnie utworzono konto!
			</div>';
		}
		else
		{
			echo '<div class="alert alert-danger m-0" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<strong>Błąd!</strong> nie można było utworzyć konta!<br />';
			echo $wynik."</div>";
		}
	}
}
}
?>
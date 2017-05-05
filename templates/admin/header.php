<!DOCTYPE html>
<html >
<head>
	<meta charset="UTF-8">
	<title>Administrator</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<?php 
	echo "<base href='".WWW."'>";
		//pod tym ładowanie cssów w headzie bo inaczej przez "ładne adresy" /plik/zmienna/zmienna skrypty nie będą wiedzieć w jakim są katalogu
	?>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
	<link rel='stylesheet prefetch' href='./layout/bootstrap-4.0.0-alpha.6-dist/css/bootstrap.min.css'>
	<script src='./layout/js/tether.min.js'></script>
	<!--Ikonki glyphicons-->
	<link rel="stylesheet" href="./layout/fonts/font-awesome.min.css">
	<!--Style modyfikujące-->
	<link rel="stylesheet" href="./layout/css/style.css">
</head>

<body>
	<nav class="navbar navbar-inverse navbar-toggleable-md bg-inverse">
		<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#rozwin" aria-controls="rozwin" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<a class="navbar-brand" href="#"><i class="fa fa-bullseye"></i>BowlingClub</a>

		<div class="collapse navbar-collapse" id="rozwin">

			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<a class="nav-link" href="pa">Panel Administratora</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="akceptacja">Rezerwacje do akceptacji</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="uzytkownicy">Usuwanie uzytkowników</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="role">Przydzielanie praw na stronie</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="dodajTor">Dodaj Tor</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="usunTor">Usuń Tor</a>
				</li>
			</ul>

			<form class="form-inline my-2 my-lg-0">
				<a href="logout" class="btn btn-outline-danger mx-2">Wyloguj <i class="fa fa-sign-out" aria-hidden="true"></i></a>
			</form>
		</div>
	</nav>
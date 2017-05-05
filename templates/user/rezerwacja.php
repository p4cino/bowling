<div class="jumbotron jumbotron-fluid bg-inverse" id="bg2">
	<div class="container">
		<h1 class="display-3">Rezerwacja torów</h1>
		<p class="lead">Wybierz jeden z wielu naszych torów :)</p>
		<br />
	</div>
</div>

<div class="container">
	<div class="card-deck">
		<?php
		$db = Baza::dajDB();
		$zap = $db->query("SELECT `id`,`nazwa_toru`, `opis`, `obrazek` FROM `tory`");
		while($tab = $zap->fetch()){
			echo '
			<div class="card">
				<img class="card-img-top" src="http://placehold.it/235x180" alt="Card image cap">
				<div class="card-block">
					<h4 class="card-title">Tor '.$tab['nazwa_toru'].'</h4>
					<p class="card-text">'.$tab['opis'].'</p>
				</div>
				<div class="card-footer">
				<a href="tor/'.$tab['id'].'" class="btn btn-lg btn-success">Rezerwuj <i class="fa fa-user-plus"></i></a>
				</div>
			</div>';
		}
		?>
	</div>
</div>
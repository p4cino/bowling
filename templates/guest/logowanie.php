<?php
fx('logowanie');
if(!empty($_POST['login'])){
	$user = logowanie($_POST['login'], $_POST['password']);
	//true/false z funkcji
	if($user){
		//uzycie funkcji reload z 'ustawieia.php' do przeładowania strony i szablonów
		reload('');
	}
	else {
		echo "Podano niepoprawne dane";
	}
}
else {
	echo '
<form id="login_form" action="" method="POST">
				<fieldset>
					<legend>Panel logowania</legend>
					<div>
						<label for="login">Login: </label>
						<input type="text" name="login"/>
					</div>
					<div>
						<label for="password">Hasło: </label>
						<input type="password" name="password"/>
					</div>
					<input type="submit" value="Zaloguj" />
				</fieldset>
			</form>
	';
}

?>
<?php
function rejestracja($login, $email, $password, $password2, $imie, $nazwisko, $telefon) {
	$db = Baza::dajDB();
	//usuwanie 'białych' znaków z przesłanych danych 
	$login = trim($login);
	$email = trim($email);
	$password = trim($password);
	$password2 = trim($password2);
	//Zmienna errors trzyma błędy
	$errors = NULL;
	//1.Walidacja podanych danych
	if (strlen($login) < 3 || strlen($login) > 25) {
		$errors .= "Login powinien mieć co najmniej 3 znaki a maksymalnie 25! <br />";
	}
	if (strlen($password) < 6) {
		$errors .= "Hasło powinno zawierać co najmniej 6 znaków! <br />";
	}
	if ($password !== $password2) {
		$errors .= "Hasła nie są takie same! <br />";
	}
	if (filter_var($email, FILTER_VALIDATE_EMAIL) === False) {
		$errors .= "Adres email jest niepoprawny! <br />";
	}

	//2.Sprawdzanie danych w bazie login/email
	$zap = $db->prepare("SELECT login FROM `uzytkownicy` WHERE login=:login");
	$zap->bindValue(":login", $login, PDO::PARAM_STR);
	$zap->execute();
	$user = $zap->fetchAll(PDO::FETCH_COLUMN, 0);
	if(count($user)>0) {
		$errors .= "Konto o takim loginie już istnieje! <br />";
	}
	$zap = $db->prepare("SELECT email FROM `uzytkownicy` WHERE email=:email");
	$zap->bindValue(":email", $email, PDO::PARAM_STR);
	$zap->execute();
	$baza = $zap->fetchAll(PDO::FETCH_COLUMN, 0);
	if(count($baza)>0) {
		$errors .= "Podany adres email jest już w bazie! <br />";
	}

	if (empty($errors)) {
		$zap = $db->prepare("INSERT INTO uzytkownicy (login, email, password, imie, nazwisko, telefon) VALUES (:login, :email, :password, :imie, :nazwisko, :telefon)");
		$zap->bindValue(":login", $login, PDO::PARAM_STR);
		$zap->bindValue(":email", $email, PDO::PARAM_STR);
		$zap->bindValue(":password", sha1($password), PDO::PARAM_STR);
		$zap->bindValue(":imie", $imie, PDO::PARAM_STR);
		$zap->bindValue(":nazwisko", $nazwisko, PDO::PARAM_STR);
		$zap->bindValue(":telefon", $telefon, PDO::PARAM_STR);
		$zap->execute();

		//id ostatnio dodanego rekordu do bazy z danego zapytania
		//$id_uzytkownika = $db->lastInsertId();

		return "Rejestracja przebiegła pomyślnie! Teraz możesz się zalogować <br />";
	}
	return $errors;
}
?>
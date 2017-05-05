<?php
//Start bufora PHP
ob_start();
//Start benchmarka służącego do określenia w jakim czasie wykonują się skrypty
$bench = microtime(True);
//Ładowanie głównego pliku z ustawieniami i klasami
require_once('./var/ustawienia.php');
//Tablica ACL trzymająca kto gdzie może się dostać
$ACL = Array(
	'guest' => array('home', 'logowanie', 'rejestracja'),
	'user' => array('konto', 'rezerwacja', 'rezerwacje', 'tor', 'logout'),
	'mod' => array('pm', 'akceptacja', 'uzytkownicy', 'logout'),
	'admin' => array('pa', 'akceptacja', 'uzytkownicy', 'role', 'dodajTor', 'usunTor', 'logout')
	);
//tworzenie obiektu uzytkownik
isset($_SESSION['gracz']) ? $Uzytkownik = new Uzytkownik($_SESSION['gracz']) : $Uzytkownik = new Uzytkownik(null);

//Routing oraz sprawdzanie dostępów do podstron
$start = null;
switch ($Uzytkownik->getRole()) 
{
	//Gość
	case -1:
	$access = $ACL['guest'];
	$folder = './templates/guest/';
	$start = 'home';
	break;
	case 0:
	//Zwykły użytkownik
	$access = $ACL['user'];
	$folder = './templates/user/';
	$start = 'konto';
	break;
	case 1:
	//Moderator
	$access = $ACL['mod'];
	$folder = './templates/mod/';
	$start = 'pm';
	break;
	case 2:
	//Administrator
	$access = $ACL['admin'];
	$folder = './templates/admin/';
	$start = 'pa';
	break;
	default:
	$access = $ACL['guest'];
	$folder = './templates/guest/';
	$start = 'home';
	break;
}
//Jeśli jest pusta zmienna wysylamy do domyslnej strony
!empty($_GET['page']) ? $page = $_GET['page'] : $page = $start;
//Sprawdzanie czy jest dostep do zadanej strony
in_array($page, $access) ? $page = $page : $page = 'error';

//Ładowanie systemu szablonow
require_once($folder.'header.php');
require_once($folder.''.$page.'.php');
//Przybliżony czas wykonania strony o stronie serwera
$stop = microtime(True);
$time = $stop - $bench;
require_once($folder.'footer.php');

ob_end_flush();
?>
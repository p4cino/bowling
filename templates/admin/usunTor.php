<div class="container">
	<?php
	$db = Baza::dajDB();
	if (!empty($_GET['s2'])) {
		$sql = "DELETE FROM `tory` WHERE `id` = :id";
		$stmt = $db->prepare($sql);                                   
		$stmt->bindParam(':id', $_GET['s2'], PDO::PARAM_INT);   
		$stmt->execute();
		echo '<div class="alert alert-success m-0" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<strong>Sukces!</strong> Usunięto tor!
	</div>'; 
}

$zap = $db->query("SELECT id, nazwa_toru FROM `tory`");
while($tab = $zap->fetch()){
	echo "Nazwa toru: ".$tab['nazwa_toru']."
	<a class='btn btn-outline-danger' href='usunTor/".$tab['id']."/delete'>Usuń</a><hr />";
}
?>
</div>
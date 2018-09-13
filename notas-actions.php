<?php

    $site = '/?p=notas';

    $db = new PDO("sqlite:agenda.sqlite");

	//Recebendo os dados
	$id = $_GET['id'];
	$action = $_REQUEST['action'];

	$titulo = $_POST['titulo'];
	//$nota = sqlite_escape_string( $_POST['nota']);
    $nota = htmlentities($_POST['nota'], ENT_QUOTES);




	switch ($action) {

		case 'insert':
		$res = "INSERT INTO notas (titulo, nota) VALUES ('$titulo', '$nota')";
		$db->exec($res);
		header("Location: $site");
		break;

		case 'update':
		$sqlI = "UPDATE notas SET titulo = '$titulo', nota = '$nota' WHERE id = '$id'";
		$stmt = $db->exec($sqlI);
		header("Location: $site"."-view&id=$id");
		break;

		case 'delete':
		$sqlI = "DELETE FROM notas WHERE id = '$id'";
		$stmt = $db->exec($sqlI);
		header("Location: $site");
		break;


		default: break;
	}

    //break;

?>
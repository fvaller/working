<?php

    $site = '/';

    $db = new PDO("sqlite:agenda.sqlite");

	//Recebendo os dados
	$id = $_GET['id'];
	$action = $_REQUEST['action'];
	$projeto = $_POST['projeto'];

	switch ($action) {

		case 'insert':
		$res = "INSERT INTO projetos (projeto) VALUES ('$projeto')";
		$db->exec($res);
		//header("Location: $site");
		break;

		case 'delete':
		$sqlI = "DELETE FROM projetos WHERE id_projetos = '$id'";
		$stmt = $db->exec($sqlI);
		header("Location: $site");
		break;

		default: break;
	}

?>
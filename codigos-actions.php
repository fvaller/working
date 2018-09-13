<?php

    $site = '/?p=codigos';

    $db = new PDO("sqlite:agenda.sqlite");

	//Recebendo os dados
	$id = $_GET['id'];
	$action = $_REQUEST['action'];

	$titulo = $_POST['titulo'];
	$linguagem = $_POST['linguagem'];
	$codigo = htmlentities($_POST['codigo'], ENT_QUOTES);



	switch ($action) {

		case 'insert':
		$res = "INSERT INTO codigos (titulo, linguagem, codigo) VALUES ('$titulo', '$linguagem', '$codigo')";
		$db->exec($res);
		header("Location: $site");
		break;

		case 'update':
		$sqlI = "UPDATE codigos SET titulo = '$titulo', linguagem = '$linguagem', codigo = '$codigo' WHERE id = '$id'";
		$stmt = $db->exec($sqlI);
		header("Location: $site"."-view&id=$id");
		break;

		case 'delete':
		$sqlI = "DELETE FROM codigos WHERE id = '$id'";
		$stmt = $db->exec($sqlI);
		header("Location: $site");
		break;

		default: break;
	}

    //break;

?>
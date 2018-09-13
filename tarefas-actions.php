<?php

    $site = '/';

    $db = new PDO("sqlite:agenda.sqlite");

	//Recebendo os dados
	$id = $_GET['id'];
	$action = $_REQUEST['action'];
	$tarefa = $_POST['tarefa'];

	switch ($action) {

		case 'insert':    	
		$res = "INSERT INTO tarefas (tarefa, status) VALUES ('$tarefa', '1')";
		$db->exec($res);		
		header("Location: $site");
		break;

		case 'delete':    	
		$sqlI = "DELETE FROM tarefas WHERE id = '$id'";
		$stmt = $db->exec($sqlI);
		//header("Location: $site");
		break;	

        case 'check':
		$sqlI = "UPDATE tarefas SET status = '2' WHERE id = '$id'";
		$stmt = $db->exec($sqlI);
		header("Location: $site");
		break;


        case 'unchecked':
		$sqlI = "UPDATE tarefas SET status = '1' WHERE id = '$id'";
		$stmt = $db->exec($sqlI);
		header("Location: $site");
		break;
			

		default: break;
	}

?>
<?php

  //Verifica se a base de dados já existe, caso não cria uma nova base
  if(file_exists(agenda.sqlite)){
    $db = new PDO("sqlite:agenda.sqlite");  
  }else{
    $db = new PDO("sqlite:agenda.sqlite");
    $db->exec('CREATE TABLE "tarefas" ("id" INTEGER PRIMARY KEY  AUTOINCREMENT  NOT NULL  UNIQUE , "tarefa" TEXT, "status" CHAR)');
    $db->exec('CREATE TABLE "notas" ("id" INTEGER PRIMARY KEY  AUTOINCREMENT  NOT NULL  UNIQUE , "titulo" VARCHAR, "nota" TEXT)');
    $db->exec('CREATE TABLE "codigos" ("id" INTEGER PRIMARY KEY  AUTOINCREMENT  NOT NULL  UNIQUE , "titulo" VARCHAR, "linguagem" VARCHAR, "codigo" TEXT)');
  }
  

  $pagina = $_GET['p'] == '' ? 'tarefas' : $_GET['p'];

  switch($pagina){
    case 'tarefa' : $menu = $pagina; break;

    case 'notas' : $menu = $pagina; break;
    case 'notas-edit' : $menu = 'notas'; break;
    case 'notas-view' : $menu = 'notas'; break;

    case 'codigos' : $menu = $pagina; break;
    case 'codigos-edit' : $menu = 'codigos'; break;
    case 'codigos-view' : $menu = 'codigos'; break;

    default : $menu = $pagina; break;
  }

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset=utf-8>
  <title>Working</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="css/bootstrap-theme.css">
  <link rel="stylesheet" href="css/geral.css" type="text/css" />
  <link rel="icon" href="favicon.png">
  <!--[if lt IE 9]>
  <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->

  <style type="text/css">
  h1,h2,h3 { margin: 0 0 20px; }
  .container {}
  .lg { font-size: 18px; }
  </style>

</head>
<body>

    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/">Working</a>
      </div>

      <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav">
          <li <?php echo $menu == 'tarefas' ? 'class="active"': ''; ?>><a href="/?p=tarefas">Tarefas</a></li>
          <li <?php echo $menu == 'notas' ? 'class="active"': ''; ?>><a href="/?p=notas">Notas</a></li>
          <li <?php echo $menu == 'codigos' ? 'class="active"': ''; ?>><a href="/?p=codigos">Codigos</a></li>
        </ul>
      </div>
    </nav>

    <div class="paginas">
    <?php
    if(file_exists($pagina.'.php')){
      include($pagina.'.php');
    }
    ?>
    </div>

  <script src="js/jquery-1.10_2.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/autosize.js"></script>
  <script src="js/geral.js"></script>
  <script src="js/respond.min.js"></script>
</body>
</html>
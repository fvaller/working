
	<script type="text/javascript" src="js/scripts/shCore.js"></script>
	<script type="text/javascript" src="js/scripts/shBrushJScript.js"></script>
	<script type="text/javascript" src="js/scripts/shBrushPhp.js"></script>
	<script type="text/javascript" src="js/scripts/shBrushCss.js"></script>
	<script type="text/javascript" src="js/scripts/shBrushCSharp.js"></script>
	<script type="text/javascript" src="js/scripts/shBrushDelphi.js"></script>
	<script type="text/javascript" src="js/scripts/shBrushSql.js"></script>
	<link type="text/css" rel="stylesheet" href="css/styles/shCoreDefault.css"/>
    <script type="text/javascript">SyntaxHighlighter.all();</script>


       <?php
        $id = (int) $_GET['id'];
        $res = $db->query("SELECT * FROM codigos WHERE id = '$id' LIMIT 1");
        foreach ($res as $row) {
          $titulo = $row['titulo'];
          $linguagem = $row['linguagem'];
          $nota = $row['codigo'];
        }
       ?>

       <div class="row">

         <div class="col-md-9">

            <div class="panel panel-default">
              <div class="panel-heading"><strong><?php echo $titulo; ?></strong></div>
              <div class="panel-body">

                <a href="?p=codigos-edit&id=<?php echo $row['id']; ?>" class="label label-default">Editar</a>
                <hr />

                <code><pre class="brush: <?php echo strtolower($linguagem); ?>;"><?php echo ($nota); ?></pre></code>

              </div>
            </div>

         </div>

         <div class="col-md-3">

           <div class="list-group">
            <?php
            $res = $db->query("SELECT * FROM codigos ORDER BY titulo ASC");
            foreach ($res as $row) {
            ?>
              <a href="?p=codigos-view&id=<?php echo $row['id']; ?>"  class="list-group-item <?php if($id == $row['id']) echo 'active'; ?>"><?php echo $row['titulo']; ?></a>
            <?php } ?>
            </div>

         </div>
       </div>
       </div>
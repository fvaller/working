<div class="row">


  <div class="col-md-9">

    <div class="panel panel-default">
      <div class="panel-heading"><strong><?php echo ucfirst($pagina); ?></strong></div>
      <div class="panel-body">

           <?php
            $id = (int) $_GET['id'];
            $res = $db->query("SELECT * FROM codigos WHERE id = '$id' LIMIT 1");
            foreach ($res as $row) {
              $titulo = $row['titulo'];
              $linguagem = $row['linguagem'];
              $codigo = $row['codigo'];
            }
           ?>

              <a href="?p=codigos-view&id=<?php echo $id; ?>" class="label label-default">Cancelar</a>
              <hr />

                <form role="form" method="post" action="codigos-actions.php?action=update&id=<?php echo $id; ?>">
                  <div class="form-group">
                    <input type="text" name="titulo" class="form-control" placeholder="Titulo" value="<?php echo $titulo; ?>">
                  </div>
                  <div class="form-group">
                    <select name="linguagem" class="form-control">
                      <option value="php" <?php if($linguagem == 'php')echo 'selected="selected"'; ?>>php</option>
                      <option value="js" <?php if($linguagem == 'js')echo 'selected="selected"'; ?>>js</option>
                      <option value="css" <?php if($linguagem == 'css')echo 'selected="selected"'; ?>>css</option>
                      <option value="CSharp" <?php if($linguagem == 'CSharp')echo 'selected="selected"'; ?>>C#</option>
                      <option value="Delphi" <?php if($linguagem == 'Delphi')echo 'selected="selected"'; ?>>Delphi</option>
                      <option value="Sql" <?php if($linguagem == 'Sql')echo 'selected="selected"'; ?>>Sql</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <textarea name="codigo" class="form-control" rows="3" id="auto"  placeholder="Nota"><?php echo $codigo; ?></textarea>
                  </div>
                  <button type="submit" class="btn btn-default">Salvar</button>
                </form>
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
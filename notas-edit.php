<div class="row">


  <div class="col-md-9">

    <div class="panel panel-default">
      <div class="panel-heading"><strong><?php echo ucfirst($pagina); ?></strong></div>
      <div class="panel-body">

           <?php
            $id = (int) $_GET['id'];
            $res = $db->query("SELECT * FROM notas WHERE id = '$id' LIMIT 1");
            foreach ($res as $row) {
              $titulo_edit = $row['titulo'];
              $nota_edit = $row['nota'];
            }
           ?>

              <a href="?p=notas-view&id=<?php echo $id; ?>" class="label label-default">Cancelar</a>
              <hr />

                <form role="form" method="post" action="notas-actions.php?action=update&id=<?php echo $id; ?>">
                  <div class="form-group">
                    <input type="text" name="titulo" class="form-control" placeholder="Titulo" value="<?php echo $titulo_edit; ?>">
                  </div>
                  <div class="form-group">
                    <textarea name="nota" class="form-control" rows="3" id="auto"  placeholder="Nota"><?php echo $nota_edit; ?></textarea>
                  </div>
                  <button type="submit" class="btn btn-default">Salvar</button>
                </form>
      </div>
    </div>

  </div>

  <div class="col-md-3">

     <div class="list-group">
      <?php
      $res = $db->query("SELECT * FROM notas ORDER BY titulo ASC");
      foreach ($res as $row) {
      ?>
        <a href="?p=notas-view&id=<?php echo $row['id']; ?>"  class="list-group-item <?php if($id == $row['id']) echo 'active'; ?>"><?php echo $row['titulo']; ?></a>
      <?php } ?>
      </div>

  </div>


</div>
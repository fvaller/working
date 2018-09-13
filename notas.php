<div class="panel panel-default">
  <div class="panel-heading"><strong><?php echo ucfirst($pagina); ?></strong></div>
  <div class="panel-body">


     <p><a data-toggle="modal" href="#myModal" class="btn btn-default" ><span class="glyphicon glyphicon-plus-sign"></span> Adicionar</a></p>

     <hr />

     <div class="">
       <?php if($_GET['id']){ ?>
       <?php
        $id = (int) $_GET['id'];
        $res = $db->query("SELECT * FROM notas WHERE id = '$id' LIMIT 1");
        foreach ($res as $row) {
          echo '<h4>'.$row['titulo'].'</h4>';
          echo '<pre>'. htmlspecialchars($row['nota']) .'</pre>';
        }
       ?>
       <?php } ?>
     </div>



      <table class="table table-hover">

        <thead>
          <tr>
            <th>ID</th>
            <th>Titulo</th>
            <th>Nota</th>
            <th colspan="2">Ação</th>
          </tr>
        </thead>

        <tbody>

          <?php
          $res = $db->query("SELECT * FROM notas ORDER BY titulo ASC");
          foreach ($res as $row) {
            ?>
            <tr class="<?php if($id == $row['id']) echo 'warning'; ?>">
              <td><?php echo $row['id']; ?></td>
              <td><a href="?p=notas-view&id=<?php echo $row['id']; ?>"><?php echo $row['titulo']; ?></a></td>
              <td><?php echo htmlspecialchars(substr($row['nota'], 0, 80)); ?></td>
              <td><a href="?p=notas-edit&id=<?php echo $row['id']; ?>" class="glyphicon glyphicon-edit" title="Editar"></a></td>
              <td><a href="notas-actions.php?action=delete&id=<?php echo $row['id']; ?>" class="glyphicon glyphicon-remove" title="Excluir"></a></td>
            </tr>
            <?php } ?>
        </tbody>

      </table>




    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Cadastrar nota</h4>
          </div>
          <div class="modal-body">

            <form role="form" method="post" action="notas-actions.php?action=insert">
              <div class="form-group">
                <input type="text" name="titulo" class="form-control" placeholder="Titulo">
              </div>
              <div class="form-group">
                <textarea name="nota" class="form-control" rows="3" placeholder="Nota"></textarea>
              </div>
              <button type="submit" class="btn btn-default">Salvar</button>
            </form>

          </div>

        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


  </div>
</div>
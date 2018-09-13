<div class="panel panel-default">
  <div class="panel-heading"><strong><?php echo ucfirst($pagina); ?></strong></div>
  <div class="panel-body">


     <p><a data-toggle="modal" href="#myModal" class="btn btn-default" ><span class="glyphicon glyphicon-plus-sign"></span> Adicionar</a></p>

     <hr />

      <table class="table table-hover">

        <thead>
          <tr>
            <th>ID</th>
            <th>Titulo</th>
            <th>Linguagem</th>
            <th>Nota</th>
            <th colspan="2">Ação</th>
          </tr>
        </thead>

        <tbody>

          <?php
          $res = $db->query("SELECT * FROM codigos ORDER BY id DESC");
          foreach ($res as $row) {
            ?>
            <tr class="<?php if($id == $row['id']) echo 'warning'; ?>">
              <td><?php echo $row['id']; ?></td>
              <td><a href="?p=codigos-view&id=<?php echo $row['id']; ?>"><?php echo $row['titulo']; ?></a></td>
              <td><?php echo $row['linguagem']; ?></td>
              <td><?php echo htmlspecialchars(substr($row['codigo'], 0, 80)); ?></td>
              <td><a href="?p=codigos-edit&id=<?php echo $row['id']; ?>" class="glyphicon glyphicon-edit" title="Editar"></a></td>
              <td><a href="codigos-actions.php?action=delete&id=<?php echo $row['id']; ?>" class="glyphicon glyphicon-remove" title="Excluir"></a></td>
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
            <h4 class="modal-title">Cadastrar codigo</h4>
          </div>
          <div class="modal-body">

            <form role="form" method="post" action="codigos-actions.php?action=insert">
              <div class="form-group">
                <input type="text" name="titulo" class="form-control" placeholder="Titulo">
              </div>
              <div class="form-group">
                <select name="linguagem" class="form-control">
                  <option >Selecione uma linguagem</option>
                  <option value="php">php</option>
                  <option value="js">js</option>
                  <option value="css">css</option>
                  <option value="CSharp">C#</option>
                  <option value="Delphi">Delphi</option>
                  <option value="Sql">Sql</option>
                </select>
              </div>
              <div class="form-group">
                <textarea name="codigo" class="form-control" rows="3" placeholder="Codigo"></textarea>
              </div>
              <button type="submit" class="btn btn-default">Salvar</button>
            </form>

          </div>

        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


  </div>
</div>
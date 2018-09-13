<div class="row">

  <div class="col-md-3">
    <h3>Projetos</h3>
    <ul class="list-group">
      <li class="list-group-item"><a href="#"><span class="glyphicon glyphicon-inbox"></span> Caixa de Entrada</a></li>
<?php
        $res_projetos = $db->query("SELECT * FROM projetos");
        foreach ($res_projetos as $row) {
?>
      <li class="list-group-item">
        <a href="#"><?php echo $row['projeto']; ?></a>
        <span class="badge">0</span>
      </li>
<?php } ?>
      <li class="list-group-item"><button class="btn btn-warning btn-block">Adicionar</button></li>
    </ul>
  </div>

  <div class="col-md-9">

    <h3><?php echo ucfirst($pagina); ?></h3>

    <form method="post" action="tarefas-actions.php?action=insert" class="form-inline mb20">
      <div class="row">
        <div class="form-group col-xs-7 col-md-10">
          <input type="text" name="tarefa" class="form-control" id="tarefa" placeholder="Tarefa" />
        </div>
        <div class="col-xs-1 col-md-2">
          <button type="submit" class="btn btn-primary">Adicionar</button>
        </div>
      </div>
    </form>

    <table class="table table-hover">

      <tbody>

        <?php
        $st = $_GET['st'] != '' ? $_GET['st'] : 1;
        $res = $db->query("SELECT * FROM tarefas ORDER BY status, id DESC");
        foreach ($res as $row) {
        ?>
          <tr class="ID<?php echo $row['id']; ?>">
            <td style="width: 10px;"><a href="tarefas-actions.php?id=<?php echo $row['id']; ?>&action=<?php echo $row['status'] == 2 ? 'unchecked' : 'check'; ?>"><span class="glyphicon glyphicon-<?php echo $row['status'] == 2 ? 'check' : 'unchecked'; ?> lg"></span></a></td>

            <?php if($row['status'] == 1){ ?>
            <td><?php echo $row['tarefa']; ?></td>
            <?php }else{  ?>
            <td class="text-muted"><strike><?php echo $row['tarefa']; ?><strike></td>
            <?php } ?>

            <td><a href="#" rel="<?php echo $row['id']; ?>" class="del"><span class="glyphicon glyphicon-remove lg"></span></a></td>
          </tr>
          <?php } ?>

        </tbody>
      </table>
  </div>

</div>



       <?php
        $id = (int) $_GET['id'];
        $res = $db->query("SELECT * FROM notas WHERE id = '$id' LIMIT 1");
        foreach ($res as $row) {
          $titulo = $row['titulo'];
          $nota = nl2br($row['nota']);
        }
       ?>

       <div class="row">

         <div class="col-md-9">

            <div class="panel panel-default">
              <div class="panel-heading"><strong><?php echo $titulo; ?></strong></div>
              <div class="panel-body">

                <a href="?p=notas-edit&id=<?php echo $row['id']; ?>" class="label label-default">Editar</a>
                <hr />

                <code><?php echo $nota; ?></code>

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
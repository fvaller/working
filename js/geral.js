    $(function(){

      $("#tarefa").focus();

      //Marca tarefa como resolvida
      $('.rows').click(function(){
        $('.ID'+this.rel).fadeOut("slow");
        $.get('tarefas-actions.php', 'id='+this.rel+'&action=check');
        return false;
      });

      $('#btn-projeto').click(function(){
        var a = $('#projeto').val();
        $.post('projetos-actions.php?action=insert', 'projeto='+a);
        return false;
      });


      //Excluir
      $('.del').click(function(){
        $('.ID'+this.rel).fadeOut("slow");
        $.get('tarefas-actions.php', 'id='+this.rel+'&action=delete');
        return false;
      });

    });
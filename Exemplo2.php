<?php
  $dadosFuncionario = array(
      array('nome'=>'João','idade'=>22,'cidade'=>'Nova Friburgo'),
      array('nome'=>'Pedro','idade'=>24,'cidade'=>'Bom Jardim'),
      array('nome'=>'Tiago','idade'=>30,'cidade'=>'Cantagalo')    
  );
?>
<html>
    <head>
    </head>
    <body>
        <?php
          $MontarTabela = function ($dados): string{
              $retorno = "<table><tr><th>Nome</th><th>Idade</th><th>Cidade</th></tr>";
              for($i = 0; $i < count($dados); $i++){
                  $retorno .= "<tr><td>".$dados[$i]['nome']."</td>".
                  "<td>".$dados[$i]['idade']."</td>".
                  "<td>".$dados[$i]['cidade']."</td></tr>";
              }
              $retorno .= "</table>";
              return $retorno;
          };
          echo $MontarTabela($dadosFuncionario);
        ?>
    </body>
</html>

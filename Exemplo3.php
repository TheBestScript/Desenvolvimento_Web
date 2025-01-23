<?php
  $produtos = array(
      array('nome' => 'Headset', 'fabricante' => 'Logitech', 'preco' => 400),
      array('nome' => 'PS5', 'fabricante' => 'sony', 'preco' => 5400),
      array('nome' =>' Ratoeira', 'fabricante' => 'Gato', 'preco' => 2.39)    
  );
?>
<html>
    <head>
    </head>
    <body>
        <?php
          $montarTabela = function ($dados): string{
              $retorno = "<table><tr><th>Produto</th><th>Fabricante</th><th>Preço</th></tr>";
              foreach($dados as $d){
                  $retorno .= "<tr><td>".$d['nome']."</td>".
                  "<td>".$d['idade']."</td>".
                  "<td>" . $d['cidade']."</td></tr>";
              }
              $retorno .= "</table>";
              return $retorno;
          };
          echo $montarTabela($produtos);
        ?>
    </body>
</html>

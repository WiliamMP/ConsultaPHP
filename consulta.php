<?php
  require_once ("core/Query.php");
    /* @var $oQuery Query */

      $oQuery = new Query();


      $sql = "select * from tbproduto order by codigo asc";

      $aDadosProdutos = $oQuery->selectAll($sql);

if(@$_POST['acao'] === 'EXECUTA_ALTERACAO'){
  $codigo = $_POST['codigo'];
  $descr  = $_POST['descricao'];
  $prec   = $_POST['preco'];
  
  $sql_update = "UPDATE public.tbproduto SET descricao='$descr', preco=$prec where codigo=$codigo";  
  
  $execute = $oQuery->select($sql_update);
}

  @$method    = $_GET['method'];
  @$codigo    = $_GET['codigo'];
  @$descricao = $_GET['descricao'];
  @$preco     = $_GET['preco'];

if($method === 'alterar'){
  $html_menu = '<!DOCTYPE html>
                <html lang="en">
                <head>
                  <meta charset="UTF-8">
                  <meta http-equiv="X-UA-Compatible" content="IE=edge">
                  <meta name="viewport" content="width=device-width, initial-scale=1.0">
                  <link rel="stylesheet" href="style.css">
                  <link rel="stylesheet" href="menu.css">
                  <script src="js/app.js"></script>
                  

                  <title>Tabela Consulta</title>
                </head>
                <body>

                <div id="menu-suspend" class="menu-suspend active">
                <div class="div-header">
                  <header>
                    <h1>MODIFICAR</h1>
                  </header>
                  <a class="a-close" onclick="Fecharmenu()" href="#">x</a>
                </div>
                <form action="consulta.php" method="POST">
                <input id="acao" name="acao" type="hidden" value="EXECUTA_ALTERACAO">
                <label for="codigo">Código:</label>
                <input class="cod" type="text" placeholder="Código" id="codigo" name="codigo" value="'.$codigo.'">
                <br>
                  <label for="descricao">Descrição:</label>
                  <input class="desc" placeholder="Descrição" id="descricao" name="descricao" value="'.$descricao.'" type="text">
                <br>
                  <label for="preco">Preço:</label>
                  <input class="prec" placeholder="R$20.19" id="preco" name="preco" type="text" value="'.$preco.'">
                <br>
                <input class="btn-submit" type="submit" value="Alterar">
                </form>
                </div>
                ';

} else {
  
  $html_menu = '
                <!DOCTYPE html>
                <html lang="en">
                <head>
                  <meta charset="UTF-8">
                  <meta http-equiv="X-UA-Compatible" content="IE=edge">
                  <meta name="viewport" content="width=device-width, initial-scale=1.0">
                  <link rel="stylesheet" href="style.css">
                  <link rel="stylesheet" href="menu.css">
                  <script src="js/app.js"></script>
                  

                  <title>Tabela Consulta</title>
                </head>
                <body>

                <div id="menu-suspend" class="menu-suspend">
                <div class="div-header">
                  <header>
                    <h1>MODIFICAR</h1>
                  </header>
                  <a class="a-close" onclick="Fecharmenu()" href="#">x</a>
                </div>
                <form action="consulta.php" method="POST">
                <input id="acao" name="acao" type="hidden" value="EXECUTA_ALTERACAO">
                <label for="codigo">Código:</label>
                <input class="cod" type="text" placeholder="Código" id="codigo" name="codigo" value="'.$codigo.'">
                <br>
                  <label for="descricao">Descrição:</label>
                  <input class="desc" placeholder="Descrição" id="descricao" name="descricao" value="'.$descricao.'" type="text">
                <br>
                  <label for="preco">Preço:</label>
                  <input class="prec" placeholder="R$20.19" id="preco" name="preco" type="text" value="'.$preco.'">
                <br>
                <input class="btn-submit" type="submit" value="Alterar">
                </form>
                </div>
                ';  



}
 // Head da table     
$html_cabecalho_consulta = '
                    
                    <div class="data-info">
                          <table>
                              <tr>
                                <th>Código</th>
                                <th>Descricao</th>
                                <th>Preço</th>
                                <th>Ações</th>
                             </tr>';      

// Dados aparecendo na consulta                   
$html_dados_consulta = '';    
                         
  foreach($aDadosProdutos as $produto){  
                           
$html_dados_consulta .= '
                    <tr class="tr-info">
                      <td>'.$produto['codigo'].'</td>
                      <td>'.$produto['descricao'].'</td>
                      <td>'.$produto['preco'].'</td>
                        <td>
                          <button class="btn-delete" id="delete" onclick=""><a href="?method=delete">Deletar</a></button>
                          <button class="btn-modify" id="delete" onclick="Abrirmenu()"><a href="?method=alterar&codigo='.$produto['codigo'].'&descricao='.$produto['descricao'].'&preco='.$produto['preco'].'">Alterar</a></button>
                        </td>
                    </tr>

';
}
// Finalizando tabela
$html_rodape_consulta = '</table></div></body>
</html>';

// Juntando     
$html = $html_menu . $html_cabecalho_consulta . $html_dados_consulta . $html_rodape_consulta;  


echo $html;
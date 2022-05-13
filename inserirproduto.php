<?php
function executaInclusao(){
  echo 'executando inclusao de dados...<br><br><br>';
    require_once ("core/Query.php");
    /* @var $oQuery Query */

      $oQuery = new Query();

    // buscar o ultimo codigo mais 1

     $sql_codigo = "select codigo + 1 as codigo from tbproduto order by codigo desc limit 1";
     
      $aDados = $oQuery->select($sql_codigo);
      
     $codigo_produto = $aDados["codigo"];
     $descricao = $_POST["descricao"];
     $preco     = $_POST["preco"];
     
 echo 'proximo codigo do produto: ' . $codigo_produto;
 
      $sql_insert = "INSERT INTO public.tbproduto (codigo, descricao, preco)
        VALUES($codigo_produto, '$descricao', $preco);";
      $oQuery->executaQuery($sql_insert);

      
    // Chama a tela de consulta
    header('Location: consulta.php?acao=CONSULTA');
}
if(isset($_POST["acao"])){
  // faz algo
  $acao = $_POST["acao"];
  if($acao === "EXECUTA_INCLUSAO"){
      // Faz a inclusao
      executaInclusao();
  }
} else {
  echo 'Parametros invalidos!';
}
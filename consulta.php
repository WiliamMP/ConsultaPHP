<?php

  require_once ("core/Query.php");
  require_once ("website/head.php");
  require_once ("website/header.php");
  require_once ("addons/atualizar.php"); // Require para atualizar o produto
  require_once ("addons/excluir.php"); // Require para Excluir o produto
  


  
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
                      <td>R$'.str_replace('.',',',$produto['preco']).'</td>
                        <td>
                          <button class="btn-delete" id="delete" onclick="abrirMenuExclusao()"><a class="a-btn" href="?method=delete&codigo='.$produto['codigo'].'&descricao='.$produto['descricao'].'&preco='.str_replace('.',',',$produto['preco']).'">Deletar</a></button>
                          
                          <button class="btn-modify" id="modify" onclick="Abrirmenu()"><a class="a-btn" href="?method=alterar&codigo='.$produto['codigo'].'&descricao='.$produto['descricao'].'&preco='.str_replace('.',',',$produto['preco']).'">Alterar</a></button>
                        </td>
                    </tr>

';
}
// Finalizando tabela
$html_rodape_consulta = '</table></div></body>
</html>';

$botao_redirecionar = '<a class="a-redirecionar" href="index.php">Inserir</a>';

// Juntando     
$html = $html_menu . $html_cabecalho_consulta . $html_dados_consulta . $html_rodape_consulta . $botao_redirecionar;  


echo $html;
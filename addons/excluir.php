<?php
require_once ("core/Query.php");

@$method    = $_GET['method'];

@$id = $_GET['codigo'];

if ($method === 'delete'){
  $html_menu_exclusao = '
              <link rel="stylesheet" href="css/menuExclusao.css">
              <script src="js/app.js"></script>
                      <div id="menu-suspenso" class="menu-suspenso ativo">
                        <div class="suspenso-header">
                          <header>
                            <h1>Exclusão</h1>
                            <a onclick="fecharMenuExclusao()" class="a-suspenso" href="#">x</a>
                          </header>
                        </div>
                        <div class="suspenso-content">
                          <form action="consulta.php?action=delete&codigo='.$id.'&confirm=true" method="POST">
                         <input id="acao" name="acao" type="hidden" value="EXECUTA_EXCLUSAO">
                            <label for="">DESEJA EXCLUIR AS INFORMAÇÕES?</label>
                            <br>
                            <input class="btn confirm" type="submit" value="Confirmar">
                            <button onclick="cancelado()" class="btn cancel">Cancelar</button>
                          </form>
                        </div>
                        </div>';
                        echo $html_menu_exclusao;

} else {
  $html_menu_exclusao = '
              <link rel="stylesheet" href="css/menuExclusao.css">
              <script src="js/app.js"></script>
                      <div id="menu-suspenso" class="menu-suspenso">
                        <div class="suspenso-header">
                          <header>
                            <h1>Exclusão</h1>
                            <a onclick="fecharMenuExclusao()" class="a-suspenso" href="#">x</a>
                          </header>
                        </div>
                        <div class="suspenso-content">
                          <form action="#" method="POST">
                            <label for="">DESEJA EXCLUIR AS INFORMAÇÕES?</label>
                            <br>
                            <input class="btn confirm" type="submit" value="Confirmar">
                            <button onclick="cancelado()" class="btn cancel">Cancelar</button>
                          </form>
                        </div>
                        </div>';
                        echo $html_menu_exclusao;
                      }

@$confirmacao = $_GET['confirm'];
if ($confirmacao === 'true') {
  $sql_update = "DELETE FROM public.tbproduto
  WHERE codigo=$id;";

  $execute = $oQuery->select($sql_update);
  header('Location: '.'consulta.php');
}
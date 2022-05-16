// Menu de Alterar

function Abrirmenu(){
  var Menu = document.getElementById('menu-suspend');
  Menu.setAttribute("class","menu-suspend active");
}
function Fecharmenu(){
  var Menu = document.getElementById('menu-suspend');
  Menu.setAttribute("class","menu-suspend");
}

// Menu de Excluir

function abrirMenuExclusao(){
  var Exlusao = document.getElementById('menu-suspenso');
  Exlusao.setAttribute('class','menu-suspenso ativo');
  console.log('abriu');
}
function fecharMenuExclusao(){
  var Exlusao = document.getElementById('menu-suspenso');
  Exlusao.setAttribute('class','menu-suspenso');
  console.log('fechou');
}
function cancelado(){
  history.pushState({},null,'consulta.php');
}
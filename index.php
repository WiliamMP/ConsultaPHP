<?php

// cadastro produto


// 1 - ok - tabela no banco de dados

// 2 - ok - cadastro em html

// 3 - consulta

// 4 - inclusao

// 5 - alteracao

// 6 - exclusao

$html_cadastro = '
              <link rel="stylesheet" href="style.css">
              <div class="insert" style="margin-left: 100px;">
                <br>
                <br>
                <br>
                
                <form action="inserirproduto.php" method="POST">
                <input id="acao" name="acao" type="hidden" value="EXECUTA_INCLUSAO">
                <label for="codigo">Código:</label>
                  <input type="text" id="codigo" disabled size="5" name="codigo">
                  
                    <br><br>
                  <label for="desc">Descrição:</label>
                    <br>
                  <input type="text" id="descricao" size="75" name="descricao">
                  
                   <br><br>
                  <label for="preco">Preço:</label>
                   <br>
                  <input type="text" id="preco" size="75" name="preco">

                    <br><br>
                  <input type="submit" value="Confirmar">
                </form>
              </div>

';

echo $html_cadastro;
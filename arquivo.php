<?php

$nome  = $_POST["nome"];    // Campos "name" inseridos no <form>
$matricula = $_POST["matricula"];


$empregados = [];  // Variável usada para guardar os dados acima no formato JSON.



// O trecho abaixo pode estar dentro de um WHILE para guardar a resposta de um SELECT por exemplo
// Neste exemplo estamos apenas devolvendo o que o usuário digitou no formulário
$resposta = 
      [
         "nome"  => $nome,
         "matricula" => $matricula
      ];

array_push($empregados, $resposta);
// Até aqui ficaria dentro do WHILE.



// Ao sair do WHILE enviamos de volta para a função JavaScript no formato JSON:
$json_texto = json_encode(["empregados" => $empregados]);
echo($json_texto);  // Será retornado para dentro do "success" do arquivo index.html

?>
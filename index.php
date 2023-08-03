<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Alunos</title>
</head>
<body>

<!-- 
    Complete este programa para enviar os dados via AJAX para um arquivo PHP 
    Em seguida faça o PHP retornar um "echo" para a função JavaScript e insira
    uma nova linha na tabela.
    PASSO 1) Criar o onclick NO LUGAR CERTO
    PASSO 2) Criar a função Javascript e enviar os dados para o PHP
    PASSO 3) Criar o PHP conforme exemplos anteriores
    PASSO 4) Usar o exemplo do Google DOCs de como preencher uma tabela via AJAX.
--> 

    <form action="" method="post" id="form1">
        DIGITE A MATRÍCULA: <input type="text" id="matricula" name="matricula">
        <br>  <br>
        DIGITE O NOME: <input type="text" id="nome" name="nome">
        <br>   <br>
        
        <input type="button" name="enviar" value="Enviar" onclick="Listar();" />

    </form>

    <br> <br>

    <form action="" method="post" id="lista">
        <input type="button" name="enviar" value="Enviar" onclick="Lista();" />
    </form>
    <table align="center" width="400px" border="1" id="tabela1">
        <tr>
            <td> MATRÍCULA </td>  <td> NOME </td>
        </tr>
            <?php
            $x=0; 
            for($x=1;$x<=10;$x++)
            {
              ?><tr></tr><td> <?php echo($nome) ?> </td>  <td> <?php echo($matricula) ?> </td></tr><?php
            }
            ?>
    </table>

</body>
<script type="text/javascript">
	
	
    function Listar(){
        // A variável "dados" conterá todos os campos do <form id="form1">
        var dados = $('#form1').serialize(); // TODOS OS CAMPOS DO <form> DEVEM TER 'name='
        
        function Lista(){
            
        }

        $.ajax({
            type: "POST",
            url: "arquivo.php",
            data: dados,
            dataType: 'json',
                            
            success: function(meu_json)
            {
                
                var valores = meu_json;          // Vem do arquivo.php
                var lista = valores.empregados;  // Pega os dados dos "empregados"
              
                for(x=0;x<lista.length;x++)
                {
                    console.log(lista[x].nome);     // Lista cada nome dentro de "empregados"
                    console.log(lista[x].matricula);    // Poderíamos usar innerHTML ou inserir
                    
                    <?php echo($nome) ?> = lista[x].nome;
                    <?php echo($matricula) ?> = lista[x].matricula;
                    
                    console.log("  ");
                }
            },
            error: function(xhr, status, error) {
                // Aqui poderíamos preencher uma <div> com o innerHTML por exemplo
                console.error('Ocorreu um erro ao enviar os dados: ' + error);
              },
            beforeSend: function(xhr) {
                // Faz algo antes do envio, como exibir uma animação por exemplo.
            },
            complete: function(xhr, status) {
                // Faz algo após a conclusão, como ocultar uma animação por exemplo. 
                // Vai ser executado mesmo se ocorrer um erro.
            },
            timeout: 5000    // Define um tempo limite de 5 segundos (5000 milissegundos)
        });  
    }
</script>
</html>
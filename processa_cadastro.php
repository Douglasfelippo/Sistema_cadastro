<?php

$hostname = "127.0.0.1";
$usuario = "root"; 
$senha = ""; 
$bancodedados = "cadastro"; 

// Cria a conexão
$conexao = new mysqli($hostname, $usuario, $senha, $bancodedados);


// Recuperar os dados do formulário
$nome = $_POST['nome'];
$data_falecimento = $_POST['data_falecimento'];
$quadra = $_POST['quadra'];
$numero = $_POST['numero'];
$junto_com = $_POST['junto_com'];
$lote = $_POST['lote'];


// Inserir os dados no banco de dados
$sql = "INSERT INTO falecido (nome_falecido, data_falec, quadra, numero, junto_com, lote) VALUES ('$nome', '$data_falecimento', '$quadra','$numero','$junto_com','$lote')";

if ($conexao->query($sql) === TRUE) {
    echo "Cadastro realizado com sucesso!";
    echo '<a href="cadastro.html"><button>Voltar para Novo Cadastro</button></a>';
    } 
else {
    echo "Erro ao cadastrar: " . $conexao->error;
}

$conexao->close();
?>



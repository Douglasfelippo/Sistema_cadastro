<?php
$hostname = "127.0.0.1";
$usuario = "root"; 
$senha = ""; 
$bancodedados = "cadastro";

        $conexao = new mysqli($hostname, $usuario, $senha, $bancodedados);
            if ($conexao->connect_error) {
                die("Conexão falhou: " . $conexao->connect_error);
                    }


                    if(isset($_POST['pesquisa'])) {
                        $termo_pesquisa = $_POST['pesquisa'];
                    }

// Consulta SQL para buscar os dados no banco de dados
$sql = "SELECT * FROM falecido WHERE nome_falecido LIKE '%$termo_pesquisa%'";

$result = $conexao->query($sql);


    if ($result->num_rows > 0) {
    // Existe pelo menos um registro com o ID especificado
        $row = $result->fetch_assoc();
    
            // Preencha as variáveis com os dados do banco de dados
            $id = $row["id"];
            $nome_falecido = $row["nome_falecido"];
            $data_falec = $row["data_falec"];
            $quadra = $row["quadra"];
            $numero = $row["numero"];
            $lote = $row["lote"];
            $junto_com = $row["junto_com"];
    } 
    else {
        echo "Nenhum registro encontrado com o ID especificado";
    }

$conexao->close();

        include("atualizar.html");
?>


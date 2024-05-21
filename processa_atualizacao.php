<?php
$hostname = "127.0.0.1";
$usuario = "root"; 
$senha = ""; 
$bancodedados = "cadastro";
        // Verifique se os dados do formulário foram enviados
        if ($_SERVER["atualizar_dados.php"] == "POST") {}
            // Verifique se todos os campos obrigatórios estão presentes
            if (isset($_POST['nome'], $_POST['data_falecimento'], $_POST['quadra'], $_POST['numero'], $_POST['junto_com'], $_POST['lote'])) {}
                // Conecte-se ao banco de dados
                    // Substitua 'localhost', 'nome_do_usuario', 'senha' e 'nome_do_banco_de_dados' pelos seus próprios detalhes de conexão
                $conexao = new mysqli($hostname, $usuario, $senha, $bancodedados);
        
        // Verifique a conexão
        if ($conexao->connect_error) {
            die("Erro de conexão: " . $conexao->connect_error);
        }
        
        // Prepare e execute a declaração SQL para atualizar os dados
        $nome = $_POST['nome_falecido'];
        $data_falecimento = $_POST['data_falec'];
        $quadra = $_POST['quadra'];
        $numero = $_POST['numero'];
        $junto_com = $_POST['junto_com'];
        $lote = $_POST['lote'];
        
        $sql = "UPDATE falecido SET nome_falecido='$nome', data_falec='$data_falecimento', quadra='$quadra', numero='$numero', junto_com='$junto_com', lote='$lote' WHERE id=$id";
        
                    if ($conexao->query($sql) === TRUE) {
                        echo "Dados atualizados com sucesso!";
                    } else {
                        echo "Erro ao atualizar os dados: " . $conexao->error;
                    }
        
        // Feche a conexão
        $conexao->close();

?>

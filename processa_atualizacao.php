<?php
$hostname = "127.0.0.1";
$usuario = "root"; 
$senha = ""; 
$bancodedados = "cadastro";
    
                $conexao = new mysqli($hostname, $usuario, $senha, $bancodedados);
        
        
        if ($conexao->connect_error) {
            die("Erro de conexão: " . $conexao->connect_error);
        }
        
        // Prepara e executa o SQL para atualizar os dados
        $id = $_POST['id'];
        $nome = $_POST['nome_falecido'];
        $data_falecimento = $_POST['data_falec'];
        $quadra = $_POST['quadra'];
        $numero = $_POST['numero'];
        $junto_com = $_POST['junto_com'];
        $lote = $_POST['lote'];
        
        $sql = "UPDATE falecido SET nome_falecido='$nome', data_falec='$data_falecimento', quadra='$quadra', numero='$numero', junto_com='$junto_com', lote='$lote' Where id='$id'";
        
                    if ($conexao->query($sql) === TRUE) {
                        echo "Dados atualizados com sucesso!";
                        echo "<button onclick='window.location.href=\"pesquisa.html\";'><i class='fas fa-sync'></i> Voltar a Pesquisa</button>";
                    } else {
                        echo "Erro ao atualizar os dados: " . $conexao->error;
                    }
        
        // Fecha a conexão
        $conexao->close();

?>

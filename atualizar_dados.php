<?php
$hostname = "127.0.0.1";
$usuario = "root"; 
$senha = ""; 
$bancodedados = "cadastro";

        $conexao = new mysqli($hostname, $usuario, $senha, $bancodedados);
            if ($conexao->connect_error) {
                die("Conexão falhou: " . $conexao->connect_error);
                    }

                $termo_pesquisa ="";
                    if(isset($_POST['pesquisa'])) {
                        $termo_pesquisa = $_POST['pesquisa'];
                        }
                    // Consulta SQL para buscar os dados no banco de dados
                         $sql = "SELECT * FROM falecido WHERE nome_falecido LIKE '%$termo_pesquisa%'";
                             $result = $conexao->query($sql);

                    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
                        $id = intval($_POST['id']);  // Converte o ID para um inteiro para segurança
                    
                        // Consulta para selecionar o registro com o ID fornecido
                        $sql = "SELECT * FROM falecido WHERE id = ?";
                        $stmt = $conexao->prepare($sql);
                        $stmt->bind_param("i", $id);
                        $stmt->execute();
                        $result = $stmt->get_result();}
                    
                        if ($result->num_rows > 0) {
                            // Obtém o registro
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






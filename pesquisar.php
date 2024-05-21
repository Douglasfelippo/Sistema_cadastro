<?php
$hostname = "127.0.0.1";
$usuario = "root"; 
$senha = ""; 
$bancodedados = "cadastro";

// Conexão com o banco de dados
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
    // Exibir os dados encontrados
    while($row = $result->fetch_assoc()) {
        echo "<div style='font-family: Arial, sans-serif; font-size: 20px; text-align: center;'>";
            echo "<strong>Nome:</strong> " . $row["nome_falecido"]. "<br>",
                "<strong>Data de Falecimento:</strong>" . $row["data_falec"]. "<br>" , 
                "<strong>Quadra:</strong> " . $row["quadra"]. "<br>" , 
                "<strong>Numero:</strong> " . $row["numero"]. "<br>" , 
                "<strong>Junto com:</strong> " . $row["junto_com"]. "<br>" , 
                "<strong>Lote:</strong> " . $row["lote"]. "<br><br>";
            echo "<button onclick='window.print();'><i class='fas fa-print'></i> Imprimir</button>"; // Botão de impressão com ícone de impressora
            echo "<button onclick='window.location.href=\"atualizar_dados.php\";'><i class='fas fa-sync'></i> Atualizar</button>";

        
    }
} else {
    echo "<div style='font-size: 20px; text-align: center;'>";
        echo "Nenhum resultado encontrado." . $termo_pesquisa;
    

}

$conexao->close();
?>



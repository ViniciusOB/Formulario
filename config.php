<?php
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'formulario_vinicius';

try {
    
    $conexao = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUsername, $dbPassword);

    
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
   
    die("Erro na conexão: " . $e->getMessage());
}


if(isset($_POST['submit'])){
  
    $stmt = $conexao->prepare("INSERT INTO usuarios (nome, email, telefone, sexo, data_nascimento, cidade, estado, endereco) 
                               VALUES (:nome, :email, :telefone, :sexo, :data_nascimento, :cidade, :estado, :endereco)");

    
    $nome = htmlspecialchars($_POST['nome'], ENT_QUOTES, 'UTF-8');
    $email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
    $telefone = htmlspecialchars($_POST['telefone'], ENT_QUOTES, 'UTF-8');
    $sexo = htmlspecialchars($_POST['genero'], ENT_QUOTES, 'UTF-8');
    $data_nascimento = htmlspecialchars($_POST['data_nascimento'], ENT_QUOTES, 'UTF-8');
    $cidade = htmlspecialchars($_POST['cidade'], ENT_QUOTES, 'UTF-8');
    $estado = htmlspecialchars($_POST['estado'], ENT_QUOTES, 'UTF-8');
    $endereco = htmlspecialchars($_POST['endereco'], ENT_QUOTES, 'UTF-8');

   
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':telefone', $telefone);
    $stmt->bindParam(':sexo', $sexo);
    $stmt->bindParam(':data_nascimento', $data_nascimento);
    $stmt->bindParam(':cidade', $cidade);
    $stmt->bindParam(':estado', $estado);
    $stmt->bindParam(':endereco', $endereco);

   
    try {
        $stmt->execute();
        echo "Registro inserido com sucesso.";
    } catch(PDOException $e) {
        
        die("Erro ao inserir registro: " . $e->getMessage());
    }
}
?>

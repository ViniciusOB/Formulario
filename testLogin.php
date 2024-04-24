<?php
session_start();
if(isset($_POST['submit_login']) && !empty($_POST['email']) && !empty($_POST['senha'])){
    include_once('config.php');
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    
    $sql = "SELECT * FROM usuarios WHERE email = :email AND senha = :senha";
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':senha', $senha);
    $stmt->execute();
    
    
    if($stmt->rowCount() > 0){
    
        $_SESSION['email'] = $email;
        $_SESSION['senha'] = $senha;
        header('Location: sistema.php');
        exit();
    } else {
       
        header('Location: login.php');
        exit();
    }
} else {
    
    header('Location: login.php');
    exit();
}
?>

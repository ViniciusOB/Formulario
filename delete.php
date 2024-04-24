<?php
if(!empty($_GET['id'])) {
    include_once('config.php');

    
    $id = $_GET['id'];

    
    $sqlSelect = "SELECT * FROM usuarios WHERE id = :id";
    $stmtSelect = $conexao->prepare($sqlSelect);
    $stmtSelect->bindParam(':id', $id, PDO::PARAM_INT);
    $stmtSelect->execute();
    $resultSelect = $stmtSelect->fetchAll(PDO::FETCH_ASSOC);

   
    if($resultSelect) {
       
        $sqlDelete = "DELETE FROM usuarios WHERE id = :id";
        $stmtDelete = $conexao->prepare($sqlDelete);
        $stmtDelete->bindParam(':id', $id, PDO::PARAM_INT);
        $stmtDelete->execute();
    }
}

header('Location: sistema.php');
exit();
?>

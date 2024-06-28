<!-- arquivo responsável por exibir a tela de confirmação de exclusão de uma conta -->
<?php
include 'conta_pagar.php';

// Verifica se o parâmetro id foi passado via GET
if (!isset($_GET['id'])) {
    echo "ID da conta não especificado.";
    exit; // Termina o script se o ID não estiver presente
}

$id_conta_pagar = $_GET['id'];

// exclui a conta usando a função deleteConta
if (deleteConta($id_conta_pagar)) {
    echo "Conta excluída com sucesso!";
} else {
    echo "Erro ao excluir conta.";
}

?>
<div><button onclick="window.location.href='../index.php'">Voltar</button></div>

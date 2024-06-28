<!-- arquivo responsável por exibir a tela de confirmação de criação de uma conta -->
<?php
include 'conta_pagar.php';

$valor = $_POST['valor'];
$data_pagar = $_POST['data_pagar'];
$id_empresa = $_POST['id_empresa'];

if(addConta($valor, $data_pagar, $id_empresa)) {
    echo "Conta adicionada com sucesso!";
} else {
    echo "Erro ao adicionar conta.";
}
?>
<div><button onclick="window.location.href='../index.php'">Voltar</button></div>

<!-- arquivo responsável por exibir a tela de confirmação de edição de uma conta -->
<?php
include 'conta_pagar.php';

$id_conta_pagar = $_POST['id_conta_pagar'];
$valor = $_POST['valor'];
$data_pagar = $_POST['data_pagar'];
$id_empresa = $_POST['id_empresa'];

if(updateConta($id_conta_pagar, $valor, $data_pagar, $id_empresa)) {
    echo "Conta editada com sucesso!";
} else {
    echo "Erro ao editar conta.";
}
?>
<div><button onclick="window.location.href='../index.php'">Voltar</button></div>


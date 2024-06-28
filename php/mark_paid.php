<!-- arquivo responsável por exibir a confirmação de pagamento de uma conta -->
<?php
include 'conta_pagar.php';

$id_conta_pagar = $_GET['id'];
$data_pagamento = date('Y-m-d'); // Data atual, você pode ajustar conforme necessário

if(markAsPaid($id_conta_pagar, $data_pagamento)) {
    echo "Conta marcada como paga com sucesso!";
} else {
    echo "Erro ao marcar conta como paga.";
}
?>
<div><button onclick="window.location.href='../index.php'">Voltar</button></div>

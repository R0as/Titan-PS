<!-- arquivo com todas as funções usadas para o site -->
<?php
include 'db.php';

//função responsável por adcionar uma nova conta a ser paga
function addConta($valor, $data_pagar, $id_empresa) {
    global $conn;
    $sql = "INSERT INTO tbl_conta_pagar (valor, data_pagar, id_empresa) VALUES ('$valor', '$data_pagar', '$id_empresa')";
    return $conn->query($sql);
}

//função responsável por listar as contas na tabela
function getContas() {
    global $conn;
    $sql = "SELECT cp.*, e.nome as empresa_nome FROM tbl_conta_pagar cp JOIN tbl_empresa e ON cp.id_empresa = e.id_empresa";
    return $conn->query($sql);
}

//função responsável por deletar uma conta da tabela
function deleteConta($id_conta_pagar) {
    global $conn;
    $sql = "DELETE FROM tbl_conta_pagar WHERE id_conta_pagar='$id_conta_pagar'";
    return $conn->query($sql);
}

//função responsável por listar as contas na tabela e fazer o calculo das regras de negócio
function markAsPaid($id_conta_pagar, $data_pagamento) {
    global $conn;

    // Obter informações da conta
    $sql_select = "SELECT * FROM tbl_conta_pagar WHERE id_conta_pagar='$id_conta_pagar'";
    $result = $conn->query($sql_select);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $valor = $row['valor'];
        $data_pagar = $row['data_pagar'];

        // Calcular o desconto ou acréscimo com base na data de pagamento
        if ($data_pagamento < $data_pagar) {
            // Conta paga antes da data de pagamento
            $valor_atualizado = $valor * 0.95; // Aplicar desconto de 5%
        } elseif ($data_pagamento == $data_pagar) {
            // Conta paga no dia do pagamento
            $valor_atualizado = $valor; // Sem desconto ou acréscimo
        } else {
            // Conta paga após a data de pagamento
            $valor_atualizado = $valor * 1.10; // Aplicar acréscimo de 10%
        }

        // Atualizar o pagamento da conta no banco de dados
        $sql_update = "UPDATE tbl_conta_pagar SET pago=1, valor='$valor_atualizado' WHERE id_conta_pagar='$id_conta_pagar'";
        if ($conn->query($sql_update) === TRUE) {
            return true; // Atualização bem-sucedida
        } else {
            return false; // Erro na execução do SQL
        }
    } else {
        return false; // Caso não encontre a conta com o ID especificado
    }
}

//função responsável por pegar o ID das contas para serem usadas nas requisições
function getContaById($id_conta_pagar) {
    global $conn;
    $sql = "SELECT * FROM tbl_conta_pagar WHERE id_conta_pagar='$id_conta_pagar'";
    return $conn->query($sql);
}

//função responsável por editar as contas na tabela
function updateConta($id_conta_pagar, $valor, $data_pagar, $id_empresa) {
    global $conn;
    $sql = "UPDATE tbl_conta_pagar SET valor='$valor', data_pagar='$data_pagar', id_empresa='$id_empresa' WHERE id_conta_pagar='$id_conta_pagar'";
    return $conn->query($sql);
}


?>

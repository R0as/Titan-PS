<!-- pagina principal onde é exibida a tabela -->
<!DOCTYPE html>
<html>
<head>
    <title>Controle Financeiro</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
    <div class="navbar">
        <h1 class="title">Controle financeiro de contas a pagar</h1>
        <button onclick="window.location.href='add_conta.php'">Adicionar Conta</button>
    </div>  
    <div class="main">
        <table>
            <tr>
                <th>Empresa</th>
                <th>Data de Pagamento</th>
                <th>Valor</th>
                <th>Pago</th>
                <th>Ações</th>
            </tr>
            <?php
            include 'php/conta_pagar.php';
            $contas = getContas();
            while($row = $contas->fetch_assoc()) {
                
                echo "<tr>";
                echo "<td>".$row['empresa_nome']."</td>";
                echo "<td>".$row['data_pagar']."</td>";
                echo "<td>R$ ".number_format($row['valor'], 2, ',', '.')."</td>";
                echo "<td>".($row['pago'] ? 'Sim' : 'Não')."</td>";
                echo "<td>
                <div class='btn-table'>
                <button onclick=\"window.location.href='edit_conta.php?id=".$row['id_conta_pagar']."'\" class='botao-editar'>Editar</button>
                <button onclick=\"window.location.href='php/mark_paid.php?id=".$row['id_conta_pagar']."'\" class='botao-marcar-pago'>Marcar como Pago</button>               
                <button onclick=\"window.location.href='php/delete_conta.php?id=".$row['id_conta_pagar']."'\" class='minha-classe-css'>Excluir</button>
                </div>
                </td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>

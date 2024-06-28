<!-- formulário de edição de conta -->
<!DOCTYPE html>
<html>
<head>
    <title>Editar Conta</title>
    <script src="js/script.js"></script>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
    <h1>Editar conta a pagar</h1>
    <?php
    include 'php/conta_pagar.php';
    $id_conta_pagar = $_GET['id'];
    $conta = getContaById($id_conta_pagar)->fetch_assoc();
    ?>
    <form name="contaForm" id="contaForm" action="php/edit_conta_process.php" method="post">
        <input type="hidden" name="id_conta_pagar" value="<?php echo $conta['id_conta_pagar']; ?>">
        <label>Empresa:</label>
        <select name="id_empresa">
            <?php
            include 'php/empresa.php';
            $empresas = getEmpresas();
            while($row = $empresas->fetch_assoc()) {
                $selected = $row['id_empresa'] == $conta['id_empresa'] ? 'selected' : '';
                echo "<option value='".$row['id_empresa']."' $selected>".$row['nome']."</option>";
            }
            ?>
        </select>
        <label>Data de Pagamento:</label>
        <input type="date" name="data_pagar" value="<?php echo $conta['data_pagar']; ?>">
        <label>Valor:</label>
        <input type="text" name="valor" value="<?php echo $conta['valor']; ?>">
        <button type="submit">Salvar</button>
    </form>
    <button onclick="window.location.href='index.php'">Voltar</button>
</body>
</html>

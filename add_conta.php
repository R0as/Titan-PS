<!-- formulário de adição de conta -->
<!DOCTYPE html>
<html>
<head>
    <title>Adicionar Conta</title>
    <script src="js/script.js"></script>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
    <h1>Adicionar conta a pagar</h1>
    <form name="contaForm" id="contaForm" action="php/add_conta_process.php" method="post">
        <label>Empresa:</label>
        <select name="id_empresa">
            <?php
            include 'php/empresa.php';
            $empresas = getEmpresas();
            while($row = $empresas->fetch_assoc()) {
                echo "<option value='".$row['id_empresa']."'>".$row['nome']."</option>";
            }
            ?>
        </select>
        <label>Data de Pagamento:</label>
        <input type="date" name="data_pagar">
        <label>Valor:</label>
        <input type="text" name="valor">
        <button type="submit">Adicionar</button>
    </form>
    <button onclick="window.location.href='index.php'">Voltar</button>
</body>
</html>

<!-- arquivo responsavel por buscar as empresas cadastradas no banco de dados -->
<?php
include 'db.php';

function getEmpresas() {
    global $conn;
    $sql = "SELECT * FROM tbl_empresa";
    $result = $conn->query($sql);
    return $result;
}
?>

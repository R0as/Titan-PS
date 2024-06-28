// script responsavel por fazer a verificação se há algum campo vazio nos formulários
document.addEventListener("DOMContentLoaded", function () {
    console.log("DOM fully loaded and parsed");

    // Função para validar o formulário de adição de contas
    function validateForm(event) {
        console.log("Validating form...");
        let form = document.forms["contaForm"];
        let valor = form["valor"].value;
        let dataPagar = form["data_pagar"].value;
        let idEmpresa = form["id_empresa"].value;

        if (idEmpresa === "") {
            alert("Por favor, selecione uma empresa.");
            event.preventDefault(); // Impede o envio do formulário
            return false;
        }
        if (valor === "" || isNaN(valor) || parseFloat(valor) <= 0) {
            alert("Por favor, insira um valor válido.");
            event.preventDefault(); // Impede o envio do formulário
            return false;
        }
        if (dataPagar === "") {
            alert("Por favor, selecione uma data de pagamento.");
            event.preventDefault(); // Impede o envio do formulário
            return false;
        }
        return true;
    }

    // Associa a função de validação ao evento de submissão do formulário
    let contaForm = document.getElementById("contaForm");
    if (contaForm) {
        console.log("Form found, attaching validation function.");
        contaForm.onsubmit = validateForm;
    } else {
        console.log("Form not found!");
    }
});

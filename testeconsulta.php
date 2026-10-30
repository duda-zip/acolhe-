<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta</title>
</head>
<body onload="ConsultaCliente()">

<h2>Lista de clientes cadastrados</h2>

<div id="resultadocliente"> </div>

<div id="formularioAlterar" style="display:none;">
    <h2>Alterar Dados do Cliente</h2>
    <form id="formAlterarCliente" method="POST" action="contrcliente.php">
    <input type="text" name="name" id="name" placeholder="Nome" required><br>
    <input type="text" name="company" id="company" placeholder="Empresa" required><br>
    <input type="text" id="cnpj" name="cnpj" readonly><br>
    <input type="text" name="address" id="address" placeholder="Endereço" required><br>
    <input type="email" name="email" id="email" placeholder="E-mail" required><br>
    <input type="password" name="pass" id="pass" placeholder="Senha" minlength="8" required><br>
    <input type="number" name="telephone" id="telephone" placeholder="Telefone" required><br><br>

    <input type="hidden" id="cnpjAlteracao" name="cnpjAlteracao">
    <button type="button" onclick="salvarAlteracao()">Salvar Alterações</button>
    <button type="button" onclick="fecharFormulario()">Cancelar</button>
    </form>
</div>

<script>
function ConsultaCliente() {
    const xhttp = new XMLHttpRequest();
    xhttp.open("GET", "contrcliente.php?ListaCliente", true);
    xhttp.send();

    xhttp.onload = function() {
        console.log("Resposta do servidor:", this.responseText);
        try {
            var resposta = JSON.parse(this.responseText);

            if (resposta.length === 0) {
                document.getElementById('resultadocliente').innerHTML = "<p>Nenhum cliente encontrado.</p>";
            } else {
                var organizar = "<table><thead><tr><th>Nome</th><th>CNPJ</th><th>Email</th><th>Empresa</th><th>Endereço</th><th>Senha</th><th>Telefone</th><th>Ações</th></tr></thead><tbody>";

                for (var i = 0; i < resposta.length; i++) {
    organizar += "<tr><td>" + resposta[i].name + "</td>" +
        "<td>" + resposta[i].cnpj + "</td>" +
        "<td>" + resposta[i].email + "</td>" +
        "<td>" + resposta[i].company + "</td>" +
        "<td>" + resposta[i].address + "</td>" +
        "<td>" + resposta[i].pass + "</td>" +
        "<td>" + resposta[i].telephone + "</td>" +
        "<td><button onclick='carregarFormularioAlterar(\"" + resposta[i].cnpj + "\")'>Alterar</button>" +
        "<button onclick='deletarCliente(\"" + resposta[i].cnpj + "\")'>Deletar</button></td>" +
        "</tr>";
}

                organizar += `</tbody></table>`;
                document.getElementById('resultadocliente').innerHTML = organizar;
            }
        } catch (error) {
            console.error("Erro ao processar a resposta JSON:", error);
            document.getElementById('resultadocliente').innerHTML = "Erro ao carregar os clientes.";
        }
    };

    xhttp.onerror = function() {
        console.error("Erro ao tentar fazer a requisição.");
        document.getElementById('resultadocliente').innerHTML = "<p>Erro ao fazer a requisição.</p>";
    };
}


function carregarFormularioAlterar(cnpj) {
    const xhttp = new XMLHttpRequest();
    xhttp.open("GET", "contrcliente.php?ConsultaClienteCNPJ=" + cnpj, true);
    xhttp.send();

    xhttp.onload = function() {
        console.log("Resposta ao carregar formulário:", this.responseText);
        try {
            const cliente = JSON.parse(this.responseText);

            if (cliente && !cliente.erro) {
                document.getElementById('name').value = cliente.name || "";
                document.getElementById('company').value = cliente.company || "";
                document.getElementById('address').value = cliente.address || "";
                document.getElementById('email').value = cliente.email || "";
                document.getElementById('pass').value = cliente.pass || "";
                document.getElementById('telephone').value = cliente.telephone || "";
                document.getElementById('cnpj').value = cliente.cnpj || "";

                document.getElementById('formularioAlterar').style.display = 'block';
                document.getElementById('cnpjAlteracao').value = cliente.cnpj || "";
            } else {
                alert(cliente.erro || "Erro: Cliente não encontrado.");
            }
        } catch (error) {
            console.error("Erro ao processar a resposta JSON:", error);
            alert("Erro ao carregar os dados do cliente.");
        }
    };

    xhttp.onerror = function() {
        console.error("Erro ao buscar os dados do cliente.");
        alert("Erro na requisição ao servidor.");
    };
}



function salvarAlteracao() {
    const clienteData = {
        cnpj: document.getElementById('cnpj').value,
        name: document.getElementById('name').value,
        company: document.getElementById('company').value,
        address: document.getElementById('address').value,
        email: document.getElementById('email').value,
        pass: document.getElementById('pass').value,
        telephone: document.getElementById('telephone').value,
        acao: 'alterar'
    };

    const xhttp = new XMLHttpRequest();
    xhttp.open("POST", "contrcliente.php", true);
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    const data = Object.keys(clienteData)
        .map(key => `${encodeURIComponent(key)}=${encodeURIComponent(clienteData[key])}`)
        .join('&');

    xhttp.send(data);

    xhttp.onload = function () {
        alert(this.responseText);
        if (this.responseText === "Cliente alterado com sucesso!") {
            fecharFormulario();
            ConsultaCliente();
        }
    };

    xhttp.onerror = function () {
        alert("Erro ao salvar alterações.");
    };
}

function fecharFormulario() {
    document.getElementById('formularioAlterar').style.display = 'none';
}

function deletarCliente(cnpj) {
    if (confirm("Tem certeza que deseja excluir este cliente?")) {
        const xhttp = new XMLHttpRequest();
        xhttp.open("POST", "contrcliente.php", true);
        xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        const data = `acao=deletar&cnpj=${cnpj}`;

        xhttp.send(data);

        xhttp.onload = function() {
            alert(this.responseText);
            if (this.responseText === "Cliente removido com sucesso!") {
                ConsultaCliente();
            }
        };
    } else {
        console.log("Exclusão cancelada.");
    }
}
</script>
</body>
</html>
<h1>Listar Empréstimo</h1>
<?php
$sql = "SELECT * FROM emprestimo";
$res = $conn->query($sql);

if ($res === false) {
    die('Erro na consulta SQL para empréstimos: ' . $conn->error);
}

$qtd = $res->num_rows;

if ($qtd > 0) {
    print "<p>Encontrou <b>$qtd</b> resultado(s)</p>";
    print "<table class='table table-bordered table-striped table-hover'>";
    print "<tr>";
    print "<th>#</th>";
    print "<th>Livro</th>";
    print "<th>Usuário</th>";
    print "<th>Funcionário</th>";
    print "<th>Data de Empréstimo</th>";
    print "<th>Data de Devolução</th>";
    print "<th>Ações</th>";
    print "</tr>";

    while ($row = $res->fetch_object()) {
        // Substitua os IDs pelos nomes dos respectivos registros nas tabelas relacionadas
        $livro = obterNomeLivro($conn, $row->livro_id_livro);
        $usuario = obterNomeUsuario($conn, $row->usuario_id_usuario);
        $funcionario = obterNomeFuncionario($conn, $row->funcionario_id_funcionario);

        print "<tr>";
        print "<td>" . (isset($row->livro_id_livro) ? $row->livro_id_livro : "") . "</td>";
        print "<td>" . $livro . "</td>";
        print "<td>" . $usuario . "</td>";
        print "<td>" . $funcionario . "</td>";
        print "<td>" . $row->data_emprestimo . "</td>";
        print "<td>" . $row->data_devolucao . "</td>";
        print "<td>
            <button onclick=\"location.href='?page=emprestimo-editar&livro_id_livro=" . $row->livro_id_livro . "';\" class='btn btn-success'>Editar</button>
            <button onclick=\"if (confirm('Tem certeza que deseja excluir?')){location.href='?page=emprestimo-salvar&acao=excluir&livro_id_livro=" . $row->livro_id_livro . "';}else{false;}\" class='btn btn-danger'>Excluir</button>
        </td>";
        print "</tr>";
    }

    print "</table>";
} else {
    print "Não encontrou resultado";
}

function obterNomeLivro($conn, $livro_id)
{
    $sql = "SELECT titulo_livro FROM livro WHERE id_livro = $livro_id";
    $res = $conn->query($sql);

    if ($res === false) {
        die('Erro na consulta SQL para obter nome do livro: ' . $conn->error);
    }

    $livro = $res->fetch_object();
    return $livro ? $livro->titulo_livro : "Livro não encontrado";
}

function obterNomeUsuario($conn, $usuario_id)
{
    $sql = "SELECT nome_usuario FROM usuario WHERE id_usuario = $usuario_id";
    $res = $conn->query($sql);

    if ($res === false) {
        die('Erro na consulta SQL para obter nome do usuário: ' . $conn->error);
    }

    $usuario = $res->fetch_object();
    return $usuario ? $usuario->nome_usuario : "Usuário não encontrado";
}

function obterNomeFuncionario($conn, $funcionario_id)
{
    $sql = "SELECT nome_funcionario FROM funcionario WHERE id_funcionario = $funcionario_id";
    $res = $conn->query($sql);

    if ($res === false) {
        die('Erro na consulta SQL para obter nome do funcionário: ' . $conn->error);
    }

    $funcionario = $res->fetch_object();
    return $funcionario ? $funcionario->nome_funcionario : "Funcionário não encontrado";
}
?>
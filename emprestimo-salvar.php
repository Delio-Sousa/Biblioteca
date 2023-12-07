<?php
switch ($_REQUEST['acao']) {
    case 'cadastrar':
        $livro_id_livro = $_POST['livro_id_livro'];
        $usuario_id_usuario = $_POST['usuario_id_usuario'];
        $funcionario_id_funcionario = $_POST['funcionario_id_funcionario'];
        $data_emprestimo = $_POST['data_emprestimo'];
        $data_devolucao = $_POST['data_devolucao'];

        $sql = "INSERT INTO emprestimo (livro_id_livro, usuario_id_usuario, funcionario_id_funcionario, data_emprestimo, data_devolucao) 
                VALUES ('$livro_id_livro', '$usuario_id_usuario', '$funcionario_id_funcionario', '$data_emprestimo', '$data_devolucao')";
        $res = $conn->query($sql);

        if ($res == true) {
            echo "<script>alert('Cadastrou o empréstimo com sucesso!');</script>";
            echo "<script>location.href='?page=emprestimo-listar';</script>";
        } else {
            echo "<script>alert('Não foi possível cadastrar o empréstimo');</script>";
            echo "<script>location.href='?page=emprestimo-listar';</script>";
        }
        break;

    case 'editar':
        // Adapte este trecho conforme necessário, considerando a estrutura da sua tabela
        $sql = "UPDATE emprestimo SET
                    usuario_id_usuario='" . $_POST['usuario_id_usuario'] . "',
                    funcionario_id_funcionario='" . $_POST['funcionario_id_funcionario'] . "',
                    data_emprestimo='" . $_POST['data_emprestimo'] . "',
                    data_devolucao='" . $_POST['data_devolucao'] . "'
                WHERE
                    livro_id_livro=" . $_POST['livro_id_livro'];
        $res = $conn->query($sql);

        if ($res == true) {
            echo "<script>alert('Editou o empréstimo com sucesso!');</script>";
            echo "<script>location.href='?page=emprestimo-listar';</script>";
        } else {
            echo "<script>alert('Não foi possível editar o empréstimo');</script>";
            echo "<script>location.href='?page=emprestimo-listar';</script>";
        }
        break;

    case 'excluir':
        $sql = "DELETE FROM emprestimo WHERE livro_id_livro=" . $_REQUEST['livro_id_livro'];
        $res = $conn->query($sql);

        if ($res == true) {
            echo "<script>alert('Excluiu o empréstimo com sucesso!');</script>";
            echo "<script>location.href='?page=emprestimo-listar';</script>";
        } else {
            echo "<script>alert('Não foi possível excluir o empréstimo');</script>";
            echo "<script>location.href='?page=emprestimo-listar';</script>";
        }
        break;
}

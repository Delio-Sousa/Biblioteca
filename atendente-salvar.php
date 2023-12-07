<?php
switch ($_REQUEST['acao']) {
    case 'cadastrar':
        $nome_funcionario = $_POST["nome_funcionario"];
        $cpf_funcionario = $_POST["cpf_funcionario"];
        $email_funcionario = $_POST["email_funcionario"];
        $fone_funcionario = $_POST["fone_funcionario"];

        $sql = "INSERT INTO funcionario (nome_funcionario, cpf_funcionario, email_funcionario, fone_funcionario) VALUES('{$nome_funcionario}','{$cpf_funcionario}','{$email_funcionario}','{$fone_funcionario}')";
        $res = $conn->query($sql);
        if ($res == true) {
            print "<script>alert('Cadastrou com sucesso!');</script>";
            print "<script>location.href='?page=atendente-listar';</script>";
        } else {
            print "<script>alert('Não foi possível cadastrar');</script>";
            print "<script>location.href='?page=atendente-listar';</script>";
        }
        break;

    case 'editar':
        $sql = "UPDATE funcionario SET
					nome_funcionario='" . $_POST['nome_funcionario'] . "',
                    cpf_funcionario='" . $_POST['cpf_funcionario'] . "',
                    email_funcionario='" . $_POST['email_funcionario'] . "',
                    fone_funcionario='" . $_POST['fone_funcionario'] . "'
				WHERE
					id_funcionario=" . $_POST['id_funcionario'];

        $res = $conn->query($sql);

        if ($res == true) {
            print "<script>alert('Editou com sucesso!');</script>";
            print "<script>location.href='?page=funcionario-listar';</script>";
        } else {
            print "<script>alert('Não foi possível cadastrar');</script>";
            print "<script>location.href='?page=funcionario-listar';</script>";
        }
        break;

    case 'excluir':
        $sql = "DELETE FROM funcionario WHERE id_funcionario=" . $_REQUEST['id_funcionario'];

        $res = $conn->query($sql);

        if ($res == true) {
            print "<script>alert('Excluiu com sucesso!');</script>";
            print "<script>location.href='?page=funcionario-listar';</script>";
        } else {
            print "<script>alert('Não foi possível excluir');</script>";
            print "<script>location.href='?page=funcionario-listar';</script>";
        }
        break;
}

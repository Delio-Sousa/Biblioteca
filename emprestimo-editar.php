<h1>Editar Empréstimo</h1>
<?php
if (isset($_GET['livro_id_livro'])) {
    $livro_id_livro = $_GET['livro_id_livro'];
    $sql = "SELECT * FROM emprestimo WHERE livro_id_livro=" . $livro_id_livro;
    $res = $conn->query($sql);
    $row = $res->fetch_object();
?>
    <form action="?page=emprestimo-salvar" method="POST">
        <input type="hidden" name="acao" value="editar">
        <input type="hidden" name="livro_id_livro" value="<?php echo $row->livro_id_livro; ?>">
        <div class="mb-3">
            <label>Usuário do Empréstimo</label>
            <input type="text" value="<?php echo $row->usuario_id_usuario; ?>" name="usuario_id_usuario" class="form-control">
        </div>
        <div class="mb-3">
            <label>Funcionário do Empréstimo</label>
            <input type="text" value="<?php echo $row->funcionario_id_funcionario; ?>" name="funcionario_id_funcionario" class="form-control">
        </div>
        <div class="mb-3">
            <label>Data de Empréstimo</label>
            <input type="text" value="<?php echo $row->data_emprestimo; ?>" name="data_emprestimo" class="form-control">
        </div>
        <div class="mb-3">
            <label>Data de Devolução</label>
            <input type="text" value="<?php echo $row->data_devolucao; ?>" name="data_devolucao" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Enviar</button>
    </form>
<?php
} else {
    echo "ID de livro não especificado.";
}
?>
<h1>Cadastrar Empréstimo</h1>
<form action="?page=emprestimo-salvar" method="POST">
    <input type="hidden" name="acao" value="cadastrar">

    <div class="mb-3">
        <label>Livro</label>
        <select name="livro_id_livro" class="form-control">
            <?php
            $sqlLivros = "SELECT id_livro, titulo_livro FROM livro";
            $resLivros = $conn->query($sqlLivros);

            if ($resLivros === false) {
                die('Erro na consulta SQL para livros: ' . $conn->error);
            }

            if ($resLivros->num_rows > 0) {
                while ($livro = $resLivros->fetch_object()) {
                    echo "<option value='" . $livro->id_livro . "'>" . $livro->titulo_livro . "</option>";
                }
            } else {
                echo "<option value=''>Nenhum livro disponível</option>";
            }
            ?>
        </select>
    </div>

    <div class="mb-3">
        <label>Usuário</label>
        <select name="usuario_id_usuario" class="form-control">
            <?php
            $sqlUsuarios = "SELECT id_usuario, nome_usuario FROM usuario";
            $resUsuarios = $conn->query($sqlUsuarios);

            if ($resUsuarios->num_rows > 0) {
                while ($usuario = $resUsuarios->fetch_object()) {
                    echo "<option value='" . $usuario->id_usuario . "'>" . $usuario->nome_usuario . "</option>";
                }
            } else {
                echo "<option value=''>Nenhum usuário disponível</option>";
            }
            ?>
        </select>
    </div>

    <div class="mb-3">
        <label>Funcionário</label>
        <select name="funcionario_id_funcionario" class="form-control">
            <?php
            $sqlFuncionarios = "SELECT id_funcionario, nome_funcionario FROM funcionario";
            $resFuncionarios = $conn->query($sqlFuncionarios);

            if ($resFuncionarios->num_rows > 0) {
                while ($funcionario = $resFuncionarios->fetch_object()) {
                    echo "<option value='" . $funcionario->id_funcionario . "'>" . $funcionario->nome_funcionario . "</option>";
                }
            } else {
                echo "<option value=''>Nenhum funcionário disponível</option>";
            }
            ?>
        </select>
    </div>

    <div class="mb-3">
        <label>Data de Empréstimo</label>
        <input type="date" name="data_emprestimo" class="form-control">
    </div>

    <div class="mb-3">
        <label>Data de Devolução</label>
        <input type="date" name="data_devolucao" class="form-control">
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-success">Enviar</button>
    </div>
</form>
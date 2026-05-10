<?php require_once __DIR__ . '/../controllers/Funcionarios.controller.php';
$controller = new FuncionariosController();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $controller->salvar();
}
$funcionarios = $controller->listar();

?>
<?php require_once './components/header.php'; ?>

<title>Funcionários</title>
</head>

<body>
    <div class="container">
        <h1>Gerenciamento de Funcionários</h1>

        <form method="POST" action="" class="form-container">
            <div class="form-group">
                <label for="dt_nascimento">Data de Nascimento</label>
                <input type="date" id="dt_nascimento" name="dt_nascimento" required>
            </div>

            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" id="nome" name="nome" required>
            </div>

            <div class="form-group">
                <label for="salario">Salário</label>
                <input type="number" id="salario" name="salario" step="0.01" required>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-primary">Salvar</button>
                <a href="index.php" class="btn-secondary">Voltar</a>
            </div>
        </form>

        <div class="table-container">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Data de Nascimento</th>
                        <th>Nome</th>
                        <th>Salário</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($funcionarios as $funcionario): ?>
                        <tr>
                            <td><?= $funcionario->getId() ?></td>
                            <td><?= $funcionario->getDtNascimento() ?></td>
                            <td><?= $funcionario->getNome() ?></td>
                            <td><?= $funcionario->getSalario() ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
<?php require_once './components/footer.php'; ?>
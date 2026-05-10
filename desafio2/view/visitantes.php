<?php require_once __DIR__ . '/../controllers/Visitantes.controller.php';
$controller = new VisitantesController();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $controller->salvar();
}
$visitantes = $controller->listar();

?>
<?php require_once './components/header.php'; ?>

<title>Visitantes moles</title>
</head>

<body>
    <div class="container">
        <h1>Gerenciamento de Visitantes</h1>

        <form method="POST" action="" class="form-container">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" id="nome" name="nome" required>
            </div>

            <div class="form-group">
                <label for="cpf">CPF</label>
                <input type="text" id="cpf" name="cpf" maxlength="11" required>
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
                        <th>Nome</th>
                        <th>CPF</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($visitantes as $visitante): ?>
                        <tr>
                            <td><?= $visitante->getId() ?></td>
                            <td><?= $visitante->getNome() ?></td>
                            <td><?= $visitante->getCpf() ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
<?php require_once './components/footer.php'; ?>
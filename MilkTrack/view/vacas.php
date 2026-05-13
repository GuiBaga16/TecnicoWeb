<?php require_once __DIR__ . '/../controllers/Vacas.controller.php';
$controller = new VacasController();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $controller->salvar();
}
$vacas = $controller->listar();

?>

<title>Vacas</title>
</head>

<body>
    <div class="container">
        <h1>Gerenciamento de Vacas</h1>

        <form method="POST" action="" class="form-container">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" id="nome" name="nome" required>
            </div>

            <div class="form-group">
                <label for="raca">Raça</label>
                <input type="text" id="raca" name="raca" required>
            </div>

            <div class="form-group">
                <label for="data_nascimento">Data de Nascimento</label>
                <input type="date" id="data_nascimento" name="data_nascimento" required>
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
                        <th>Raça</th>
                        <th>Data de Nascimento</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($vacas as $vaca): ?>
                        <tr>
                            <td><?= $vaca->getId() ?></td>
                            <td><?= $vaca->getNome() ?></td>
                            <td><?= $vaca->getRaca() ?></td>
                            <td><?= $vaca->getDataNascimento() ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
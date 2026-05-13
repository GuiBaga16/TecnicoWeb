<?php require_once __DIR__ . '/../controllers/Leites.controller.php';
$controller = new LeitesController();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $controller->salvar();
}
$leite = $controller->listar();

?>

<title>Leite cremosos</title>
</head>

<body>
    <div class="container">
        <h1>Gerenciamento de Leite</h1>

        <form method="POST" action="" class="form-container">
            <div class="form-group">
                <label for="quantidade">Quantidade</label>
                <input type="text" id="quantidade" name="quantidade" required>
            </div>

            <div class="form-group">
                <label for="data_coleta">Data de Coleta</label>
                <input type="date" id="data_coleta" name="data_coleta" required>
            </div>

            <div class="form-group">
                <label for="qualidade">Qualidade</label>
                <input type="text" id="qualidade" name="qualidade" required>
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
                        <th>Quantidade</th>
                        <th>Data de Coleta</th>
                        <th>Qualidade</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($leite as $item): ?>
                        <tr>
                            <td><?= $item->getId() ?></td>
                            <td><?= $item->getQuantidade() ?></td>
                            <td><?= $item->getDataColeta() ?></td>
                            <td><?= $item->getQualidade() ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
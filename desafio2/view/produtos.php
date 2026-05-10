<?php require_once __DIR__ . '/../controllers/Produtos.controller.php';
$controller = new ProdutosController();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $controller->salvar();
}
$produtos = $controller->listar();

?>
<?php require_once './components/header.php'; ?>

<title>Produtos</title>
</head>

<body>
    <div class="container">
        <h1>Gerenciamento de Produtos</h1>

        <form method="POST" action="" class="form-container">
            <div class="form-group">
                <label for="idbarras">ID de Barras</label>
                <input type="text" id="idbarras" name="idbarras" maxlength="13" required>
            </div>

            <div class="form-group">
                <label for="descricao">Descrição</label>
                <input type="text" id="descricao" name="descricao" required>
            </div>

            <div class="form-group">
                <label for="preco">Preço</label>
                <input type="number" id="preco" name="preco" step="0.01" required>
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
                        <th>ID de Barras</th>
                        <th>Descrição</th>
                        <th>Preço</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($produtos as $produto): ?>
                        <tr>
                            <td><?= $produto->getId() ?></td>
                            <td><?= $produto->getIdbarras() ?></td>
                            <td><?= $produto->getDescricao() ?></td>
                            <td><?= $produto->getPreco() ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
<?php require_once './components/footer.php'; ?>
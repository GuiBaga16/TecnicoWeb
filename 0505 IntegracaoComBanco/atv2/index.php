<?php

$host = "localhost";
$porta = "5432";
$database = "webDB";
$usuario = "postgres";
$senha = "postgres";

$dsn = "pgsql:host=$host;port=$porta;dbname=$database";
$conexao = new PDO($dsn, $usuario, $senha);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $codigoDeBarras = $_POST['codigoDeBarras'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];

    $sql = "INSERT INTO produtos(codigoDeBarras, descricao, preco) VALUES (?, ?, ?)";
    $stmt = $conexao->prepare($sql);
    $stmt->execute([$codigoDeBarras, $descricao, $preco]);
}

$sqlListagem = "SELECT * FROM produtos";
$resultado = $conexao->query($sqlListagem);
$produtos = $resultado->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action="">
        <label>Codigo de barras</label>
        <input type="text" name="codigoDeBarras">
        <label>Descricao</label>
        <input type="text" name="descricao">
        <label>Preço</label>
        <input type="number" name="preco" step="0.01">
        <button type="submit">Salvar</button>
    </form>

    <table>
        <tr>
            <br>
            <th>ID</th>
            <th>Código de Barras</th>
            <th>Descrição</th>
            <th>Preço</th>
        </tr>
        <?php foreach ($produtos as $produto): ?>
        <tr>
            <td><?= $produto['id'] ?></td>
            <td><?= $produto['codigodebarras'] ?></td>
            <td><?= $produto['descricao'] ?></td>
            <td><?= $produto['preco'] ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
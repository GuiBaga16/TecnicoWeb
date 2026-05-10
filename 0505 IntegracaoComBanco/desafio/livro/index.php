<?php

$host = "localhost";
$porta = "4777";
$database = "webDB";
$usuario = "postgres";
$senha = "postgres";

$dsn = "pgsql:host=$host;port=$porta;dbname=$database";
$conexao = new PDO($dsn, $usuario, $senha);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $isbn = $_POST['isbn'];
    
    $sql = "INSERT INTO livros(titulo, autor, isbn) VALUES (?, ?, ?)";
    $smtm = $conexao->prepare($sql);
    $smtm->execute([$titulo, $autor, $isbn]);
}

$sqlListagem = "SELECT * FROM livros";
$resultado = $conexao->query($sqlListagem);
$livros = $resultado->fetchAll(PDO::FETCH_ASSOC);

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
        <label>Título</label>
        <input type="text" name="titulo">
        <label>Autor</label>
        <input type="text" name="autor">
        <label>ISBN</label>
        <input type="text" name="isbn">
        <button type="submit">Salvar</button>
    </form>

    <table> 
        <tr>
            <br>
            <th>Code</th>
            <th>Título</th>
            <th>Autor</th>
            <th>ISBN</th>
        </tr>
        <?php foreach ($livros as $livro): ?>
        <tr>
            <td><?= $livro['cd'] ?></td>
            <td><?= $livro['titulo'] ?></td>
            <td><?= $livro['autor'] ?></td>
            <td><?= $livro['isbn'] ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
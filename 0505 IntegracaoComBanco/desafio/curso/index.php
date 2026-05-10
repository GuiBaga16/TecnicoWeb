<?php

$host = "localhost";
$porta = "4777";
$database = "webDB";
$usuario = "postgres";
$senha = "postgres";

$dsn = "pgsql:host=$host;port=$porta;dbname=$database";
$conexao = new PDO($dsn, $usuario, $senha);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $cargaHoraria = $_POST['cargahoraria'];
    $categoria = $_POST['categoria'];
    
    $sql = "INSERT INTO cursos(nome, cargahoraria, categoria) VALUES (?, ?, ?)";
    $smtm = $conexao->prepare($sql);
    $smtm->execute([$nome, $cargaHoraria, $categoria]);
}

$sqlListagem = "SELECT * FROM cursos";
$resultado = $conexao->query($sqlListagem);
$cursos = $resultado->fetchAll(PDO::FETCH_ASSOC);

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
        <label>Nome</label>
        <input type="text" name="nome">
        <label>Carga Horária</label>
        <input type="number" name="cargahoraria">
        <label>Categoria</label>
        <input type="text" name="categoria">
        <button type="submit">Salvar</button>
    </form>

    <table> 
        <tr>
            <br>
            <th>Code</th>
            <th>Nome</th>
            <th>Carga Horária</th>
            <th>Categoria</th>
        </tr>
        <?php foreach ($cursos as $curso): ?>
        <tr>
            <td><?= $curso['cd'] ?></td>
            <td><?= $curso['nome'] ?></td>
            <td><?= $curso['cargahoraria'] ?></td>
            <td><?= $curso['categoria'] ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
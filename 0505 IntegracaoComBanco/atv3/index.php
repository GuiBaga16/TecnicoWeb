<?php

$host = "localhost";
$porta = "5432";
$database = "webDB";
$usuario = "postgres";
$senha = "postgres";

$dsn = "pgsql:host=$host;port=$porta;dbname=$database";
$conexao = new PDO($dsn, $usuario, $senha);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dataNascimento = $_POST['dataNascimento'];
    $nome = $_POST['nome'];
    $salario = $_POST['salario'];

    $sql = "INSERT INTO funcionarios(dataNascimento, nome, salario) VALUES (?, ?, ?)";
    $smtm = $conexao->prepare($sql);
    $smtm->execute([$dataNascimento, $nome, $salario]);
}

$sqlListagem = "SELECT * FROM funcionarios";
$resultado = $conexao->query($sqlListagem);
$funcionarios = $resultado->fetchAll(PDO::FETCH_ASSOC);

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
        <label>Data Nascimento</label>
        <input type="date" name="dataNascimento">
        <label>Nome</label>
        <input type="text" name="nome">
        <label>Salario</label>
        <input type="number" name="salario" step="0.01">
        <button type="submit">Salvar</button>
    </form>

    <table>
        <tr>
            <br>
            <th>ID</th>
            <th>Data de Nascimento</th>
            <th>Nome</th>
            <th>Salário</th>
        </tr>
        <?php foreach ($funcionarios as $funcionario): ?>
        <tr>
            <td><?= $funcionario['id'] ?></td>
            <td><?= $funcionario['datanascimento'] ?></td>
            <td><?= $funcionario['nome'] ?></td>
            <td><?= $funcionario['salario'] ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>
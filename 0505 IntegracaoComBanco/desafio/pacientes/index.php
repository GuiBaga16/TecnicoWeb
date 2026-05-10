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
    $numeroProntuario = $_POST['numeroProntuario'];
    $tipoSanguineo = $_POST['tipoSanguineo'];
    
    $sql = "INSERT INTO pacientes(nome, numero_prontuario, tipo_sanguineo) VALUES (?, ?, ?)";
    $smtm = $conexao->prepare($sql);
    $smtm->execute([$nome, $numeroProntuario, $tipoSanguineo]);
}

$sqlListagem = "SELECT * FROM pacientes";
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
        <label>Nome</label>
        <input type="text" name="nome">
        <label>Número do Prontuário</label>
        <input type="text" name="numeroProntuario">
        <label>Tipo Sanguíneo</label>
        <input type="text" name="tipoSanguineo">
        <button type="submit">Salvar</button>
    </form>

    <table> 
        <tr>
            <br>
            <th>Code</th>
            <th>Nome</th>
            <th>Número do Prontuário</th>
            <th>Tipo Sanguíneo</th>
        </tr>
        <?php foreach ($livros as $livro): ?>
        <tr>
            <td><?= $livro['cd'] ?></td>
            <td><?= $livro['nome'] ?></td>
            <td><?= $livro['numero_prontuario'] ?></td>
            <td><?= $livro['tipo_sanguineo'] ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
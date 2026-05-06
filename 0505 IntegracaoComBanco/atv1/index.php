<?php

$host = "localhost";
$porta = "5432";
$database = "webDB";
$usuario = "postgres";
$senha = "postgres";

$dsn = "pgsql:host=$host;port=$porta;dbname=$database";
$conexao = new PDO($dsn, $usuario, $senha);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    
    $sql = "INSERT INTO visits(nome, cpf) VALUES (?, ?)";
    $smtm = $conexao->prepare($sql);
    $smtm->execute([$nome, $cpf]);
}

$sqlListagem = "SELECT * FROM visits";
$resultado = $conexao->query($sqlListagem);
$visitantes = $resultado->fetchAll(PDO::FETCH_ASSOC);

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
        <label>CPF</label>
        <input type="number" name="cpf">
        <button type="submit">Salvar</button>
    </form>

    <table> 
        <tr>
            <br>
            <th>ID</th>
            <th>Nome</th>
            <th>CPF</th>
        </tr>
        <?php foreach ($visitantes as $visitante): ?>
        <tr>
            <td><?= $visitante['id'] ?></td>
            <td><?= $visitante['nome'] ?></td>
            <td><?= $visitante['cpf'] ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
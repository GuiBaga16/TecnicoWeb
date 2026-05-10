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
    $dataEvento = $_POST['data_evento'];
    $localEvento = $_POST['local_evento'];
    
    $sql = "INSERT INTO eventos(nome, data_evento, local_evento) VALUES (?, ?, ?)";
    $smtm = $conexao->prepare($sql);
    $smtm->execute([$nome, $dataEvento, $localEvento]);
}

$sqlListagem = "SELECT * FROM eventos ORDER BY data_evento ASC";
$resultado = $conexao->query($sqlListagem);
$eventos = $resultado->fetchAll(PDO::FETCH_ASSOC);

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
        <label>Data do Evento</label>
        <input type="date" name="data_evento">
        <label>Local do Evento</label>
        <input type="text" name="local_evento">
        <button type="submit">Salvar</button>
    </form>

    <table> 
        <tr>
            <br>
            <th>Code</th>
            <th>Nome</th>
            <th>Data do Evento</th>
            <th>Local do Evento</th>
        </tr>
        <?php foreach ($eventos as $evento): ?>
        <tr>
            <td><?= $evento['cd'] ?></td>
            <td><?= $evento['nome'] ?></td>
            <td><?= $evento['data_evento'] ?></td>
            <td><?= $evento['local_evento'] ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
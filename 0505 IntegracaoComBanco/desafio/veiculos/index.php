<?php

$host = "localhost";
$porta = "4777";
$database = "webDB";
$usuario = "postgres";
$senha = "postgres";

$dsn = "pgsql:host=$host;port=$porta;dbname=$database";
$conexao = new PDO($dsn, $usuario, $senha);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $placa = $_POST['placa'];
    $modelo = $_POST['modelo'];
    $marca = $_POST['marca'];
    
    $sql = "INSERT INTO veiculos(placa, modelo, marca) VALUES (?, ?, ?)";
    $smtm = $conexao->prepare($sql);
    $smtm->execute([$placa, $modelo, $marca]);
}

$sqlListagem = "SELECT * FROM veiculos";
$resultado = $conexao->query($sqlListagem);
$veiculos = $resultado->fetchAll(PDO::FETCH_ASSOC);

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
        <label>Placa</label>
        <input type="text" name="placa">
        <label>Modelo</label>
        <input type="text" name="modelo">
        <label>Marca</label>
        <input type="text" name="marca">
        <button type="submit">Salvar</button>
    </form>

    <table> 
        <tr>
            <br>
            <th>Code</th>
            <th>Placa</th>
            <th>Modelo</th>
            <th>Marca</th>
        </tr>
        <?php foreach ($veiculos as $veiculo): ?>
        <tr>
            <td><?= $veiculo['cd'] ?></td>
            <td><?= $veiculo['placa'] ?></td>
            <td><?= $veiculo['modelo'] ?></td>
            <td><?= $veiculo['marca'] ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
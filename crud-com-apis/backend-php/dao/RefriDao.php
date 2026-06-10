<?php

require_once __DIR__ . '/../Database.php';
require_once __DIR__ . '/../model/Refrigerante.php';

// DAO: responsável por todas as operações no banco para Refrigerante
class RefrigeranteDao
{
    private $tabela    = 'refrigerantes';
    private $connection;

    public function __construct()
    {
        $db              = new Database();
        $this->connection = $db->connection;
    }

    public function salvar(Refrigerante $refrigerante)
    {
        $sql  = "INSERT INTO $this->tabela (nome, sabor, cor, quantidade) VALUES (?, ?, ?, ?)";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([$refrigerante->getNome(), $refrigerante->getSabor(), $refrigerante->getCor(), $refrigerante->getQuantidade()]);
    }

    public function buscarPorId($id)
    {
        $sql  = "SELECT * FROM $this->tabela WHERE id = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([$id]);
        $row  = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) return null;

        return new Refrigerante($row['nome'], $row['sabor'], $row['cor'], $row['quantidade'], $row['id']);
    }

    public function atualizar(Refrigerante $refrigerante)
    {
        $sql  = "UPDATE $this->tabela SET nome = ?, sabor = ?, cor = ?, quantidade = ? WHERE id = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([
            $refrigerante->getNome(),
            $refrigerante->getSabor(),
            $refrigerante->getCor(),
            $refrigerante->getQuantidade(),
            $refrigerante->getId()
        ]);
    }

    public function deletar($id)
    {
        $sql  = "DELETE FROM $this->tabela WHERE id = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([$id]);
    }

    public function listar()
    {
        $sql   = "SELECT * FROM $this->tabela ORDER BY id";
        $stmt  = $this->connection->query($sql);
        $rows  = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $refrigerantes = [];

        foreach ($rows as $row) {
            $refrigerantes[] = new Refrigerante($row['nome'], $row['sabor'], $row['cor'], $row['quantidade'], $row['id']);
        }

        return $refrigerantes;
    }
}

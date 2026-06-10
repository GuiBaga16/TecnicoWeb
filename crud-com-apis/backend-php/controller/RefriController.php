<?php

require_once __DIR__ . '/../dao/RefriDao.php';

// Controller: orquestra o DAO e retorna arrays prontos para virar JSON
class RefrigeranteController
{
    // Converte o objeto Refrigerante em array associativo
    private function refrigeranteParaArray(Refrigerante $refrigerante): array
    {
        return [
            'id'            => $refrigerante->getId(),
            'nome'          => $refrigerante->getNome(),
            'sabor'      => $refrigerante->getSabor(),
            'cor'       => $refrigerante->getCor(),
            'quantidade' => $refrigerante->getQuantidade(),
        ];
    }

    public function listar(): array
    {
        $dao   = new RefrigeranteDao();
        $refrigerantes = $dao->listar();
        return array_map([$this, 'refrigeranteParaArray'], $refrigerantes);
    }

    public function buscarPorId(int $id): array
    {
        $dao  = new RefrigeranteDao();
        $refrigerante = $dao->buscarPorId($id);

        if (!$refrigerante) {
            http_response_code(404);
            return ['erro' => 'Refrigerante não encontrado'];
        }

        return $this->refrigeranteParaArray($refrigerante);
    }

    public function salvar(array $dados): array
    {
        $refrigerante = new Refrigerante(
            $dados['nome'],
            $dados['sabor'],
            $dados['cor'],
            $dados['quantidade']
        );

        $dao = new RefrigeranteDao();
        $dao->salvar($refrigerante);

        http_response_code(201);
        return ['mensagem' => 'Refrigerante criado com sucesso'];
    }

    public function atualizar(int $id, array $dados): array
    {
        $refrigerante = new Refrigerante(
            $dados['nome'],
            $dados['sabor'],
            $dados['cor'],
            $dados['quantidade'],
            $id
        );

        $dao = new RefrigeranteDao();
        $dao->atualizar($refrigerante);

        return ['mensagem' => 'Refrigerante atualizado com sucesso'];
    }

    public function deletar(int $id): array
    {
        $dao = new RefrigeranteDao();
        $dao->deletar($id);
        return ['mensagem' => 'Refrigerante removido com sucesso'];
    }
}

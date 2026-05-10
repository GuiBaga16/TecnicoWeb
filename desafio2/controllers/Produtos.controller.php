<?php

require_once __DIR__ . '/../dao/Produtos.dao.php'; // carrega o DAO (que já carrega Database e Model)

// Controller: orquestra a comunicação entre o DAO e as Views
class ProdutosController
{
    // Retorna todos os produtos buscados do banco
    public function listar()
    {
        $dao = new ProdutosDao();
        return $dao->listar();
    }

    // Ação de cadastro: lê o POST, salva no banco e redireciona
    public function salvar()
    {
        // Cria o objeto com os dados enviados pelo formulário via POST
        $produto = new Produtos(
            $_POST['idbarras'],         // ID de barras
            $_POST['descricao'],        // Descrição do produto
            $_POST['preco']             // Preço do produto
        );

        $dao = new ProdutosDao(); // instancia o DAO
        $dao->salvar($produto);  // salva o objeto no banco


    }
}

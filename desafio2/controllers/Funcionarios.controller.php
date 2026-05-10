<?php

require_once __DIR__ . '/../dao/Funcionarios.dao.php'; // carrega o DAO (que já carrega Database e Model)

// Controller: orquestra a comunicação entre o DAO e as Views
class FuncionariosController
{
    // Retorna todos os funcionarios buscados do banco
    public function listar()
    {
        $dao = new FuncionariosDao();
        return $dao->listar();
    }

    // Ação de cadastro: lê o POST, salva no banco e redireciona
    public function salvar()
    {
        // Cria o objeto com os dados enviados pelo formulário via POST
        $funcionario = new Funcionarios(
            $_POST['dt_nascimento'],    // Data de nascimento
            $_POST['nome'],             // Nome do funcionário
            $_POST['salario']           // Salário do funcionário
        );

        $dao = new FuncionariosDao(); // instancia o DAO
        $dao->salvar($funcionario);  // salva o objeto no banco


    }
}

<?php

// Model: representa a entidade Refrigerante — só dados, sem lógica de banco
class Refrigerante
{
    private $id;
    private $nome;
    private $sabor;
    private $cor;
    private $quantidade;

    // $id é opcional: não existe ao criar, só após buscar do banco
    public function __construct($nome, $sabor, $cor, $quantidade, $id = null)
    {
        $this->nome         = $nome;
        $this->sabor        = $sabor;
        $this->cor          = $cor;
        $this->quantidade   = $quantidade;
        $this->id           = $id;
    }

    public function getId()           { return $this->id; }
    public function getNome()         { return $this->nome; }
    public function getSabor()        { return $this->sabor; }
    public function getCor()          { return $this->cor; }
    public function getQuantidade()   { return $this->quantidade; }
}

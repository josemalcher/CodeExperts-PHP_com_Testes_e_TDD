<?php

namespace Code;

class Acessorio
{
    private $nome;
    private $descricao;
    private $tipo;

    /**
     * @param $nome
     * @param $descricao
     * @param $tipo
     */
    public function __construct($nome, $descricao, $tipo)
    {
        $this->nome = $nome;
        $this->descricao = $descricao;
        $this->tipo = $tipo;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome): void
    {
        $this->nome = $nome;
    }

    /**
     * @return mixed
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * @param mixed $descricao
     */
    public function setDescricao($descricao): void
    {
        $this->descricao = $descricao;
    }

    /**
     * @return mixed
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * @param mixed $tipo
     */
    public function setTipo($tipo): void
    {
        $this->tipo = $tipo;
    }



}
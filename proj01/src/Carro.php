<?php


namespace Code;

class Carro
{
    private $acessorios = [];

    public function getAcessorios(): array
    {
        return $this->acessorios;
    }

    // Este método DEPENDE de um objeto Acessorio
    public function adicionarAcessorio(Acessorio $acessorio)
    {
        // Regra de negócio: Acessórios eletrônicos precisam de atenção especial
        if($acessorio->getNome() == 'Central Multimídia') {
            $acessorio->setTipo('Eletrônico Crítico');
        }

        $this->acessorios[] = $acessorio;
    }
}
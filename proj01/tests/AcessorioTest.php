<?php

use Code\Acessorio;
use PHPUnit\Framework\TestCase;

class AcessorioTest extends TestCase
{
    /**
     * @test  // <--- GARANTA QUE ESTA LINHA EXISTA
     */
    public function consegue_criar_acessorio_e_obter_dados(): void
    {
        $acessorio = new Acessorio(
            'Roda de Liga Leve',
            'Aro 17, 5 furos',
            'Roda'
        );
        $this->assertEquals('Roda de Liga Leve', $acessorio->getNome());
        $this->assertEquals('Aro 17, 5 furos', $acessorio->getDescricao());
        $this->assertEquals('Roda', $acessorio->getTipo());
    }

    /**
     * @test  // <--- GARANTA QUE ESTA LINHA EXISTA
     */
    public function consegue_alterar_dados(): void
    {
        // 1. Preparação (Arrange)
        $acessorio = new Acessorio('Nome Antigo', 'Desc Antiga', 'Tipo Antigo');

        // 2. Ação (Act)
        $acessorio->setNome('Nome Novo');
        $acessorio->setDescricao('Descrição Nova');

        // 3. Verificação (Assert)
        $this->assertEquals('Nome Novo', $acessorio->getNome());
        $this->assertEquals('Descrição Nova', $acessorio->getDescricao());
        $this->assertEquals('Tipo Antigo', $acessorio->getTipo()); // Verifica que este não mudou
    }


}
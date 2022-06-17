<?php

namespace Code;

use PHPUnit\Framework\TestCase;

class ProdutoTest extends TestCase
{
    public function testSeONomeDoProdutoESetadoCorretamente()
    {
        $produto = new Produto();
        $produto->setName('Produto 1');

        $this->assertEquals('Produto 2', $produto->getName(), 'Valores não são iguais');

    }
}
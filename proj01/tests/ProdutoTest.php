<?php

namespace Code;

use PHPUnit\Framework\TestCase;

class ProdutoTest extends TestCase
{
    public function testSeONomeDoProdutoESetadoCorretamente()
    {
        $produto = new Produto();
        $produto->setName('Produto 1');
        $this->assertEquals('Produto 1', $produto->getName(), 'Valores não são iguais');
    }
    public function testSeOPrecoESetadoCorretamente()
    {
        $produto = new Produto();
        $produto->setPrice(19.99);
        $this->assertEquals(19.99, $produto->getPrice(), 'Valores Do Preço não batem');
    }
    public function testSeOSlugESetadoCorretamente()
    {
        $produto = new Produto();
        $produto->setSlug('Produto_1');
        $this->assertEquals('Produto_1', $produto->getSlug(), 'Valores do Slug Não Bate');
    }
}
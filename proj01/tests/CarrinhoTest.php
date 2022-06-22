<?php

namespace Code;

use PHPUnit\Framework\TestCase;

class CarrinhoTest extends TestCase
{
    // Manipular Varios Produtos
    // Visualizar Produtos
    // Total de produtos | Total Compra

    public function testeSeClasseCarrinhoExiste()
    {
        $classe = class_exists('\\Code\\Carrinho');
        $this->assertTrue($classe);
    }

    public function testAdicaoDeProdutosNoCarrinho()
    {
        $produto = new Produto();
        $produto->setName('Produto 1');
        $produto->setPrice(19.99);
        $produto->setSlug('produto_1');

        $produto2 = new Produto();
        $produto2->setName('Produto 2');
        $produto2->setPrice(44.99);
        $produto2->setSlug('produto_2');

        $carrinho = new Carrinho();
        $carrinho->addProduto($produto);
        $carrinho->addProduto($produto2);

        $this->assertIsArray($carrinho->getProdutos());

        $this->assertInstanceOf('\\Code\\Produto', $carrinho->getProdutos()[0]);
        $this->assertInstanceOf('\\Code\\Produto', $carrinho->getProdutos()[1]);

    }

    
}
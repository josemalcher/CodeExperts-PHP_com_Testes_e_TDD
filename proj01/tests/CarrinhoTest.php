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
    
}
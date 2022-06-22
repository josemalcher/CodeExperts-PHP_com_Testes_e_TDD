<?php

namespace Code;

use function Webmozart\Assert\Assert;

class Carrinho
{
    private $produtos = [];

    public function addProduto($produto)
    {
        $this->produtos[] = $produto;
    }

    public function getProdutos()
    {
        return $this->produtos;
    }

    public function getTotalProdutos()
    {
        return count($this->produtos);
    }

    public function getTotalCompra()
    {
        $totalCompra = 0;
        foreach ($this->produtos as $produto) {
            $totalCompra += $produto->getPrice();
        }
        return $totalCompra;
    }
}
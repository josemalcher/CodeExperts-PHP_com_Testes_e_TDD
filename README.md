# PHP com Testes e TDD

https://codeexperts.com.br/



## <a name="indice">Índice</a>

1. [Introdução](#parte1)     
2. [Primeiros Passos com Testes](#parte2)     
3. [TDD - Test Driven Development](#parte3)     
4. [PHPUnit - Ambiente e Melhorias](#parte4)     
5. [Dublês de Teste: Stubs & Mocks](#parte5)     
6. [Componente - QueryBuilder](#parte6)     
7. [Testes com Banco de Dados - QueryBuilder / Executor]](#parte7)     
8. [Componente - Router](#parte8)     
9. [Publicando Pacotes](#parte9)     
---


## <a name="parte1">1 - Introdução</a>

- 01 - Introdução
- 02 - Quem Sou Eu?
- 03 - Ambiente & Links Importantes
 

[Voltar ao Índice](#indice)

---


## <a name="parte2">2 - Primeiros Passos com Testes</a>

- 04 Introdução a Testes
- 05 Iniciando Aplicação
- 06 Configurnado Ambiente com PHPunit

```
{
    "require": {
        "phpunit/phpunit": "^9.5"
    },
    "autoload": {
        "psr-4": {
            "Code\\": "src/"
        }
    },
    "scripts": {
        "test": "vendor/bin/phpunit"
    }
}

```
```
$ composer test
> vendor/bin/phpunit
PHPUnit 9.5.20 #StandWithUkraine

No tests executed!

```

- 07 Executando Primeiros Testes
- 08 Concluindo Primeiro Teste

```json
{
    "require": {
        "phpunit/phpunit": "^9.5"
    },
    "autoload": {
        "psr-4": {
            "Code\\": "src/"
        }
    },
    "config": {
        "bin-dir": "bin/"
    }
}

```

```xml
<phpunit bootstrap="vendor/autoload.php" colors="true">
    <testsuites>
        <testsuite name="Primeiro Teste">
            <directory>tests</directory>
        </testsuite>
    </testsuites>
</phpunit>
```

```php
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
```

```bash
$ bin/phpunit --testdox
PHPUnit 9.5.20 #StandWithUkraine

Produto (Code\Produto)
 ✔ Se o nome do produto e setado corretamente
 ✔ Se o preco e setado corretamente
 ✔ Se o slug e setado corretamente

Time: 00:00.011, Memory: 6.00 MB

OK (3 tests, 3 assertions)

```



[Voltar ao Índice](#indice)

---


## <a name="parte3">3 - TDD - Test Driven Development</a>

- 09 O que é TDD?
- 10 Iniciando Testes com TDD
- 11 Incrementando Carrinho de Compras com TDD
- 12 Concluindo Carrinho de Compras com TDD
- 13 Considerações Finais Módulo

[Voltar ao Índice](#indice)

---


## <a name="parte4">4 - PHPUnit - Ambiente e Melhorias</a>

- 14 Introdução Módulo
- 15 Métodos setUp & tearDown

```php

class CarrinhoTest extends TestCase
{

    private $carrinho;
    private $produto;

    public function setUp(): void
    {
        $this->carrinho = new Carrinho();
        $this->produto  = new Produto();
    }

    public function tearDown(): void
    {
        unset($this->carrinho);
        unset($this->produto);
        // "destruct"
    }
```

- 16 setUpBeforeClass & tearDownAfterClass

```php
 public static function setUpBeforeClass(): void
    {
        // função boa para abrir BD
        print __METHOD__;

    }

    public static function tearDownAfterClass(): void
    {
        // função boa para fechar BD
        print __METHOD__;
    }
```

- 17 AssertPreConditions & AssertPostCondition
- 18 Marcando testes como incompletos & pulando testes
- 19 PHPUnit Annotations
- 20 Concluindo Módulo

[Voltar ao Índice](#indice)

---


## <a name="parte5">5 - Dublês de Teste: Stubs & Mocks</a>



[Voltar ao Índice](#indice)

---


## <a name="parte6">6 - Componente - QueryBuilder</a>



[Voltar ao Índice](#indice)

---


## <a name="parte7">7 - Testes com Banco de Dados - QueryBuilder / Executor]</a>



[Voltar ao Índice](#indice)

---


## <a name="parte8">8 - Componente - Router</a>



[Voltar ao Índice](#indice)

---


## <a name="parte9">9 - Publicando Pacotes</a>



[Voltar ao Índice](#indice)

---


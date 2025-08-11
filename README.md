# PHP com Testes e TDD

https://codeexperts.com.br/



## <a name="indice">Índice</a>

1. [Introdução](#parte1)     
2. [Primeiros Passos com Testes](#parte2)     
3. [TDD - Test Driven Development](#parte3)     
4. [PHPUnit - Ambiente e Melhorias](#parte4)     
5. [Dublês de Teste: Stubs & Mocks](#parte5)     
6. [Componente - QueryBuilder](#parte6)     
7. [Testes com Banco de Dados - QueryBuilder Executor](#parte7)     
8. [Componente - Router](#parte8)     
9. [Publicando Pacotes](#parte9)     
10. [10. Intervenção - Correções](#parte10)     
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
        "phpunit/phpunit": "^8.5.42"
    },
    "autoload": {
        "psr-4": {
            "Code\\": "src/"
        }
    },
    "scripts": {
        "test": "phpunit"
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

```php
    protected function assertPreConditions(): void
    {
        // SE ESSE TESTE PASSAR... CONT...
        $classe = class_exists('\\Code\\Carrinho');
        $this->assertTrue($classe);
    }

    protected function assertPostConditions(): void
    {
        // executado sempre depois do teste e o método teardown
    }
```

- 18 Marcando testes como incompletos & pulando testes

```php
    public function testIncompleto()
    {
        $this->assertTrue(true);
        $this->markTestIncomplete('Teste não esta completo'); // "Lembrebte de teste incompleto"
    }

    public function testSeFeatureEspecificaParaVersao53PHPTrabalhaDeFormaEsperada()
    {
        if (PHP_VERSION != 5.3) {
            $this->markTestSkipped('Esse teste so roda para versão abaixo do PHP 7');
        }
        $this->assertTrue(true);
    }
```

- 19 PHPUnit Annotations

```php
    /**
     * @requires PHP === 5.3
     * */
    public function testSeFeatureEspecificaParaVersao53PHPTrabalhaDeFormaEsperada()
    {
        /*if (PHP_VERSION != 5.3) {
            $this->markTestSkipped('Esse teste so roda para versão abaixo do PHP 7');
        }*/
        $this->assertTrue(true);
    }
```

```php
    /*
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Parâmetro Invalido, informe um SLUG
     */
    public function testSeSetSlugLancaExceptionQuandoNaoInformada()
    {
        $this->expectException('\InvalidArgumentException');
        $this->expectExceptionMessage('Parâmetro Invalido, informe um SLUG');

        $product = $this->produto;
        $product->setSlug('');

    }
```


- 20 Concluindo Módulo

[Voltar ao Índice](#indice)

---


## <a name="parte5">5 - Dublês de Teste: Stubs & Mocks</a>

- 21 Introdução a Mocks & Stubs
- 22 Falando sobre Stubs

```php
    public function testSeValoresDeProdutosNoCarrinhoEstaoCorretosCOnformaPassados()
    {
       /* $produto = $this->produto;
        $produto->setName('Produto 1');
        $produto->setPrice(19.99);
        $produto->setSlug('produto_1');*/

        $produtoStub = $this->createMock(Produto::class);
        $produtoStub->method('getName')->willReturn('Produto 1');
        $produtoStub->method('getPrice')->willReturn('19.99');
        $produtoStub->method('getSlug')->willReturn('produto_1');
```

- 23 Criando Mock Objects (Objetos Falsos)
- 24 Concluindo Mock
- 25 Conclusões Módulo

Resumo:

- Teste Direto: Use para testar a própria classe Acessorio.
- Stub: Use para testar a classe Carro, quando você precisa que a dependência Acessorio retorne um valor específico (ex: getNome() retornando "GPS").
- Mock: Use para testar a classe Carro, quando você precisa verificar se a classe Carro chamou um método da dependência Acessorio de uma forma específica (ex: chamou setTipo() com o argumento "Eletrônico Crítico").

[Voltar ao Índice](#indice)

---


## <a name="parte6">6 - Componente - QueryBuilder</a>

- 26 Organizando Ambiente para o Componente
- 27 Iniciando QueryBuilder
- 28 Iniciando Testes da Classe Select
- 29 Implementando Primeira Query Select
- 30 Adicionando Condições em Nossa Query Select
- 31 Adicionando a Possibilidade de Mais Condições Where
- 32 OrderBy em Nosso Select
- 33 Limit em Nosso Select
- 34 Joins em Nosso Select
- 35 Selecionando Colunas Desejadas em Nosso Select
- 36 Criando Insert Query
- 37 Criando Update Query pt1
- 38 Criando Update Query pt2
- 39 Criando Delete Query
- 40 Melhorias no Select Query / Con

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
    
## <a name="parte10">10. Intervenção - Correções</a>



[Voltar ao Índice](#indice)

---
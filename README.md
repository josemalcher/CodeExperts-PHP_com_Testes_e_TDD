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

[Voltar ao Índice](#indice)

---


## <a name="parte3">3 - TDD - Test Driven Development</a>



[Voltar ao Índice](#indice)

---


## <a name="parte4">4 - PHPUnit - Ambiente e Melhorias</a>



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


<?php


use Code\Acessorio;
use Code\Carro;
use PHPUnit\Framework\TestCase;

class CarroTest extends TestCase
{
    /**
     * Exemplo de teste com um STUB.
     * Stubs são usados para fornecer dados pré-definidos para o teste,
     * controlando o que um método de uma dependência irá retornar.
     * @test
     */
    public function adiciona_acessorio_usando_stub(): void
    {
        // Criamos um duble de classe acessorio
        $stub = $this->createStub(Acessorio::class);

        //confiuramos o stub: quando o método getNome for chamado
        $stub->method('getNome')->willReturn('GPS');

        $carro = new Carro();

        //adicionamos o nosso acessorio falso ao carro
        $carro->adicionarAcessorio($stub);

        //verificaão se o carro realmente tem o Stub
        $this->assertCount(1, $carro->getAcessorios());
        $this->assertSame($stub, $carro->getAcessorios()[0]);

    }

    /**
     * Exemplo de teste com um MOCK.
     * Mocks são usados para verificar INTERAÇÕES, ou seja, se um método
     * de uma dependência foi chamado da forma correta.
     * @test
     */
    public function verificar_interacao_com_acessorio_usando_mock(): void
    {
        //criando o duble
        $mock = $this->createMock(Acessorio::class);

        $mock->method('getNome')->willReturn('Central Multimidia');

        // Criamos uma EXPECTATIVA: Nós esperamos que o método setTipo()
        // seja chamado exatamente UMA VEZ (`once()`) com o argumento 'Eletrônico Crítico'.
        $mock->expects($this->once())
            ->method('setTipo')
            ->with($this->equalTo('Eletrônico Crítico'));

        $carro = new Carro();

        // 2. Ação (Act)
        // Executamos o método que deve disparar a interação que estamos esperando
        $carro->adicionarAcessorio($mock);

        // 3. Verificação (Assert)
        // No caso de mocks, a verificação das expectativas é feita automaticamente
        // pelo PHPUnit no final do teste. Se setTipo() não for chamado como esperado, o teste falha.
    }

}
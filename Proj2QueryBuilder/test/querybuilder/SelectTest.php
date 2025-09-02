<?php
namespace CodeTest\QueryBuilder;

use Code\QueryBuilder\Select;
class SelectTest extends \PHPUnit\Framework\TestCase
{
    protected $select;

    protected function assertPreConditions(): void
    {
        $this->assertTrue(class_exists(Select::class));
    }

    protected function setUp(): void
    {
        $this->select = new Select();
    }

    public function testIfQueryBaseIsGenerateWithSuccess(): void
    {
        $query = $this->select->query('products');
        $this->assertSame('SELECT * FROM producs', $query->getSql());
    }

}
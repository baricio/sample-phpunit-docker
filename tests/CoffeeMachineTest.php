<?php

namespace tests;

use App\CoffeeMachine;
use PHPUnit\Framework\TestCase;

class CoffeeMachineTest extends TestCase
{
    private $coffeeMachine;

    protected function setUp(): void
    {
        parent::setUp();
        $this->coffeeMachine = new CoffeeMachine();
    }

    public function testDoCoffeeWithoutResources()
    {
        $result = $this->coffeeMachine->doCoffee();
        $this->assertFalse($result);
    }

    public function testDoCoffeeWithResources()
    {
        $this->coffeeMachine->putCoffee(10);
        $this->coffeeMachine->putWatter(10);
        $result = $this->coffeeMachine->doCoffee();
        $this->assertTrue($result);
    }

    public function testDoCoffeeWithLowWatter()
    {
        $this->coffeeMachine->putCoffee(10);
        $this->coffeeMachine->putWatter(1);
        $result = $this->coffeeMachine->doCoffee();
        $this->assertFalse($result);
    }

    public function testDecreaseResourcesAfterDoCoffee()
    {
        $currentCoffee = 10;
        $currentWatter = 2;
        $this->coffeeMachine->putCoffee($currentCoffee);
        $this->coffeeMachine->putWatter($currentWatter);
        $result = $this->coffeeMachine->doCoffee();
        $this->assertTrue($result);

        $coffeeQty = $this->coffeeMachine->getCoffeeQty();
        $watterQty = $this->coffeeMachine->getWatterQty();

        $this->assertEquals(--$currentCoffee, $coffeeQty);
        $this->assertEquals(--$currentWatter, $watterQty);
    }
}
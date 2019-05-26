<?php

namespace App;

require __DIR__ . '/../vendor/autoload.php';

class CoffeeMachine
{
    private $coffee = 0;
    private $watter = 0;

    public function doCoffee(): bool
    {
        if ($this->hasResources()) {
            $this->copnsumeResources();
            return true;
        }

        return false;
    }

    private function copnsumeResources(): void
    {
        $this->coffee--;
        $this->watter--;
    }

    private function hasResources(): bool
    {
        return $this->coffee > 0 && $this->watter > 1;
    }

    public function putCoffee(int $coffee): void
    {
        $this->coffee = $coffee;
    }

    public function putWatter(int $watter): void
    {
        $this->watter = $watter;
    }

    public function getCoffeeQty(): int
    {
        return $this->coffee;
    }

    public function getWatterQty(): int
    {
        return $this->watter;
    }
}

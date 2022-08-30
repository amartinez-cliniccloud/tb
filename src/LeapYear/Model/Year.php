<?php

namespace App\LeapYear\Model;

class Year
{
    private int $year;

    public function __construct(int $year)
    {
        $this->year = $year;
    }

    public function getYear()
    {
        return $this->year;
    }

    public function isDivisibleBy(int $divisor): bool
    {
        return $this->getYear() % $divisor === 0;
    }

    public function isLeap(): bool
    {
        if ($this->isDivisibleBy(400)) {
            return true;
        }
        return ($this->isDivisibleBy(4) && !$this->isDivisibleBy(100));
    }
}
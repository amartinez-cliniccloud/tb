<?php

namespace App\ElephantCarpaccio\Model;

class Order
{

    const NO_DISCOUNT = 999.99;
    const MINIMUM_DISCOUNT = 1000;

    const TAX_RATE = [
        "UT" => 6.85,
        "NV" => 8,
        "TX" => 6.25,
        "AL" => 4,
        "CA" => 8.25
    ];

    private function validateArguments($items, $price, string $state_code)
    {
        return (is_numeric($items) && is_numeric($price) && array_key_exists($state_code, self::TAX_RATE));
    }

    public function getTaxRate(string $state_code)
    {
        return self::TAX_RATE[$state_code];
    }

    public function getTaxValue($state_code, $order_value)
    {
        $tax_value = 0;
        $tax_rate = $this->getTaxRate($state_code);
        if ($tax_rate > 0) {
            $tax_value = ($order_value * $tax_rate) / 100;
        }
        return $tax_value;
    }

    public function getDiscountRate($order_value)
    {
        switch ($order_value) {
            case $order_value >= 50000:
                $discount_rate = 15;
                break;
            case $order_value >= 10000:
                $discount_rate = 10;
                break;
            case $order_value >= 7000:
                $discount_rate = 7;
                break;
            case $order_value >= 5000:
                $discount_rate = 5;
                break;
            case $order_value >= 1000:
                $discount_rate = 3;
                break;
            default:
                $discount_rate = 0;
                break;
        }
        return $discount_rate;
    }

    public function getDiscountValue($order_value)
    {
        $discount_value = 0;
        $discount_rate = $this->getDiscountRate($order_value);
        if ($discount_rate > 0) {
            $discount_value = ($order_value * $discount_rate) / 100;
        }
        return $discount_value;
    }

    public function calculateOrderValue($items = 0, $price = 0, $state_code = "UT")
    {
        if (self::validateArguments($items, $price, $state_code)) {
            $order_value = $items * $price;
            $order_value = $order_value - $this->getDiscountValue($order_value);
            return round($order_value + $this->getTaxValue($state_code, $order_value), 2);
        } else {
            throw new \InvalidArgumentException();
        }
    }
}
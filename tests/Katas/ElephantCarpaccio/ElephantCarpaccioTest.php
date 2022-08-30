<?php
declare(strict_types=1);

namespace Tests\App\Katas\ElephantCarpaccio;

use PHPUnit\Framework\TestCase;
use App\ElephantCarpaccio\Model\Order;

/**
 * Class ElephantCarpaccioTest
 */
class ElephantCarpaccioTest extends TestCase
{
    /**
     * @var Order
     */
    private $order;

    protected function setUp(): void
    {
        $this->order = new Order;
    }

    /** @test */
    public function testShouldInitialize(): void
    {
        $this->assertInstanceOf(Order::class, new $this->order);
    }

    /** @test */
    public function testShouldFailWhenItemsIsNotNumber(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->order->calculateOrderValue("Item");
    }

    /** @test */
    public function testShouldFailWhenPriceIsNotNumber(): void
    {
        $this->expectException(\Exception::class);
        $this->order->calculateOrderValue(1, "Price");
    }

    /** @test */
    public function testShouldFailWhenStateCodeIsNotString(): void
    {
        $this->expectException(\Exception::class);
        $this->order->calculateOrderValue(1, 1, 1);
    }

    /** @test */
    public function testShouldFailWhenStateCodeLengthIsGreaterThanTwo(): void
    {
        $this->expectException(\Exception::class);
        $this->order->calculateOrderValue(1, 1, "AAA");
    }

    /** @test */
    public function testShouldFailWhenStateCodeIsNotValid(): void
    {
        $this->expectException(\Exception::class);
        $this->order->calculateOrderValue(1, 1, "");
    }

    /** @test */
    public function givenStateCodeGetNumberTaxRate(): void
    {
        $state_code_registered = "AL";
        $this->assertIsNumeric($this->order->getTaxRate($state_code_registered));
    }

    /** @test */
    public function givenStateCodeRegisteredGetTexRateDefined(): void
    {
        $state_code_registered = "AL";
        $this->assertGreaterThan(0, $this->order->getTaxRate($state_code_registered));
    }

    /** @test */
    public function givenOrderValueAndStateCodeRegisteredGetTaxValue(): void
    {
        $state_code_registered = "AL";
        $this->assertGreaterThan(0, $this->order->getTaxValue($state_code_registered, 5000));
    }

    /** @test */
    public function givenOrderValueGetNumberDiscountRate(): void
    {
        $this->assertIsNumeric($this->order->getDiscountRate(1));
    }

    /** @test */
    public function givenOrderValueLessThanValueGetNoDiscountRate(): void
    {
        $this->assertEquals(0, $this->order->getDiscountRate(Order::NO_DISCOUNT));
    }

    /** @test */
    public function givenOrderValueGreaterThanValueGetDiscountRate(): void
    {
        $this->assertGreaterThan(0, $this->order->getDiscountRate(Order::MINIMUM_DISCOUNT));
    }

    /** @test */
    public function givenOrderValueGetDiscountValue(): void
    {
        $this->assertGreaterThanOrEqual(0, $this->order->getDiscountValue(5000));
    }

    /** @test
     * @doesNotPerformAssertions
     */
    public function testResponseToCalculateOrdeValue() : void
    {
        $this->order->calculateOrderValue();
    }

    /** @test */
    public function givenItemsAndPricesGetTotalPrice(): void
    {
        $this->assertIsNumeric($this->order->calculateOrderValue(1, 8000));
    }

    /** @test */
    public function givenItemsPricesAndStateCodeGetTotalPrice(): void
    {
        $this->assertGreaterThan(0, $this->order->calculateOrderValue(5, 2000, "AL"));
    }
}
<?php
declare(strict_types=1);

namespace Tests\App\Katas\LeapYear;

use App\LeapYear\Model\Year;
use PHPUnit\Framework\TestCase;

/**
 * CLass LeapYearTest
 */
class LeapYearTest extends TestCase
{
    /** @test */
    public function testShouldInitialize(): void
    {
        $this->assertInstanceOf(Year::class, new Year(2022));
    }

    /** @test */
    public function YearMustBeAInteger(): void
    {
        $year = new Year(2022);
        $this->assertIsInt($year->getYear());
    }

    /** @test
     * @doesNotPerformAssertions
     */
    public function testResponseToIsLeap() : void
    {
        $year = new Year(2022);
        $year->isLeap();
    }

    /** @test */
    public function GivenYearVerityIsNotLeap(): void
    {
        $year = new Year(2022);
        $this->assertFalse($year->isLeap());
    }

    /** @test */
    public function GivenYearVerityIsLeap(): void
    {
        $year = new Year(2024);
        $this->assertTrue($year->isLeap());
    }

    /** @test */
    public function GivenSpecialCommonYearVerityIsNotLeap(): void
    {
        $year = new Year(1900);
        $this->assertFalse($year->isLeap());
    }

    /** @test */
    public function GivenSpecialCommonYearVerityIsLeap(): void
    {
        $year = new Year(2000);
        $this->assertTrue($year->isLeap());
    }

}

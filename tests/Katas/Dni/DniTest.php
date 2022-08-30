<?php
declare(strict_types=1);

namespace Tests\App\Katas\Dni;

use App\Dni\Model\Dni;
use DomainException;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class DniTest extends TestCase
{
    /** @test */
    public function givenDniLongerThanMaxLenghtTestShouldFail()
    {
        $this->expectException(DomainException::class);
        $dni = new Dni("12345678901");
    }

    /** @test */
    public function givenDniShorterThanMinLenghtTestShouldFail()
    {
        $this->expectException(DomainException::class);
        $dni = new Dni("123456");
    }

    /** @test */
    public function givenDniEndsWithNumberTestShouldFail(): void
    {
        $this->expectException(DomainException::class);
        $dni = new Dni('012345678');
    }

    /** @test */
    public function givenDniEndsWithInvalidLetterTestShouldFail(): void
    {
        $this->expectException(DomainException::class);
        $dni = new Dni('12345678I');
    }

    /** @test */
    public function givenDniHasLettersInTheMiddleTestShouldFail(): void
    {
        $this->expectException(DomainException::class);
        $dni = new Dni('1234AN78E');
    }

    /** @test */
    public function givenDniStartsWithALetterOtherThanXYZTestShouldFail(): void
    {
        $this->expectException(DomainException::class);
        $dni = new Dni('A1234567E');
    }

    /** @test */
    public function givenInvalidDniThenTestShouldFail(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $dni = new Dni('00000000S');
    }

    /** @test */
    public function givenValidNIEStartingWithXThenTestShouldPass(): void
    {
        $dni = new Dni('Y0000000Z');
        $this->assertEquals('Y0000000Z', (string)$dni);
    }

    /** @test */
    public function givenValidDNIEndingWithWThenTestShouldPass(): void
    {
        $dni = new Dni('00000002W');
        $this->assertEquals('00000002W', (string)$dni);
    }

    /** @test */
    public function givenValidDNIEndingWithRThenTestShouldPass(): void
    {
        $dni = new Dni('00000001R');
        $this->assertEquals('00000001R', (string)$dni);
    }

    /** @test */
    public function givenValidDNIEndingWithTThenTestShouldPass(): void
    {
        $dni = new Dni('00000000T');
        $this->assertEquals('00000000T', (string)$dni);
    }
}
<?php
declare(strict_types=1);

namespace App\Dni\Model;

class Dni
{
    private const LETTER_MAP = 'TRWAGMYFPDXBNJZSQVHLCKE';
    private const DNI_PATTERN = '/^[XYZ\d]\d{7,7}[^UIOÑ\d]$/u';
    private const DIVISOR = 23;
    private const NIE_INITIAL_LETTERS = ['X', 'Y', 'Z'];
    private const NIE_INITIAL_REPLACEMENTS = ['0', '1', '2'];

    public function validateDni(string $dni): void
    {
        if (!preg_match(self::DNI_PATTERN, $dni)) {
            throw new \DomainException('Bad format');
        }
    }

    public function __toString(): string
    {
        return $this->dni;
    }

    private function calculateModulus(string $dni): int
    {
        $numeric = substr($dni, 0, -1);
        $number = (int)str_replace(self::NIE_INITIAL_LETTERS, self::NIE_INITIAL_REPLACEMENTS, $numeric);

        return $number % self::DIVISOR;
    }

    public function __construct(string $dni)
    {
        $this->validateDni($dni);
        $mod = $this->calculateModulus($dni);
        $letter = substr($dni, -1);

        if ($letter !== self::LETTER_MAP[$mod]) {
            throw new \InvalidArgumentException('Invalid dni');
        }

        $this->dni = $dni;
    }
}
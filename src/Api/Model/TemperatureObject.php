<?php
declare(strict_types=1);

namespace Demo\Api\Model;

class TemperatureObject implements \JsonSerializable
{
    private const PRECISION = 2;
    private $celsius;
    
    public function __construct(float $celsius)
    {
        $this->celsius = $this->round($celsius);
    }

    private function celsiusToFahrenheit(float $celsius): float
    {
        return $this->round($celsius * 9 / 5 + 32);
    }

    private function round(float $value): float
    {
        return round($value, self::PRECISION);
    }

    public function jsonSerialize()
    {
        return [
            'celsius' => $this->celsius,
            'fahrenheit' => $this->celsiusToFahrenheit($this->celsius),
        ];
    }
}

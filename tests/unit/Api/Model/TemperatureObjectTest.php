<?php
declare(strict_types=1);

namespace Demo\Api\Model;

class TemperatureObjectTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @dataProvider dataProviderObject
     */
    public function testObject(float $celsius, float $fahrenheit)
    {
        $this->assertEquals(
            [
                'celsius' => $celsius,
                'fahrenheit' => $fahrenheit,
            ],
            (new TemperatureObject($celsius))->jsonSerialize()
        );
    }
    
    public function dataProviderObject()
    {
        return [
            'celsius 0, fahrenheit: 32' => [0, 32],
            'celsius 10, fahrenheit: 50' => [10, 50],
            'celsius 9.245, fahrenheit: 48.65' => [9.25, 48.65],
        ];
    }
}

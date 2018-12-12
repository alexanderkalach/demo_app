<?php
declare(strict_types=1);

namespace Demo\Api\Action;

class CreateOverlayBoostTest extends \PHPUnit\Framework\TestCase
{
    public function testPayload()
    {
        $action = new CreateOverlayBoost(2, 5, 25);

        $this->assertEquals(
            [
                'type' => 'TADO_MODE',
                'setting' => [
                    'type' => 'HEATING',
                    'power' => 'ON',
                    'temperature' => [
                        'celsius' => 25,
                        'fahrenheit' => 77,
                    ],
                ],
                'termination' => [
                    'type' => 'TADO_MODE',
                ],
            ],
            json_decode($action->payload(), true)
        );
    }

    public function testPath()
    {
        $action = new CreateOverlayBoost(2, 5, 25);
        $this->assertEquals(
            'homes/2/zones/5/overlay',
            $action->path()
        );
    }
}
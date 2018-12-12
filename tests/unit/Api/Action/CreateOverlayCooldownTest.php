<?php
declare(strict_types=1);

namespace Demo\Api\Action;

class CreateOverlayCooldownTest extends \PHPUnit\Framework\TestCase
{
    public function testPayload()
    {
        $action = new CreateOverlayCooldown(2, 5, 30);

        $this->assertEquals(
            [
                'type' => 'TIMER',
                'setting' => [
                    'type' => 'HEATING',
                    'power' => 'OFF',
                ],
                'termination' => [
                    'type' => 'TIMER',
                    'durationInSeconds' => 1800,
                ],
            ],
            json_decode($action->payload(), true)
        );
    }

    public function testPath()
    {
        $action = new CreateOverlayBoost(2, 5, 30);
        $this->assertEquals(
            'homes/2/zones/5/overlay',
            $action->path()
        );
    }
}
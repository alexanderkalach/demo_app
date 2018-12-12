<?php
declare(strict_types=1);

namespace Demo\Api\Action;

use Demo\Api\Model;

class CreateOverlayCooldown extends CreateOverlay
{
    private $durationInMinutes;

    public function __construct(int $homeId, int $zoneId, int $durationInMinutes)
    {
        parent::__construct($homeId, $zoneId);
        $this->durationInMinutes = $durationInMinutes;
    }

    public function payload(): string
    {
        $overlay = $this->buildOverlay();

        return json_encode($overlay);
    }

    private function buildOverlay(): Model\Overlay
    {
        $setting = new Model\HeatingZoneSetting(Model\Power::OFF());
        $timerDurationInSeconds = $this->durationInMinutes * 60;
        $overlay = new Model\Overlay(
            $setting,
            new Model\TimerTerminationCondition($timerDurationInSeconds)
        );

        return $overlay;
    }
}

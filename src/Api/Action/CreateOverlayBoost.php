<?php
declare(strict_types=1);

namespace Demo\Api\Action;

use Demo\Api\Model;

class CreateOverlayBoost extends CreateOverlay
{
    private $boostTemperature;

    public function __construct(int $homeId, int $zoneId, int $boostTemperature)
    {
        parent::__construct($homeId, $zoneId);
        $this->boostTemperature = $boostTemperature;
    }

    public function payload(): string
    {
        $overlay = $this->buildOverlay();

        return json_encode($overlay);
    }

    private function buildOverlay(): Model\Overlay
    {
        $setting = new Model\HeatingZoneSetting(
            Model\Power::ON(),
            new Model\TemperatureObject($this->boostTemperature)
        );
        $overlay = new Model\Overlay($setting, new Model\TadoModeTerminationCondition());

        return $overlay;
    }
}

<?php
declare(strict_types=1);

namespace Demo\Api\Model;

class HeatingZoneSetting extends GenericZoneSetting
{
    private $power;
    private $temperature;

    public function __construct(
        Power $power,
        TemperatureObject $temperature = null
    ) {
        parent::__construct(TadoSystemType::HEATING());
        $this->power = $power;
        $this->temperature = $temperature;
    }

    public function jsonSerialize()
    {
        return array_merge(
            parent::jsonSerialize(),
            array_filter([
                'type' => $this->type,
                'power' => $this->power,
                'temperature' => $this->temperature,
            ])
        );
    }
}

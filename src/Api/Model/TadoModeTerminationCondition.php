<?php
declare(strict_types=1);

namespace Demo\Api\Model;

class TadoModeTerminationCondition extends OverlayTerminationCondition
{
    public function __construct(\DateTime $projectedExpiry = null)
    {
        parent::__construct(
            OverlayTerminationConditionType::TADO_MODE(),
            $projectedExpiry
        );
    }
}

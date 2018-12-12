<?php
declare(strict_types=1);

namespace Demo\Api\Model;

class OverlayTerminationConditionTypeTest extends \PHPUnit\Framework\TestCase
{
    public function testMANUAL()
    {
        $this->assertEquals(
            OverlayTerminationConditionType::MANUAL,
            OverlayTerminationConditionType::MANUAL()->jsonSerialize()
        );
    }
    
    public function testTADO_MODE()
    {
        $this->assertEquals(
            OverlayTerminationConditionType::TADO_MODE, 
            OverlayTerminationConditionType::TADO_MODE()->jsonSerialize()
        );
    }

    public function testTIMER()
    {
        $this->assertEquals(
            OverlayTerminationConditionType::TIMER, 
            OverlayTerminationConditionType::TIMER()->jsonSerialize()
        );
    }
}

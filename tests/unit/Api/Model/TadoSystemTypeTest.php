<?php
declare(strict_types=1);

namespace Demo\Api\Model;

class TadoSystemTypeTest extends \PHPUnit\Framework\TestCase
{
    public function testHEATING()
    {
        $this->assertEquals(
            TadoSystemType::HEATING,
            TadoSystemType::HEATING()->jsonSerialize()
        );
    }
    
    public function testAIR_CONDITIONING()
    {
        $this->assertEquals(
            TadoSystemType::AIR_CONDITIONING, 
            TadoSystemType::AIR_CONDITIONING()->jsonSerialize()
        );
    }

    public function testHOT_WATER()
    {
        $this->assertEquals(
            TadoSystemType::HOT_WATER, 
            TadoSystemType::HOT_WATER()->jsonSerialize()
        );
    }
}

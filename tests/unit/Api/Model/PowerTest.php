<?php
declare(strict_types=1);

namespace Demo\Api\Model;

class PowerTest extends \PHPUnit\Framework\TestCase
{
    public function testON()
    {
        $this->assertEquals(Power::ON, Power::ON()->jsonSerialize());
    }
    
    public function testOFF()
    {
        $this->assertEquals(Power::OFF, Power::OFF()->jsonSerialize());
    }
}

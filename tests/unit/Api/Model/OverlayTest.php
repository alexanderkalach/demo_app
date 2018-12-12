<?php
declare(strict_types=1);

namespace Demo\Api\Model;

class OverlayTest extends \PHPUnit\Framework\TestCase
{
    public function testAll()
    {
        $overlay = new Overlay(
            $this->getSettings(),
            new ManualTerminationCondition()
        );

        $result = $overlay->jsonSerialize();
        $this->assertInternalType('array', $result);
        $this->assertEquals(['type', 'setting', 'termination'], array_keys($result));
        $this->assertEquals(OverlayTerminationConditionType::MANUAL(), $result['type']);
        $this->assertEquals($this->getSettings(), $result['setting']);
        $this->assertEquals(new ManualTerminationCondition(), $result['termination']);
    }

    public function testOnlyRequired()
    {
        $overlay = new Overlay(
            $this->getSettings()
        );

        $result = $overlay->jsonSerialize();
        $this->assertInternalType('array', $result);
        $this->assertEquals(['setting'], array_keys($result));
        $this->assertEquals($this->getSettings(), $result['setting']);
    }

    private function getSettings()
    {
        return new HeatingZoneSetting(Power::ON(), new TemperatureObject(10));
    }
}

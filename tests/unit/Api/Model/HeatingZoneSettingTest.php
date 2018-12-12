<?php
declare(strict_types=1);

namespace Demo\Api\Model;

class HeatingZoneSettingTest extends \PHPUnit\Framework\TestCase
{
    public function testAll()
    {
        $setting = new HeatingZoneSetting(Power::ON(), new TemperatureObject(10));

        $result = $setting->jsonSerialize();
        $this->assertInternalType('array', $result);
        $this->assertEquals(['type', 'power', 'temperature'], array_keys($result));
        $this->assertEquals(TadoSystemType::HEATING(), $result['type']);
        $this->assertEquals(Power::ON(), $result['power']);
        $this->assertEquals(new TemperatureObject(10), $result['temperature']);
    }

    public function testOnlyRequired()
    {
        $setting = new HeatingZoneSetting(Power::ON());

        $result = $setting->jsonSerialize();
        $this->assertInternalType('array', $result);
        $this->assertEquals(['type', 'power'], array_keys($result));
        $this->assertEquals(TadoSystemType::HEATING(), $result['type']);
        $this->assertEquals(Power::ON(), $result['power']);
    }
}

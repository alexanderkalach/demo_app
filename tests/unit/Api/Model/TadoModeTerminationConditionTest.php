<?php
declare(strict_types=1);

namespace Demo\Api\Model;

class TadoModeTerminationConditionTest extends \PHPUnit\Framework\TestCase
{
    public function testAll()
    {
        $condition = new TadoModeTerminationCondition(new \DateTime('2018-10-01 23:00:12'));

        $result = $condition->jsonSerialize();
        $this->assertInternalType('array', $result);
        $this->assertEquals(['type', 'projectedExpiry'], array_keys($result));
        $this->assertEquals(OverlayTerminationConditionType::TADO_MODE(), $result['type']);
        $this->assertEquals(
            (new \DateTime('2018-10-01 23:00:12'))->format(\DateTime::ISO8601),
            $result['projectedExpiry']
        );
    }

    public function testOnlyRequired()
    {
        $condition = new TadoModeTerminationCondition();

        $result = $condition->jsonSerialize();
        $this->assertInternalType('array', $result);
        $this->assertEquals(['type'], array_keys($result));
        $this->assertEquals(OverlayTerminationConditionType::TADO_MODE(), $result['type']);
    }
}

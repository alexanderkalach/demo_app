<?php
declare(strict_types=1);

namespace Demo\Api\Model;

class ManualTerminationConditionTest extends \PHPUnit\Framework\TestCase
{
    public function testAll()
    {
        $condition = new ManualTerminationCondition(new \DateTime('2018-10-01 23:00:12'));

        $result = $condition->jsonSerialize();
        $this->assertInternalType('array', $result);
        $this->assertEquals(['type', 'projectedExpiry'], array_keys($result));
        $this->assertEquals(OverlayTerminationConditionType::MANUAL(), $result['type']);
        $this->assertEquals(
            (new \DateTime('2018-10-01 23:00:12'))->format(\DateTime::ISO8601),
            $result['projectedExpiry']
        );
    }

    public function testOnlyRequired()
    {
        $condition = new ManualTerminationCondition();

        $result = $condition->jsonSerialize();
        $this->assertInternalType('array', $result);
        $this->assertEquals(['type'], array_keys($result));
        $this->assertEquals(OverlayTerminationConditionType::MANUAL(), $result['type']);
    }
}

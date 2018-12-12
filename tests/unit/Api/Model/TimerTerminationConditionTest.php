<?php
declare(strict_types=1);

namespace Demo\Api\Model;

class TimerTerminationConditionTest extends \PHPUnit\Framework\TestCase
{
    public function testAll()
    {
        $condition = new TimerTerminationCondition(
            90,
            50,
            new \DateTime('2018-10-01 23:00:15'),
            new \DateTime('2018-10-01 23:00:12')
        );

        $result = $condition->jsonSerialize();
        $this->assertInternalType('array', $result);
        $this->assertEquals(
            ['type', 'projectedExpiry', 'durationInSeconds', 'remainingTimeInSeconds', 'expiry'],
            array_keys($result)
        );
        $this->assertEquals(OverlayTerminationConditionType::TIMER(), $result['type']);
        $this->assertEquals(
            (new \DateTime('2018-10-01 23:00:12'))->format(\DateTime::ISO8601),
            $result['projectedExpiry']
        );
        $this->assertEquals(90, $result['durationInSeconds']);
        $this->assertEquals(50, $result['remainingTimeInSeconds']);
        $this->assertEquals(
            (new \DateTime('2018-10-01 23:00:15'))->format(\DateTime::ISO8601),
            $result['expiry']
        );
    }

    public function testOnlyRequired()
    {
        $condition = new TimerTerminationCondition(90);

        $result = $condition->jsonSerialize();
        $this->assertInternalType('array', $result);
        $this->assertEquals(
            ['type', 'durationInSeconds'],
            array_keys($result)
        );
        $this->assertEquals(OverlayTerminationConditionType::TIMER(), $result['type']);
        $this->assertEquals(90, $result['durationInSeconds']);
    }
}

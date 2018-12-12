<?php
declare(strict_types=1);

namespace Demo\Api\Model;

class TimerTerminationCondition extends OverlayTerminationCondition
{
    private $durationInSeconds;
    private $remainingTimeInSeconds;
    private $expiry;

    public function __construct(
        int $durationInSeconds,
        int $remainingTimeInSeconds = null,
        \DateTime $expiry = null,
        \DateTime $projectedExpiry = null
    ) {
        parent::__construct(
            OverlayTerminationConditionType::TIMER(),
            $projectedExpiry
        );
        $this->durationInSeconds = $durationInSeconds;
        $this->remainingTimeInSeconds = $remainingTimeInSeconds;
        $this->expiry = $expiry;
    }

    public function jsonSerialize()
    {
        return array_merge(
            parent::jsonSerialize(),
            array_filter([
                'durationInSeconds' => $this->durationInSeconds,
                'remainingTimeInSeconds' => $this->remainingTimeInSeconds,
                'expiry' => $this->expiry ? $this->expiry->format(\DateTime::ISO8601) : null,
            ])
        );
    }
}

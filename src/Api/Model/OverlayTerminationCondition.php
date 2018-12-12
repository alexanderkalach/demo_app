<?php
declare(strict_types=1);

namespace Demo\Api\Model;

abstract class OverlayTerminationCondition implements \JsonSerializable
{
    private $type;
    private $projectedExpiry;

    public function __construct(
        OverlayTerminationConditionType $type,
        \DateTime $projectedExpiry = null
    ) {
        $this->type = $type;
        $this->projectedExpiry = $projectedExpiry;
    }

    public function getType(): OverlayTerminationConditionType
    {
        return $this->type;
    }

    public function jsonSerialize()
    {
        return array_filter([
            'type' => $this->type,
            'projectedExpiry' => $this->projectedExpiry ? $this->projectedExpiry->format(\DateTime::ISO8601) : null,
        ]);
    }
}

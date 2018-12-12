<?php
declare(strict_types=1);

namespace Demo\Api\Model;

class OverlayTerminationConditionType implements \JsonSerializable
{
    public const MANUAL = 'MANUAL';
    public const TADO_MODE = 'TADO_MODE';
    public const TIMER = 'TIMER';

    private $type;
    
    private function __construct(string $type)
    {
        $this->type = $type;
    }

    static public function MANUAL()
    {
        return new self(self::MANUAL);
    }

    static public function TADO_MODE()
    {
        return new self(self::TADO_MODE);
    }

    static public function TIMER()
    {
        return new self(self::TIMER);
    }

    public function jsonSerialize()
    {
        return $this->type;
    }
}

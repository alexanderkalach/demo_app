<?php
declare(strict_types=1);

namespace Demo\Api\Model;

class TadoSystemType implements \JsonSerializable
{
    public const HEATING = 'HEATING';
    public const AIR_CONDITIONING = 'AIR_CONDITIONING';
    public const HOT_WATER = 'HOT_WATER';

    private $type;
    
    private function __construct(string $type)
    {
        $this->type = $type;
    }

    static public function HEATING()
    {
        return new self(self::HEATING);
    }

    static public function AIR_CONDITIONING()
    {
        return new self(self::AIR_CONDITIONING);
    }

    static public function HOT_WATER()
    {
        return new self(self::HOT_WATER);
    }

    public function jsonSerialize()
    {
        return $this->type;
    }
}

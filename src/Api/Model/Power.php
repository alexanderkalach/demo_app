<?php
declare(strict_types=1);

namespace Demo\Api\Model;

class Power implements \JsonSerializable
{
    public const ON = 'ON';
    public const OFF = 'OFF';

    private $mode;
    
    private function __construct(string $mode)
    {
        $this->mode = $mode;
    }

    static public function ON()
    {
        return new self(self::ON);
    }

    static public function OFF()
    {
        return new self(self::OFF);
    }

    public function jsonSerialize()
    {
        return $this->mode;
    }
}

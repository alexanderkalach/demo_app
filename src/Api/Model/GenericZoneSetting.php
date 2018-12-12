<?php
declare(strict_types=1);

namespace Demo\Api\Model;

abstract class GenericZoneSetting implements \JsonSerializable
{
    private $type;

    public function __construct(TadoSystemType $type)
    {
        $this->type = $type;
    }

    public function jsonSerialize()
    {
        return [
            'type' => $this->type,
        ];
    }
}

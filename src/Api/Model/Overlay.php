<?php
declare(strict_types=1);

namespace Demo\Api\Model;

class Overlay implements \JsonSerializable
{
    // todo looks like the type is redundant
    private $type;
    private $setting;
    private $termination;
    
    public function __construct(
        GenericZoneSetting $setting,
        OverlayTerminationCondition $termination = null
    ) {
        $this->setting = $setting;
        $this->termination = $termination;
        if ($termination) {
            $this->type = $termination->getType();
        }
    }

    public function jsonSerialize()
    {
        return array_filter([
            'type' => $this->type,
            'setting' => $this->setting,
            'termination' => $this->termination,
        ]);
    }
}
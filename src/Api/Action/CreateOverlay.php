<?php
declare(strict_types=1);

namespace Demo\Api\Action;

use Demo\Api\Action as ActionInterface;

abstract class CreateOverlay implements ActionInterface
{
    private const ACTION_PATH = 'homes/{home_id}/zones/{zone_id}/overlay';

    private $homeId;
    private $zoneId;

    public function __construct(int $homeId, int $zoneId)
    {
        $this->homeId = $homeId;
        $this->zoneId = $zoneId;
    }

    public function path(): string
    {
        return str_replace(
            ['{home_id}', '{zone_id}'],
            [$this->homeId, $this->zoneId],
            self::ACTION_PATH
        );
    }

    // todo
    public function method(): string
    {
        return 'PUT';
    }


    public function handleResponse($response)
    {
        //todo
    }
}

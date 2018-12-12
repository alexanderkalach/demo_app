<?php
declare(strict_types=1);

namespace Demo\Api;

interface Action
{
    public function method(): string;

    public function path(): string;

    public function payload(): string;

    public function handleResponse($response);
}

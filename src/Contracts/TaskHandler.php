<?php

namespace Dwoodard\A2A\Contracts;

interface TaskHandler
{
    public function __invoke(array $params): mixed;
}

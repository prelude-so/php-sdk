<?php

namespace Prelude\Core\Exceptions;

class BadRequestException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'Prelude Bad Request Exception';
}

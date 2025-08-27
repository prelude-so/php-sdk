<?php

namespace Prelude\Core\Exceptions;

class ConflictException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'Prelude Conflict Exception';
}

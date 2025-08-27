<?php

namespace Prelude\Core\Exceptions;

class InternalServerException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'Prelude Internal Server Exception';
}

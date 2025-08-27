<?php

namespace Prelude\Core\Exceptions;

class NotFoundException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'Prelude Not Found Exception';
}

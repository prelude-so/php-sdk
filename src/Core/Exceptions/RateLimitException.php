<?php

namespace Prelude\Core\Exceptions;

class RateLimitException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'Prelude Rate Limit Exception';
}

<?php

namespace Prelude\Core\Errors;

class RateLimitError extends APIStatusError
{
    /** @var string */
    protected const DESC = 'Prelude Rate Limit Error';
}

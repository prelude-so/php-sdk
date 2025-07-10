<?php

namespace Prelude\Errors;

class RateLimitError extends APIStatusError
{
    /** @var string */
    protected const DESC = 'Prelude Rate Limit Error';
}

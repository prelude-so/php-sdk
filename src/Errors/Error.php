<?php

namespace Prelude\Errors;

class Error extends \Exception
{
    /** @var string */
    protected const DESC = 'Prelude Error';

    public function __construct(string $message, int $code = 0, ?\Throwable $previous = null)
    {
        parent::__construct($this::DESC.' '.$message, $code, $previous);
    }
}

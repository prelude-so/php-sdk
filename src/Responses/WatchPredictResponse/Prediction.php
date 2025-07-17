<?php

declare(strict_types=1);

namespace Prelude\Responses\WatchPredictResponse;

use Prelude\Core\Concerns\Enum;
use Prelude\Core\Contracts\StaticConverter;

final class Prediction implements StaticConverter
{
    use Enum;

    final public const LEGITIMATE = 'legitimate';

    final public const SUSPICIOUS = 'suspicious';
}

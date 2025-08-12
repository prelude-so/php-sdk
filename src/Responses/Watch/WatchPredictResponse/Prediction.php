<?php

declare(strict_types=1);

namespace Prelude\Responses\Watch\WatchPredictResponse;

use Prelude\Core\Concerns\Enum;
use Prelude\Core\Conversion\Contracts\ConverterSource;

/**
 * The prediction outcome.
 *
 * @phpstan-type prediction_alias = Prediction::*
 */
final class Prediction implements ConverterSource
{
    use Enum;

    public const LEGITIMATE = 'legitimate';

    public const SUSPICIOUS = 'suspicious';
}

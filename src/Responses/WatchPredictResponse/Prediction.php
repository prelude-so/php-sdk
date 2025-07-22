<?php

declare(strict_types=1);

namespace Prelude\Responses\WatchPredictResponse;

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

    final public const LEGITIMATE = 'legitimate';

    final public const SUSPICIOUS = 'suspicious';
}

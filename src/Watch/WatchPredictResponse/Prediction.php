<?php

declare(strict_types=1);

namespace Prelude\Watch\WatchPredictResponse;

use Prelude\Core\Concerns\SdkEnum;
use Prelude\Core\Conversion\Contracts\ConverterSource;

/**
 * The prediction outcome.
 */
final class Prediction implements ConverterSource
{
    use SdkEnum;

    public const LEGITIMATE = 'legitimate';

    public const SUSPICIOUS = 'suspicious';
}

<?php

declare(strict_types=1);

namespace Prelude\Watch\WatchPredictResponse;

/**
 * The prediction outcome.
 */
enum Prediction: string
{
    case LEGITIMATE = 'legitimate';

    case SUSPICIOUS = 'suspicious';
}

<?php

declare(strict_types=1);

namespace Prelude\Verification\Phone\History\HistoryGetResponse\Lifecycle\Event\Attempt;

enum DeliveryStatus: string
{
    case UNKNOWN = 'unknown';

    case IN_TRANSIT = 'in_transit';

    case DELIVERED = 'delivered';

    case UNDELIVERABLE = 'undeliverable';

    case READ = 'read';
}

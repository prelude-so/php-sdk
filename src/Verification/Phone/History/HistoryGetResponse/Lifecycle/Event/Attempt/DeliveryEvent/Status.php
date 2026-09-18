<?php

declare(strict_types=1);

namespace Prelude\Verification\Phone\History\HistoryGetResponse\Lifecycle\Event\Attempt\DeliveryEvent;

/**
 * The state this event reported. It is finer-grained than the attempt's `delivery_status` and includes the states a silent verification goes through.
 */
enum Status: string
{
    case UNKNOWN = 'unknown';

    case SUBMITTED = 'submitted';

    case IN_TRANSIT = 'in_transit';

    case DELIVERED = 'delivered';

    case UNDELIVERABLE = 'undeliverable';

    case EXPIRED = 'expired';

    case READ = 'read';

    case SILENT_STARTED = 'silent_started';

    case SILENT_VERIFIED = 'silent_verified';

    case SILENT_MISMATCH = 'silent_mismatch';
}

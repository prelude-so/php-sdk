<?php

declare(strict_types=1);

namespace Prelude\Verification\Phone\History\HistoryGetResponse;

enum BlockReason: string
{
    case BEHAVIORAL_PATTERN = 'behavioral_pattern';

    case DEVICE_ATTRIBUTE = 'device_attribute';

    case FRAUD_DATABASE = 'fraud_database';

    case LOCATION_DISCREPANCY = 'location_discrepancy';

    case MISSING_SIGNALS = 'missing_signals';

    case NETWORK_FINGERPRINT = 'network_fingerprint';

    case POOR_CONVERSION_HISTORY = 'poor_conversion_history';

    case PREFIX_CONCENTRATION = 'prefix_concentration';

    case REPEATED_NUMBER = 'repeated_number';

    case SUSPECTED_REQUEST_TAMPERING = 'suspected_request_tampering';

    case SUSPICIOUS_IP_ADDRESS = 'suspicious_ip_address';

    case TEMPORARY_PHONE_NUMBER = 'temporary_phone_number';
}

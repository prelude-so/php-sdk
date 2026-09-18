<?php

declare(strict_types=1);

namespace Prelude\Verification\VerificationNewResponse;

enum RiskFactor: string
{
    case AUTOMATION_SIGNATURE = 'automation_signature';

    case CARRIER_NOT_PERMITTED = 'carrier_not_permitted';

    case CLIENT_FINGERPRINT_MISMATCH = 'client_fingerprint_mismatch';

    case CUSTOM_POLICY = 'custom_policy';

    case DEVICE_EMULATOR = 'device_emulator';

    case DEVICE_NOT_PERMITTED = 'device_not_permitted';

    case DEVICE_REUSE = 'device_reuse';

    case EXPIRED_SIGNALS = 'expired_signals';

    case FRAUD_DATABASE = 'fraud_database';

    case INVALID_SIGNATURE = 'invalid_signature';

    case IP_CONCENTRATION = 'ip_concentration';

    case IP_REPUTATION = 'ip_reputation';

    case LOCATION_MISMATCH = 'location_mismatch';

    case MISSING_SIGNALS = 'missing_signals';

    case NUMBER_RANGE_ABUSE = 'number_range_abuse';

    case POOR_CONVERSION_HISTORY = 'poor_conversion_history';

    case PROXY_NETWORK = 'proxy_network';

    case REPEATED_ATTEMPTS = 'repeated_attempts';

    case TEMPORARY_PHONE_NUMBER = 'temporary_phone_number';
}

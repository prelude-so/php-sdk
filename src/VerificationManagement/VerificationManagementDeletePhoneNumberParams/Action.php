<?php

declare(strict_types=1);

namespace Prelude\VerificationManagement\VerificationManagementDeletePhoneNumberParams;

enum Action: string
{
    case ALLOW = 'allow';

    case BLOCK = 'block';
}

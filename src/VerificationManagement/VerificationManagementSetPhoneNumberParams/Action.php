<?php

declare(strict_types=1);

namespace Prelude\VerificationManagement\VerificationManagementSetPhoneNumberParams;

enum Action: string
{
    case ALLOW = 'allow';

    case BLOCK = 'block';
}

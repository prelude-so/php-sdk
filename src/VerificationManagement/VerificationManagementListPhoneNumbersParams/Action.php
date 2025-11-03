<?php

declare(strict_types=1);

namespace Prelude\VerificationManagement\VerificationManagementListPhoneNumbersParams;

enum Action: string
{
    case ALLOW = 'allow';

    case BLOCK = 'block';
}

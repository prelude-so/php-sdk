<?php

declare(strict_types=1);

namespace Prelude\Verification\Phone\History;

use Prelude\Core\Attributes\Optional;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type PhoneVerificationMoneyShape from \Prelude\Verification\Phone\History\PhoneVerificationMoney
 *
 * @phpstan-type PhoneVerificationPsd2TransactionShape = array{
 *   amount?: null|PhoneVerificationMoney|PhoneVerificationMoneyShape,
 *   recipient?: string|null,
 * }
 */
final class PhoneVerificationPsd2Transaction implements BaseModel
{
    /** @use SdkModel<PhoneVerificationPsd2TransactionShape> */
    use SdkModel;

    #[Optional]
    public ?PhoneVerificationMoney $amount;

    /**
     * Payee name displayed to the payer.
     */
    #[Optional]
    public ?string $recipient;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param PhoneVerificationMoney|PhoneVerificationMoneyShape|null $amount
     */
    public static function with(
        PhoneVerificationMoney|array|null $amount = null,
        ?string $recipient = null
    ): self {
        $self = new self;

        null !== $amount && $self['amount'] = $amount;
        null !== $recipient && $self['recipient'] = $recipient;

        return $self;
    }

    /**
     * @param PhoneVerificationMoney|PhoneVerificationMoneyShape $amount
     */
    public function withAmount(PhoneVerificationMoney|array $amount): self
    {
        $self = clone $this;
        $self['amount'] = $amount;

        return $self;
    }

    /**
     * Payee name displayed to the payer.
     */
    public function withRecipient(string $recipient): self
    {
        $self = clone $this;
        $self['recipient'] = $recipient;

        return $self;
    }
}

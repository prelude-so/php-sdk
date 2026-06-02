<?php

declare(strict_types=1);

namespace Prelude\Verification\VerificationCheckParams;

use Prelude\Core\Attributes\Required;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Contracts\BaseModel;

/**
 * Required when checking a code issued under the `prelude:psd2` template. The submitted variables must match those provided at issuance; any mismatch invalidates the code (PSD2 SCA RTS Article 5 dynamic linking). Ignored on non-PSD2 verifications.
 *
 * @phpstan-type Psd2Shape = array{
 *   amount: string, currency: string, recipient: string
 * }
 */
final class Psd2 implements BaseModel
{
    /** @use SdkModel<Psd2Shape> */
    use SdkModel;

    /**
     * Decimal amount of the transaction.
     */
    #[Required]
    public string $amount;

    /**
     * ISO 4217 currency code.
     */
    #[Required]
    public string $currency;

    /**
     * Payee name displayed to the payer.
     */
    #[Required]
    public string $recipient;

    /**
     * `new Psd2()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Psd2::with(amount: ..., currency: ..., recipient: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Psd2)->withAmount(...)->withCurrency(...)->withRecipient(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        string $amount,
        string $currency,
        string $recipient
    ): self {
        $self = new self;

        $self['amount'] = $amount;
        $self['currency'] = $currency;
        $self['recipient'] = $recipient;

        return $self;
    }

    /**
     * Decimal amount of the transaction.
     */
    public function withAmount(string $amount): self
    {
        $self = clone $this;
        $self['amount'] = $amount;

        return $self;
    }

    /**
     * ISO 4217 currency code.
     */
    public function withCurrency(string $currency): self
    {
        $self = clone $this;
        $self['currency'] = $currency;

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

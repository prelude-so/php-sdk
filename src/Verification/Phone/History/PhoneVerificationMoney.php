<?php

declare(strict_types=1);

namespace Prelude\Verification\Phone\History;

use Prelude\Core\Attributes\Required;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Contracts\BaseModel;

/**
 * @phpstan-type PhoneVerificationMoneyShape = array{
 *   amount: string, currency: string
 * }
 */
final class PhoneVerificationMoney implements BaseModel
{
    /** @use SdkModel<PhoneVerificationMoneyShape> */
    use SdkModel;

    /**
     * Exact decimal amount. It is never rounded to the currency's minor units, so a sub-cent cost reads as `0.0004` rather than as `0.00`.
     */
    #[Required]
    public string $amount;

    /**
     * ISO 4217 currency code.
     */
    #[Required]
    public string $currency;

    /**
     * `new PhoneVerificationMoney()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PhoneVerificationMoney::with(amount: ..., currency: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PhoneVerificationMoney)->withAmount(...)->withCurrency(...)
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
    public static function with(string $amount, string $currency): self
    {
        $self = new self;

        $self['amount'] = $amount;
        $self['currency'] = $currency;

        return $self;
    }

    /**
     * Exact decimal amount. It is never rounded to the currency's minor units, so a sub-cent cost reads as `0.0004` rather than as `0.00`.
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
}

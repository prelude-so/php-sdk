<?php

declare(strict_types=1);

namespace Prelude\Verification\Phone\History\HistoryGetResponse\Lifecycle\Event;

use Prelude\Core\Attributes\Optional;
use Prelude\Core\Attributes\Required;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Verification\Phone\History\PhoneVerificationMoney;

/**
 * @phpstan-import-type PhoneVerificationMoneyShape from \Prelude\Verification\Phone\History\PhoneVerificationMoney
 *
 * @phpstan-type CreateShape = array{
 *   createdAt: \DateTimeInterface,
 *   cost?: null|PhoneVerificationMoney|PhoneVerificationMoneyShape,
 * }
 */
final class Create implements BaseModel
{
    /** @use SdkModel<CreateShape> */
    use SdkModel;

    #[Required('created_at')]
    public \DateTimeInterface $createdAt;

    #[Optional]
    public ?PhoneVerificationMoney $cost;

    /**
     * `new Create()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Create::with(createdAt: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Create)->withCreatedAt(...)
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
     *
     * @param PhoneVerificationMoney|PhoneVerificationMoneyShape|null $cost
     */
    public static function with(
        \DateTimeInterface $createdAt,
        PhoneVerificationMoney|array|null $cost = null
    ): self {
        $self = new self;

        $self['createdAt'] = $createdAt;

        null !== $cost && $self['cost'] = $cost;

        return $self;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * @param PhoneVerificationMoney|PhoneVerificationMoneyShape $cost
     */
    public function withCost(PhoneVerificationMoney|array $cost): self
    {
        $self = clone $this;
        $self['cost'] = $cost;

        return $self;
    }
}

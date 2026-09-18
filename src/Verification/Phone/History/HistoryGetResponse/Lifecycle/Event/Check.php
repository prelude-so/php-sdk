<?php

declare(strict_types=1);

namespace Prelude\Verification\Phone\History\HistoryGetResponse\Lifecycle\Event;

use Prelude\Core\Attributes\Optional;
use Prelude\Core\Attributes\Required;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Verification\Phone\History\HistoryGetResponse\Lifecycle\Event\Check\Channel;
use Prelude\Verification\Phone\History\HistoryGetResponse\Lifecycle\Event\Check\Psd2Info;
use Prelude\Verification\Phone\History\HistoryGetResponse\Lifecycle\Event\Check\StatusDetail;

/**
 * One code submission for this verification.
 *
 * @phpstan-import-type Psd2InfoShape from \Prelude\Verification\Phone\History\HistoryGetResponse\Lifecycle\Event\Check\Psd2Info
 *
 * @phpstan-type CheckShape = array{
 *   createdAt: \DateTimeInterface,
 *   isValid: bool,
 *   channel?: null|Channel|value-of<Channel>,
 *   psd2Info?: null|Psd2Info|Psd2InfoShape,
 *   statusDetail?: null|StatusDetail|value-of<StatusDetail>,
 *   value?: string|null,
 * }
 */
final class Check implements BaseModel
{
    /** @use SdkModel<CheckShape> */
    use SdkModel;

    #[Required('created_at')]
    public \DateTimeInterface $createdAt;

    #[Required('is_valid')]
    public bool $isValid;

    /** @var value-of<Channel>|null $channel */
    #[Optional(enum: Channel::class)]
    public ?string $channel;

    /**
     * Present on checks against a `prelude:psd2` code.
     */
    #[Optional('psd2_info')]
    public ?Psd2Info $psd2Info;

    /**
     * Why an invalid check failed, when known.
     *
     * @var value-of<StatusDetail>|null $statusDetail
     */
    #[Optional('status_detail', enum: StatusDetail::class)]
    public ?string $statusDetail;

    /**
     * The submitted code. Absent while the verification can still be completed, so that a check in flight cannot be read back through this endpoint, and absent on silent verification checks, which carry no code.
     */
    #[Optional]
    public ?string $value;

    /**
     * `new Check()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Check::with(createdAt: ..., isValid: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Check)->withCreatedAt(...)->withIsValid(...)
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
     * @param Channel|value-of<Channel>|null $channel
     * @param Psd2Info|Psd2InfoShape|null $psd2Info
     * @param StatusDetail|value-of<StatusDetail>|null $statusDetail
     */
    public static function with(
        \DateTimeInterface $createdAt,
        bool $isValid,
        Channel|string|null $channel = null,
        Psd2Info|array|null $psd2Info = null,
        StatusDetail|string|null $statusDetail = null,
        ?string $value = null,
    ): self {
        $self = new self;

        $self['createdAt'] = $createdAt;
        $self['isValid'] = $isValid;

        null !== $channel && $self['channel'] = $channel;
        null !== $psd2Info && $self['psd2Info'] = $psd2Info;
        null !== $statusDetail && $self['statusDetail'] = $statusDetail;
        null !== $value && $self['value'] = $value;

        return $self;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    public function withIsValid(bool $isValid): self
    {
        $self = clone $this;
        $self['isValid'] = $isValid;

        return $self;
    }

    /**
     * @param Channel|value-of<Channel> $channel
     */
    public function withChannel(Channel|string $channel): self
    {
        $self = clone $this;
        $self['channel'] = $channel;

        return $self;
    }

    /**
     * Present on checks against a `prelude:psd2` code.
     *
     * @param Psd2Info|Psd2InfoShape $psd2Info
     */
    public function withPsd2Info(Psd2Info|array $psd2Info): self
    {
        $self = clone $this;
        $self['psd2Info'] = $psd2Info;

        return $self;
    }

    /**
     * Why an invalid check failed, when known.
     *
     * @param StatusDetail|value-of<StatusDetail> $statusDetail
     */
    public function withStatusDetail(StatusDetail|string $statusDetail): self
    {
        $self = clone $this;
        $self['statusDetail'] = $statusDetail;

        return $self;
    }

    /**
     * The submitted code. Absent while the verification can still be completed, so that a check in flight cannot be read back through this endpoint, and absent on silent verification checks, which carry no code.
     */
    public function withValue(string $value): self
    {
        $self = clone $this;
        $self['value'] = $value;

        return $self;
    }
}

<?php

declare(strict_types=1);

namespace Prelude\Notify;

use Prelude\Core\Attributes\Optional;
use Prelude\Core\Attributes\Required;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Notify\NotifySendBatchResponse\Result;

/**
 * @phpstan-import-type ResultShape from \Prelude\Notify\NotifySendBatchResponse\Result
 *
 * @phpstan-type NotifySendBatchResponseShape = array{
 *   errorCount: int,
 *   results: list<ResultShape>,
 *   successCount: int,
 *   totalCount: int,
 *   callbackURL?: string|null,
 *   requestID?: string|null,
 *   templateID?: string|null,
 *   variables?: array<string,string>|null,
 * }
 */
final class NotifySendBatchResponse implements BaseModel
{
    /** @use SdkModel<NotifySendBatchResponseShape> */
    use SdkModel;

    /**
     * Number of failed sends.
     */
    #[Required('error_count')]
    public int $errorCount;

    /**
     * The per-recipient result of the bulk send.
     *
     * @var list<Result> $results
     */
    #[Required(list: Result::class)]
    public array $results;

    /**
     * Number of successful sends.
     */
    #[Required('success_count')]
    public int $successCount;

    /**
     * Total number of recipients.
     */
    #[Required('total_count')]
    public int $totalCount;

    /**
     * The callback URL used for this bulk request, if any.
     */
    #[Optional('callback_url')]
    public ?string $callbackURL;

    /**
     * A string that identifies this specific request.
     */
    #[Optional('request_id')]
    public ?string $requestID;

    /**
     * The template identifier used for this bulk request.
     */
    #[Optional('template_id')]
    public ?string $templateID;

    /**
     * The variables used for this bulk request.
     *
     * @var array<string,string>|null $variables
     */
    #[Optional(map: 'string')]
    public ?array $variables;

    /**
     * `new NotifySendBatchResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * NotifySendBatchResponse::with(
     *   errorCount: ..., results: ..., successCount: ..., totalCount: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new NotifySendBatchResponse)
     *   ->withErrorCount(...)
     *   ->withResults(...)
     *   ->withSuccessCount(...)
     *   ->withTotalCount(...)
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
     * @param list<ResultShape> $results
     * @param array<string,string> $variables
     */
    public static function with(
        int $errorCount,
        array $results,
        int $successCount,
        int $totalCount,
        ?string $callbackURL = null,
        ?string $requestID = null,
        ?string $templateID = null,
        ?array $variables = null,
    ): self {
        $self = new self;

        $self['errorCount'] = $errorCount;
        $self['results'] = $results;
        $self['successCount'] = $successCount;
        $self['totalCount'] = $totalCount;

        null !== $callbackURL && $self['callbackURL'] = $callbackURL;
        null !== $requestID && $self['requestID'] = $requestID;
        null !== $templateID && $self['templateID'] = $templateID;
        null !== $variables && $self['variables'] = $variables;

        return $self;
    }

    /**
     * Number of failed sends.
     */
    public function withErrorCount(int $errorCount): self
    {
        $self = clone $this;
        $self['errorCount'] = $errorCount;

        return $self;
    }

    /**
     * The per-recipient result of the bulk send.
     *
     * @param list<ResultShape> $results
     */
    public function withResults(array $results): self
    {
        $self = clone $this;
        $self['results'] = $results;

        return $self;
    }

    /**
     * Number of successful sends.
     */
    public function withSuccessCount(int $successCount): self
    {
        $self = clone $this;
        $self['successCount'] = $successCount;

        return $self;
    }

    /**
     * Total number of recipients.
     */
    public function withTotalCount(int $totalCount): self
    {
        $self = clone $this;
        $self['totalCount'] = $totalCount;

        return $self;
    }

    /**
     * The callback URL used for this bulk request, if any.
     */
    public function withCallbackURL(string $callbackURL): self
    {
        $self = clone $this;
        $self['callbackURL'] = $callbackURL;

        return $self;
    }

    /**
     * A string that identifies this specific request.
     */
    public function withRequestID(string $requestID): self
    {
        $self = clone $this;
        $self['requestID'] = $requestID;

        return $self;
    }

    /**
     * The template identifier used for this bulk request.
     */
    public function withTemplateID(string $templateID): self
    {
        $self = clone $this;
        $self['templateID'] = $templateID;

        return $self;
    }

    /**
     * The variables used for this bulk request.
     *
     * @param array<string,string> $variables
     */
    public function withVariables(array $variables): self
    {
        $self = clone $this;
        $self['variables'] = $variables;

        return $self;
    }
}

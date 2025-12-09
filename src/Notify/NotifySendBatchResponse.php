<?php

declare(strict_types=1);

namespace Prelude\Notify;

use Prelude\Core\Attributes\Optional;
use Prelude\Core\Attributes\Required;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Notify\NotifySendBatchResponse\Result;
use Prelude\Notify\NotifySendBatchResponse\Result\Error;
use Prelude\Notify\NotifySendBatchResponse\Result\Message;

/**
 * @phpstan-type NotifySendBatchResponseShape = array{
 *   errorCount: int,
 *   results: list<Result>,
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
     * @param list<Result|array{
     *   phoneNumber: string, success: bool, error?: Error|null, message?: Message|null
     * }> $results
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
        $obj = new self;

        $obj['errorCount'] = $errorCount;
        $obj['results'] = $results;
        $obj['successCount'] = $successCount;
        $obj['totalCount'] = $totalCount;

        null !== $callbackURL && $obj['callbackURL'] = $callbackURL;
        null !== $requestID && $obj['requestID'] = $requestID;
        null !== $templateID && $obj['templateID'] = $templateID;
        null !== $variables && $obj['variables'] = $variables;

        return $obj;
    }

    /**
     * Number of failed sends.
     */
    public function withErrorCount(int $errorCount): self
    {
        $obj = clone $this;
        $obj['errorCount'] = $errorCount;

        return $obj;
    }

    /**
     * The per-recipient result of the bulk send.
     *
     * @param list<Result|array{
     *   phoneNumber: string, success: bool, error?: Error|null, message?: Message|null
     * }> $results
     */
    public function withResults(array $results): self
    {
        $obj = clone $this;
        $obj['results'] = $results;

        return $obj;
    }

    /**
     * Number of successful sends.
     */
    public function withSuccessCount(int $successCount): self
    {
        $obj = clone $this;
        $obj['successCount'] = $successCount;

        return $obj;
    }

    /**
     * Total number of recipients.
     */
    public function withTotalCount(int $totalCount): self
    {
        $obj = clone $this;
        $obj['totalCount'] = $totalCount;

        return $obj;
    }

    /**
     * The callback URL used for this bulk request, if any.
     */
    public function withCallbackURL(string $callbackURL): self
    {
        $obj = clone $this;
        $obj['callbackURL'] = $callbackURL;

        return $obj;
    }

    /**
     * A string that identifies this specific request.
     */
    public function withRequestID(string $requestID): self
    {
        $obj = clone $this;
        $obj['requestID'] = $requestID;

        return $obj;
    }

    /**
     * The template identifier used for this bulk request.
     */
    public function withTemplateID(string $templateID): self
    {
        $obj = clone $this;
        $obj['templateID'] = $templateID;

        return $obj;
    }

    /**
     * The variables used for this bulk request.
     *
     * @param array<string,string> $variables
     */
    public function withVariables(array $variables): self
    {
        $obj = clone $this;
        $obj['variables'] = $variables;

        return $obj;
    }
}

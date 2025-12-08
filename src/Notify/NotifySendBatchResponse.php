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
 *   error_count: int,
 *   results: list<Result>,
 *   success_count: int,
 *   total_count: int,
 *   callback_url?: string|null,
 *   request_id?: string|null,
 *   template_id?: string|null,
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
    #[Required]
    public int $error_count;

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
    #[Required]
    public int $success_count;

    /**
     * Total number of recipients.
     */
    #[Required]
    public int $total_count;

    /**
     * The callback URL used for this bulk request, if any.
     */
    #[Optional]
    public ?string $callback_url;

    /**
     * A string that identifies this specific request.
     */
    #[Optional]
    public ?string $request_id;

    /**
     * The template identifier used for this bulk request.
     */
    #[Optional]
    public ?string $template_id;

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
     *   error_count: ..., results: ..., success_count: ..., total_count: ...
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
     *   phone_number: string,
     *   success: bool,
     *   error?: Error|null,
     *   message?: Message|null,
     * }> $results
     * @param array<string,string> $variables
     */
    public static function with(
        int $error_count,
        array $results,
        int $success_count,
        int $total_count,
        ?string $callback_url = null,
        ?string $request_id = null,
        ?string $template_id = null,
        ?array $variables = null,
    ): self {
        $obj = new self;

        $obj['error_count'] = $error_count;
        $obj['results'] = $results;
        $obj['success_count'] = $success_count;
        $obj['total_count'] = $total_count;

        null !== $callback_url && $obj['callback_url'] = $callback_url;
        null !== $request_id && $obj['request_id'] = $request_id;
        null !== $template_id && $obj['template_id'] = $template_id;
        null !== $variables && $obj['variables'] = $variables;

        return $obj;
    }

    /**
     * Number of failed sends.
     */
    public function withErrorCount(int $errorCount): self
    {
        $obj = clone $this;
        $obj['error_count'] = $errorCount;

        return $obj;
    }

    /**
     * The per-recipient result of the bulk send.
     *
     * @param list<Result|array{
     *   phone_number: string,
     *   success: bool,
     *   error?: Error|null,
     *   message?: Message|null,
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
        $obj['success_count'] = $successCount;

        return $obj;
    }

    /**
     * Total number of recipients.
     */
    public function withTotalCount(int $totalCount): self
    {
        $obj = clone $this;
        $obj['total_count'] = $totalCount;

        return $obj;
    }

    /**
     * The callback URL used for this bulk request, if any.
     */
    public function withCallbackURL(string $callbackURL): self
    {
        $obj = clone $this;
        $obj['callback_url'] = $callbackURL;

        return $obj;
    }

    /**
     * A string that identifies this specific request.
     */
    public function withRequestID(string $requestID): self
    {
        $obj = clone $this;
        $obj['request_id'] = $requestID;

        return $obj;
    }

    /**
     * The template identifier used for this bulk request.
     */
    public function withTemplateID(string $templateID): self
    {
        $obj = clone $this;
        $obj['template_id'] = $templateID;

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

<?php

declare(strict_types=1);

namespace Prelude\Verification\Phone\History;

use Prelude\Core\Attributes\Optional;
use Prelude\Core\Attributes\Required;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Verification\Phone\History\HistoryListResponse\Verification;

/**
 * @phpstan-import-type VerificationShape from \Prelude\Verification\Phone\History\HistoryListResponse\Verification
 *
 * @phpstan-type HistoryListResponseShape = array{
 *   verifications: list<Verification|VerificationShape>, nextCursor?: string|null
 * }
 */
final class HistoryListResponse implements BaseModel
{
    /** @use SdkModel<HistoryListResponseShape> */
    use SdkModel;

    /**
     * The page of verifications, most recent first.
     *
     * @var list<Verification> $verifications
     */
    #[Required(list: Verification::class)]
    public array $verifications;

    /**
     * Pagination cursor for the next page of results. Omitted if there are no more pages.
     */
    #[Optional('next_cursor')]
    public ?string $nextCursor;

    /**
     * `new HistoryListResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * HistoryListResponse::with(verifications: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new HistoryListResponse)->withVerifications(...)
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
     * @param list<Verification|VerificationShape> $verifications
     */
    public static function with(
        array $verifications,
        ?string $nextCursor = null
    ): self {
        $self = new self;

        $self['verifications'] = $verifications;

        null !== $nextCursor && $self['nextCursor'] = $nextCursor;

        return $self;
    }

    /**
     * The page of verifications, most recent first.
     *
     * @param list<Verification|VerificationShape> $verifications
     */
    public function withVerifications(array $verifications): self
    {
        $self = clone $this;
        $self['verifications'] = $verifications;

        return $self;
    }

    /**
     * Pagination cursor for the next page of results. Omitted if there are no more pages.
     */
    public function withNextCursor(string $nextCursor): self
    {
        $self = clone $this;
        $self['nextCursor'] = $nextCursor;

        return $self;
    }
}

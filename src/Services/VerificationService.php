<?php

declare(strict_types=1);

namespace Prelude\Services;

use Prelude\Client;
use Prelude\Core\Exceptions\APIException;
use Prelude\Core\Util;
use Prelude\RequestOptions;
use Prelude\ServiceContracts\VerificationContract;
use Prelude\Verification\VerificationCheckResponse;
use Prelude\Verification\VerificationCreateParams\Metadata;
use Prelude\Verification\VerificationCreateParams\Options;
use Prelude\Verification\VerificationCreateParams\Signals;
use Prelude\Verification\VerificationCreateParams\Target;
use Prelude\Verification\VerificationNewResponse;

/**
 * @phpstan-import-type TargetShape from \Prelude\Verification\VerificationCreateParams\Target
 * @phpstan-import-type MetadataShape from \Prelude\Verification\VerificationCreateParams\Metadata
 * @phpstan-import-type OptionsShape from \Prelude\Verification\VerificationCreateParams\Options
 * @phpstan-import-type SignalsShape from \Prelude\Verification\VerificationCreateParams\Signals
 * @phpstan-import-type TargetShape from \Prelude\Verification\VerificationCheckParams\Target as TargetShape1
 * @phpstan-import-type RequestOpts from \Prelude\RequestOptions
 */
final class VerificationService implements VerificationContract
{
    /**
     * @api
     */
    public VerificationRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new VerificationRawService($client);
    }

    /**
     * @api
     *
     * Create a new verification for a specific phone number. If another non-expired verification exists (the request is performed within the verification window), this endpoint will perform a retry instead.
     *
     * @param Target|TargetShape $target The verification target. Either a phone number or an email address. To use the email verification feature contact us to discuss your use case.
     * @param string $dispatchID the identifier of the dispatch that came from the front-end SDK
     * @param Metadata|MetadataShape $metadata The metadata for this verification. This object will be returned with every response or webhook sent that refers to this verification.
     * @param Options|OptionsShape $options Verification options
     * @param Signals|SignalsShape $signals The signals used for anti-fraud. For more details, refer to [Signals](/verify/v2/documentation/prevent-fraud#signals).
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        Target|array $target,
        ?string $dispatchID = null,
        Metadata|array|null $metadata = null,
        Options|array|null $options = null,
        Signals|array|null $signals = null,
        RequestOptions|array|null $requestOptions = null,
    ): VerificationNewResponse {
        $params = Util::removeNulls(
            [
                'target' => $target,
                'dispatchID' => $dispatchID,
                'metadata' => $metadata,
                'options' => $options,
                'signals' => $signals,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Check the validity of a verification code.
     *
     * @param string $code the OTP code to validate
     * @param \Prelude\Verification\VerificationCheckParams\Target|TargetShape1 $target The verification target. Either a phone number or an email address. To use the email verification feature contact us to discuss your use case.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function check(
        string $code,
        \Prelude\Verification\VerificationCheckParams\Target|array $target,
        RequestOptions|array|null $requestOptions = null,
    ): VerificationCheckResponse {
        $params = Util::removeNulls(['code' => $code, 'target' => $target]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->check(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}

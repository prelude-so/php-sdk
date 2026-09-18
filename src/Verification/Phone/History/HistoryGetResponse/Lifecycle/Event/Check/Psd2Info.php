<?php

declare(strict_types=1);

namespace Prelude\Verification\Phone\History\HistoryGetResponse\Lifecycle\Event\Check;

use Prelude\Core\Attributes\Optional;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Verification\Phone\History\PhoneVerificationPsd2Transaction;

/**
 * Present on checks against a `prelude:psd2` code.
 *
 * @phpstan-import-type PhoneVerificationPsd2TransactionShape from \Prelude\Verification\Phone\History\PhoneVerificationPsd2Transaction
 *
 * @phpstan-type Psd2InfoShape = array{
 *   expectedTransaction?: null|PhoneVerificationPsd2Transaction|PhoneVerificationPsd2TransactionShape,
 *   receivedTransaction?: null|PhoneVerificationPsd2Transaction|PhoneVerificationPsd2TransactionShape,
 * }
 */
final class Psd2Info implements BaseModel
{
    /** @use SdkModel<Psd2InfoShape> */
    use SdkModel;

    /**
     * The transaction submitted when the code was issued.
     */
    #[Optional('expected_transaction')]
    public ?PhoneVerificationPsd2Transaction $expectedTransaction;

    /**
     * The transaction submitted with this check. Differs from `expected_transaction` when `status_detail` is `transaction_mismatch`.
     */
    #[Optional('received_transaction')]
    public ?PhoneVerificationPsd2Transaction $receivedTransaction;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param PhoneVerificationPsd2Transaction|PhoneVerificationPsd2TransactionShape|null $expectedTransaction
     * @param PhoneVerificationPsd2Transaction|PhoneVerificationPsd2TransactionShape|null $receivedTransaction
     */
    public static function with(
        PhoneVerificationPsd2Transaction|array|null $expectedTransaction = null,
        PhoneVerificationPsd2Transaction|array|null $receivedTransaction = null,
    ): self {
        $self = new self;

        null !== $expectedTransaction && $self['expectedTransaction'] = $expectedTransaction;
        null !== $receivedTransaction && $self['receivedTransaction'] = $receivedTransaction;

        return $self;
    }

    /**
     * The transaction submitted when the code was issued.
     *
     * @param PhoneVerificationPsd2Transaction|PhoneVerificationPsd2TransactionShape $expectedTransaction
     */
    public function withExpectedTransaction(
        PhoneVerificationPsd2Transaction|array $expectedTransaction
    ): self {
        $self = clone $this;
        $self['expectedTransaction'] = $expectedTransaction;

        return $self;
    }

    /**
     * The transaction submitted with this check. Differs from `expected_transaction` when `status_detail` is `transaction_mismatch`.
     *
     * @param PhoneVerificationPsd2Transaction|PhoneVerificationPsd2TransactionShape $receivedTransaction
     */
    public function withReceivedTransaction(
        PhoneVerificationPsd2Transaction|array $receivedTransaction
    ): self {
        $self = clone $this;
        $self['receivedTransaction'] = $receivedTransaction;

        return $self;
    }
}

<?php

declare(strict_types=1);

namespace Prelude;

use Prelude\Core\BaseClient;
use Prelude\Lookup\LookupService;
use Prelude\Transactional\TransactionalService;
use Prelude\Verification\VerificationService;
use Prelude\Watch\WatchService;

class Client extends BaseClient
{
    public string $apiToken;

    public LookupService $lookup;

    public TransactionalService $transactional;

    public VerificationService $verification;

    public WatchService $watch;

    public function __construct(?string $apiToken = null, ?string $baseUrl = null)
    {
        $this->apiToken = (string) ($apiToken ?? getenv('API_TOKEN'));

        $base = $baseUrl ?? getenv('PRELUDE_BASE_URL') ?: 'https://api.prelude.dev';

        parent::__construct(
            headers: [
                'Content-Type' => 'application/json', 'Accept' => 'application/json',
            ],
            baseUrl: $base,
            options: new RequestOptions,
        );

        $this->lookup = new LookupService($this);
        $this->transactional = new TransactionalService($this);
        $this->verification = new VerificationService($this);
        $this->watch = new WatchService($this);
    }

    /** @return array<string, string> */
    protected function authHeaders(): array
    {
        if (!$this->apiToken) {
            return [];
        }

        return ['Authorization' => "Bearer {$this->apiToken}"];
    }
}

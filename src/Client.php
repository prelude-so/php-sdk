<?php

declare(strict_types=1);

namespace Prelude;

use Http\Discovery\Psr17FactoryDiscovery;
use Http\Discovery\Psr18ClientDiscovery;
use Prelude\Core\BaseClient;
use Prelude\Core\Services\LookupService;
use Prelude\Core\Services\TransactionalService;
use Prelude\Core\Services\VerificationService;
use Prelude\Core\Services\WatchService;

class Client extends BaseClient
{
    public string $apiToken;

    /**
     * @api
     */
    public LookupService $lookup;

    /**
     * @api
     */
    public TransactionalService $transactional;

    /**
     * @api
     */
    public VerificationService $verification;

    /**
     * @api
     */
    public WatchService $watch;

    public function __construct(?string $apiToken = null, ?string $baseUrl = null)
    {
        $this->apiToken = (string) ($apiToken ?? getenv('API_TOKEN'));

        $base = $baseUrl ?? getenv('PRELUDE_BASE_URL') ?: 'https://api.prelude.dev';

        $options = new RequestOptions(
            uriFactory: Psr17FactoryDiscovery::findUriFactory(),
            streamFactory: Psr17FactoryDiscovery::findStreamFactory(),
            requestFactory: Psr17FactoryDiscovery::findRequestFactory(),
            transporter: Psr18ClientDiscovery::find(),
        );

        parent::__construct(
            headers: [
                'Content-Type' => 'application/json', 'Accept' => 'application/json',
            ],
            baseUrl: $base,
            options: $options,
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

<?php

declare(strict_types=1);

namespace Prelude;

use Http\Discovery\Psr17FactoryDiscovery;
use Http\Discovery\Psr18ClientDiscovery;
use Prelude\Core\BaseClient;
use Prelude\Core\Util;
use Prelude\Services\LookupService;
use Prelude\Services\NotifyService;
use Prelude\Services\TransactionalService;
use Prelude\Services\VerificationManagementService;
use Prelude\Services\VerificationService;
use Prelude\Services\WatchService;

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
    public NotifyService $notify;

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
    public VerificationManagementService $verificationManagement;

    /**
     * @api
     */
    public WatchService $watch;

    public function __construct(?string $apiToken = null, ?string $baseUrl = null)
    {
        $this->apiToken = (string) ($apiToken ?? getenv('API_TOKEN'));

        $baseUrl ??= getenv('PRELUDE_BASE_URL') ?: 'https://api.prelude.dev';

        $options = RequestOptions::with(
            uriFactory: Psr17FactoryDiscovery::findUriFactory(),
            streamFactory: Psr17FactoryDiscovery::findStreamFactory(),
            requestFactory: Psr17FactoryDiscovery::findRequestFactory(),
            transporter: Psr18ClientDiscovery::find(),
        );

        parent::__construct(
            headers: [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
                'User-Agent' => sprintf('Prelude/PHP %s', VERSION),
                'X-Stainless-Lang' => 'php',
                'X-Stainless-Package-Version' => '0.0.1',
                'X-Stainless-Arch' => Util::machtype(),
                'X-Stainless-OS' => Util::ostype(),
                'X-Stainless-Runtime' => php_sapi_name(),
                'X-Stainless-Runtime-Version' => phpversion(),
            ],
            baseUrl: $baseUrl,
            options: $options
        );

        $this->lookup = new LookupService($this);
        $this->notify = new NotifyService($this);
        $this->transactional = new TransactionalService($this);
        $this->verification = new VerificationService($this);
        $this->verificationManagement = new VerificationManagementService($this);
        $this->watch = new WatchService($this);
    }

    /** @return array<string,string> */
    protected function authHeaders(): array
    {
        return $this->apiToken ? ['Authorization' => "Bearer {$this->apiToken}"] : [
        ];
    }
}

<?php

declare(strict_types=1);

namespace Prelude;

use Prelude\Core\BaseClient;
use Prelude\Resources\Lookup;
use Prelude\Resources\Transactional;
use Prelude\Resources\Verification;
use Prelude\Resources\Watch;

class Client extends BaseClient
{
    public string $apiToken;

    public Lookup $lookup;

    public Transactional $transactional;

    public Verification $verification;

    public Watch $watch;

    /**
     * @return array<string, string>
     */
    protected function authHeaders(): array
    {
        if (!$this->apiToken) {
            return [];
        }

        return ['Authorization' => "Bearer {$this->apiToken}"];
    }

    public function __construct(?string $apiToken = null, ?string $baseUrl = null)
    {

        $this->apiToken = (string) ($apiToken ?? getenv('API_TOKEN'));

        $base = $baseUrl ?? getenv('PRELUDE_BASE_URL') ?: 'https://api.prelude.dev';

        parent::__construct(
            headers: [
                'Content-Type' => 'application/json', 'Accept' => 'application/json',
            ],
            options: new RequestOptions(),
            baseUrl: $base,
        );

        $this->lookup = new Lookup($this);
        $this->transactional = new Transactional($this);
        $this->verification = new Verification($this);
        $this->watch = new Watch($this);

    }
}

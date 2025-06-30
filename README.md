# Prelude PHP API library

The Prelude PHP library provides convenient access to the Prelude REST API from any PHP 8.1.0+ application.

It is generated with [Stainless](https://www.stainless.com/).

## Documentation

The REST API documentation can be found on [docs.prelude.so](https://docs.prelude.so).

## Installation

To use this package, install via Composer by adding the following to your application's `composer.json`:

```json
{
  "repositories": [
    {
      "type": "vcs",
      "url": "git@github.com:stainless-sdks/prelude-php.git"
    }
  ],
  "require": {
    "prelude/prelude": "dev-main"
  }
}
```

## Usage

```php
<?php

use Prelude\Client;

$client = new Client(apiToken: getenv("API_TOKEN") ?: null);

$verification = $client->verification->create(
  ["target" => ["type" => "phone_number", "value" => "+30123456789"]]
);

var_dump($verification->id);
```

### Handling errors

When the library is unable to connect to the API, or if the API returns a non-success status code (i.e., 4xx or 5xx response), a subclass of `Prelude\Errors\APIError` will be thrown:

```php
<?php

use Prelude\Errors\APIConnectionError;

try {
    $Verification = $client->verification->create(
      ["target" => ["type" => "phone_number", "value" => "+30123456789"]]
    );
} catch (APIConnectionError $e) {
    echo "The server could not be reached", PHP_EOL;
    var_dump($e->getPrevious());
} catch (RateLimitError $_) {
    echo "A 429 status code was received; we should back off a bit.", PHP_EOL;
} catch (APIStatusError $e) {
    echo "Another non-200-range status code was received", PHP_EOL;
    var_dump($e->status);
}
```

Error codes are as follows:

| Cause            | Error Type                 |
| ---------------- | -------------------------- |
| HTTP 400         | `BadRequestError`          |
| HTTP 401         | `AuthenticationError`      |
| HTTP 403         | `PermissionDeniedError`    |
| HTTP 404         | `NotFoundError`            |
| HTTP 409         | `ConflictError`            |
| HTTP 422         | `UnprocessableEntityError` |
| HTTP 429         | `RateLimitError`           |
| HTTP >= 500      | `InternalServerError`      |
| Other HTTP error | `APIStatusError`           |
| Timeout          | `APITimeoutError`          |
| Network error    | `APIConnectionError`       |

### Retries

Certain errors will be automatically retried 2 times by default, with a short exponential backoff.

Connection errors (for example, due to a network connectivity problem), 408 Request Timeout, 409 Conflict, 429 Rate Limit, >=500 Internal errors, and timeouts will all be retried by default.

You can use the `max_retries` option to configure or disable this:

```php
<?php

use Prelude\Client;

// Configure the default for all requests:
$client = new Client(max_retries: 0);

// Or, configure per-request:
$client->verification->create(
  ["target" => ["type" => "phone_number", "value" => "+30123456789"]],
  requestOptions: ["max_retries" => 5],
);
```

### Timeouts

By default, requests will time out after 60 seconds. You can use the timeout option to configure or disable this:

```php
<?php

use Prelude\Client;

// Configure the default for all requests:
$client = new Client(timeout: nil);

// Or, configure per-request:
$client->verification->create(
  ["target" => ["type" => "phone_number", "value" => "+30123456789"]],
  requestOptions: ["timeout" => 5],
);
```

On timeout, `Prelude\Errors\APITimeoutError` is raised.

Note that requests that time out are retried by default.

## Advanced concepts

### Making custom or undocumented requests

#### Undocumented properties

You can send undocumented parameters to any endpoint, and read undocumented response properties, like so:

Note: the `extra_` parameters of the same name overrides the documented parameters.

```php
<?php

$verification = $client->verification->create(
  ["target" => ["type" => "phone_number", "value" => "+30123456789"]],
  requestOptions: [
    "extraQueryParams" => ["my_query_parameter" => "value"],
    "extraBodyParams" => ["my_body_parameter" => "value"],
    "extraHeaders" => ["my-header" => "value"],
  ],
);

var_dump($verification["my_undocumented_property"]);
```

#### Undocumented request params

If you want to explicitly send an extra param, you can do so with the `extra_query`, `extra_body`, and `extra_headers` under the `request_options:` parameter when making a request, as seen in the examples above.

#### Undocumented endpoints

To make requests to undocumented endpoints while retaining the benefit of auth, retries, and so on, you can make requests using `client.request`, like so:

```php
<?php

$response = $client->request(
  method: "post",
  path: '/undocumented/endpoint',
  query: ['dog' => 'woof'],
  headers: ['useful-header' => 'interesting-value'],
  body: ['hello' => 'world']
)
```

## Versioning

This package follows [SemVer](https://semver.org/spec/v2.0.0.html) conventions. As the library is in initial development and has a major version of `0`, APIs may change at any time.

This package considers improvements to the (non-runtime) PHPDoc type definitions to be non-breaking changes.

## Requirements

PHP 8.1.0 or higher.

## Contributing

See [the contributing documentation](https://github.com/stainless-sdks/prelude-php/tree/main/CONTRIBUTING.md).

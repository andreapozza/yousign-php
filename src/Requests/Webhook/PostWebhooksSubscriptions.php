<?php

namespace Andreapozza\YouSign\Requests\Webhook;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Contracts\Body\HasBody;
use Saloon\Traits\Body\HasJsonBody;
use Saloon\Repositories\Body\JsonBodyRepository;

/**
 * post-webhooks-subscriptions
 *
 * Creates a new Webhook subscription in your organization.
 */
class PostWebhooksSubscriptions extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/webhooks";
	}


	public function __construct(array $body = [])
    {
        $this->body = new JsonBodyRepository($body);
	}
}

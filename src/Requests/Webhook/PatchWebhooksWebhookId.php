<?php

namespace Andreapozza\YouSign\Requests\Webhook;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Contracts\Body\HasBody;
use Saloon\Traits\Body\HasJsonBody;
use Saloon\Repositories\Body\JsonBodyRepository;

/**
 * patch-webhooks-webhookId
 *
 * Updates a given Webhook subscription.
 * Any parameters not provided are left unchanged.
 */
class PatchWebhooksWebhookId extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::PATCH;


	public function resolveEndpoint(): string
	{
		return "/webhooks/{$this->webhookId}";
	}


	/**
	 * @param string $webhookId Webhook Id
	 */
	public function __construct(
		protected string $webhookId,
        array $body = []
	) {
        $this->body = new JsonBodyRepository($body);
	}
}

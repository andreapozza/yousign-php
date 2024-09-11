<?php

namespace Andreapozza\YouSign\Resource;

use Andreapozza\YouSign\Requests\Webhook\DeleteWebhooksWebhookId;
use Andreapozza\YouSign\Requests\Webhook\GetWebhooks;
use Andreapozza\YouSign\Requests\Webhook\GetWebhooksWebhookId;
use Andreapozza\YouSign\Requests\Webhook\PatchWebhooksWebhookId;
use Andreapozza\YouSign\Requests\Webhook\PostWebhooksSubscriptions;
use Andreapozza\YouSign\Resource;
use Saloon\Http\Response;

class Webhook extends Resource
{
	public function list(): Response
	{
		return $this->connector->send(new GetWebhooks());
	}


	public function create(array $data): Response
	{
		return $this->connector->send(new PostWebhooksSubscriptions($data));
	}


	/**
	 * @param string $webhookId Webhook Id
	 */
	public function get(string $webhookId): Response
	{
		return $this->connector->send(new GetWebhooksWebhookId($webhookId));
	}


	/**
	 * @param string $webhookId Webhook Id
	 */
	public function delete(string $webhookId): Response
	{
		return $this->connector->send(new DeleteWebhooksWebhookId($webhookId));
	}


	/**
	 * @param string $webhookId Webhook Id
	 */
	public function update(string $webhookId, array $data): Response
	{
		return $this->connector->send(new PatchWebhooksWebhookId($webhookId, $data));
	}
}

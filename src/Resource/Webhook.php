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
	public function getWebhooks(): Response
	{
		return $this->connector->send(new GetWebhooks());
	}


	public function postWebhooksSubscriptions(): Response
	{
		return $this->connector->send(new PostWebhooksSubscriptions());
	}


	/**
	 * @param string $webhookId Webhook Id
	 */
	public function getWebhooksWebhookId(string $webhookId): Response
	{
		return $this->connector->send(new GetWebhooksWebhookId($webhookId));
	}


	/**
	 * @param string $webhookId Webhook Id
	 */
	public function deleteWebhooksWebhookId(string $webhookId): Response
	{
		return $this->connector->send(new DeleteWebhooksWebhookId($webhookId));
	}


	/**
	 * @param string $webhookId Webhook Id
	 */
	public function patchWebhooksWebhookId(string $webhookId): Response
	{
		return $this->connector->send(new PatchWebhooksWebhookId($webhookId));
	}
}

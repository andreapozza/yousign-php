<?php

namespace Andreapozza\YouSign\Requests\Workspace;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Contracts\Body\HasBody;
use Saloon\Traits\Body\HasJsonBody;
use Saloon\Repositories\Body\JsonBodyRepository;

/**
 * post-workspace
 *
 * Creates a new Workspace in the organization.
 */
class PostWorkspace extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/workspaces";
	}


	public function __construct(array $body = [])
    {
        $this->body = new JsonBodyRepository($body);
	}
}

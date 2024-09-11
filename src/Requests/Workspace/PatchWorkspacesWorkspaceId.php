<?php

namespace Andreapozza\YouSign\Requests\Workspace;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Contracts\Body\HasBody;
use Saloon\Traits\Body\HasJsonBody;
use Saloon\Repositories\Body\JsonBodyRepository;

/**
 * patch-workspaces-workspaceId
 *
 * Updates a given Workspace.
 * Any parameters not provided are left unchanged.
 */
class PatchWorkspacesWorkspaceId extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::PATCH;


	public function resolveEndpoint(): string
	{
		return "/workspaces/{$this->workspaceId}";
	}


	/**
	 * @param string $workspaceId Workspace Id
	 */
	public function __construct(
		protected string $workspaceId,
        array $body = []
	) {
        $this->body = new JsonBodyRepository($body);
	}
}

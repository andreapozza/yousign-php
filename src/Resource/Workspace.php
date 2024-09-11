<?php

namespace Andreapozza\YouSign\Resource;

use Andreapozza\YouSign\Requests\Workspace\DeleteWorkspace;
use Andreapozza\YouSign\Requests\Workspace\GetWorkspaces;
use Andreapozza\YouSign\Requests\Workspace\GetWorkspacesDefault;
use Andreapozza\YouSign\Requests\Workspace\GetWorkspacesWorkspaceId;
use Andreapozza\YouSign\Requests\Workspace\MarkWorkspaceAsDefault;
use Andreapozza\YouSign\Requests\Workspace\PatchWorkspacesWorkspaceId;
use Andreapozza\YouSign\Requests\Workspace\PostWorkspace;
use Andreapozza\YouSign\Resource;
use Saloon\Http\Response;

class Workspace extends Resource
{
	/**
	 * @param int $limit The limit of items count to retrieve.
	 */
	public function list(?int $limit): Response
	{
		return $this->connector->send(new GetWorkspaces($limit));
	}


	public function create(array $data): Response
	{
		return $this->connector->send(new PostWorkspace($data));
	}


	public function getDefault(): Response
	{
		return $this->connector->send(new GetWorkspacesDefault());
	}


	public function markAsDefault(string $workspaceId): Response
	{
		return $this->connector->send(new MarkWorkspaceAsDefault([
            'workspace_id' => $workspaceId
        ]));
	}


	/**
	 * @param string $workspaceId Workspace Id
	 */
	public function get(string $workspaceId): Response
	{
		return $this->connector->send(new GetWorkspacesWorkspaceId($workspaceId));
	}


	/**
	 * @param string $workspaceId Workspace Id
	 */
	public function delete(string $workspaceId): Response
	{
		return $this->connector->send(new DeleteWorkspace($workspaceId));
	}


	/**
	 * @param string $workspaceId Workspace Id
	 */
	public function update(string $workspaceId, array $data): Response
	{
		return $this->connector->send(new PatchWorkspacesWorkspaceId($workspaceId, $data));
	}
}

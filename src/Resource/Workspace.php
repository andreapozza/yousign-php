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
	public function getWorkspaces(?int $limit): Response
	{
		return $this->connector->send(new GetWorkspaces($limit));
	}


	public function postWorkspace(): Response
	{
		return $this->connector->send(new PostWorkspace());
	}


	public function getWorkspacesDefault(): Response
	{
		return $this->connector->send(new GetWorkspacesDefault());
	}


	public function markWorkspaceAsDefault(): Response
	{
		return $this->connector->send(new MarkWorkspaceAsDefault());
	}


	/**
	 * @param string $workspaceId Workspace Id
	 */
	public function getWorkspacesWorkspaceId(string $workspaceId): Response
	{
		return $this->connector->send(new GetWorkspacesWorkspaceId($workspaceId));
	}


	/**
	 * @param string $workspaceId Workspace Id
	 */
	public function deleteWorkspace(string $workspaceId): Response
	{
		return $this->connector->send(new DeleteWorkspace($workspaceId));
	}


	/**
	 * @param string $workspaceId Workspace Id
	 */
	public function patchWorkspacesWorkspaceId(string $workspaceId): Response
	{
		return $this->connector->send(new PatchWorkspacesWorkspaceId($workspaceId));
	}
}

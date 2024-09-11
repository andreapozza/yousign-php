<?php

namespace Andreapozza\YouSign\Resource;

use Andreapozza\YouSign\Requests\User\DeleteWorkspaceWorkspaceIdUsersUserId;
use Andreapozza\YouSign\Requests\User\GetUsers;
use Andreapozza\YouSign\Requests\User\PutWorkspacesWorkspaceIdUsers;
use Andreapozza\YouSign\Resource;
use Saloon\Http\Response;

class User extends Resource
{
	/**
	 * @param int $limit The limit of items count to retrieve.
	 */
	public function list(?int $limit): Response
	{
		return $this->connector->send(new GetUsers($limit));
	}


	/**
	 * @param string $workspaceId Workspace Id
	 * @param string $userId User Id
	 */
	public function associateUserToWorkspace(string $workspaceId, string $userId): Response
	{
		return $this->connector->send(new PutWorkspacesWorkspaceIdUsers($workspaceId, $userId));
	}


	/**
	 * @param string $workspaceId Workspace Id
	 * @param string $userId User Id
	 */
	public function removeUserFromWorkspace(string $workspaceId, string $userId): Response
	{
		return $this->connector->send(new DeleteWorkspaceWorkspaceIdUsersUserId($workspaceId, $userId));
	}
}

<?php

namespace Andreapozza\YouSign\Resource;

use Andreapozza\YouSign\Requests\CustomExperience\DeleteCustomExperience;
use Andreapozza\YouSign\Requests\CustomExperience\DeleteCustomExperienceLogo;
use Andreapozza\YouSign\Requests\CustomExperience\GetCustomExperiences;
use Andreapozza\YouSign\Requests\CustomExperience\GetCustomExperiencesCustomExperienceId;
use Andreapozza\YouSign\Requests\CustomExperience\PatchCustomExperienceLogo;
use Andreapozza\YouSign\Requests\CustomExperience\PatchCustomExperiencesCustomExperienceId;
use Andreapozza\YouSign\Requests\CustomExperience\PostCustomExperience;
use Andreapozza\YouSign\Resource;
use Saloon\Http\Response;

class CustomExperience extends Resource
{
	/**
	 * @param int $limit The limit of items count to retrieve.
	 */
	public function list(?int $limit): Response
	{
		return $this->connector->send(new GetCustomExperiences($limit));
	}


	public function create(array $data): Response
	{
		return $this->connector->send(new PostCustomExperience($data));
	}


	/**
	 * @param string $customExperienceId Custom Experience Id
	 */
	public function get(string $customExperienceId): Response
	{
		return $this->connector->send(new GetCustomExperiencesCustomExperienceId($customExperienceId));
	}


	/**
	 * @param string $customExperienceId Custom Experience Id
	 */
	public function delete(string $customExperienceId): Response
	{
		return $this->connector->send(new DeleteCustomExperience($customExperienceId));
	}


	/**
	 * @param string $customExperienceId Custom Experience Id
	 */
	public function update(string $customExperienceId, array $data): Response
	{
		return $this->connector->send(new PatchCustomExperiencesCustomExperienceId($customExperienceId, $data));
	}


	/**
	 * @param string $customExperienceId Custom Experience Id
	 */
	public function updateLogo(string $customExperienceId, array $data): Response
	{
		return $this->connector->send(new PatchCustomExperienceLogo($customExperienceId, $data));
	}


	/**
	 * @param string $customExperienceId Custom Experience Id
	 */
	public function deleteLogo(string $customExperienceId): Response
	{
		return $this->connector->send(new DeleteCustomExperienceLogo($customExperienceId));
	}
}

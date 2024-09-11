<?php

namespace Andreapozza\YouSign\Resource;

use Andreapozza\YouSign\Requests\Template\GetTemplates;
use Andreapozza\YouSign\Resource;
use Saloon\Http\Response;

class Template extends Resource
{
	/**
	 * @param int $limit The limit of items count to retrieve.
	 */
	public function list(?int $limit): Response
	{
		return $this->connector->send(new GetTemplates($limit));
	}
}

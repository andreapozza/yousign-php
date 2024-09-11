<?php

namespace Andreapozza\YouSign\Requests\ElectronicSeal;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Contracts\Body\HasBody;
use Saloon\Traits\Body\HasJsonBody;
use Saloon\Repositories\Body\JsonBodyRepository;

/**
 * post-electronic-seals
 */
class PostElectronicSeals extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/electronic_seals";
	}


	public function __construct(array $body = []) 
    {
        $this->body = new JsonBodyRepository($body);
	}
}

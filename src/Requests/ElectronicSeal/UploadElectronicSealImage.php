<?php

namespace Andreapozza\YouSign\Requests\ElectronicSeal;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Contracts\Body\HasBody;
use Saloon\Traits\Body\HasJsonBody;
use Saloon\Repositories\Body\JsonBodyRepository;

/**
 * upload-electronic_seal-image
 *
 * Upload an Electronic Seal Image to use for creating an Electronic Seal (can be used for several
 * Electronic Seals).
 */
class UploadElectronicSealImage extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/electronic_seal_images";
	}


	public function __construct(array $body = [])
    {
        $this->body = new JsonBodyRepository($body);
	}
}

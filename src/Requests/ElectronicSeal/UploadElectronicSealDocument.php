<?php

namespace Andreapozza\YouSign\Requests\ElectronicSeal;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Contracts\Body\HasBody;
use Saloon\Traits\Body\HasJsonBody;
use Saloon\Repositories\Body\JsonBodyRepository;

/**
 * upload-electronic_seal-document
 *
 * Upload an Electronic Seal Document to use for creating an Electronic Seal (can be used for only one
 * Electronic Seal).
 */
class UploadElectronicSealDocument extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/electronic_seal_documents";
	}


	public function __construct(array $body = [])
    {
        $this->body = new JsonBodyRepository($body);
	}
}

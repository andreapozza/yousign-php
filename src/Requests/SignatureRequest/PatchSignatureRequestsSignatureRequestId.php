<?php

namespace Andreapozza\YouSign\Requests\SignatureRequest;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Contracts\Body\HasBody;
use Saloon\Traits\Body\HasJsonBody;
use Saloon\Repositories\Body\JsonBodyRepository;

/**
 * patch-signature_requests-signatureRequestId
 *
 * Updates a given Signature Request. Any parameters not provided are left unchanged.
 */
class PatchSignatureRequestsSignatureRequestId extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::PATCH;


	public function resolveEndpoint(): string
	{
		return "/signature_requests/{$this->signatureRequestId}";
	}


	/**
	 * @param string $signatureRequestId Signature Request Id
	 */
	public function __construct(
		protected string $signatureRequestId,
        array $body = []
	) {
        $this->body = new JsonBodyRepository($body);
	}
}

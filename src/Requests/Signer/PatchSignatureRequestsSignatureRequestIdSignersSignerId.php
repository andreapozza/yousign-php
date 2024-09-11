<?php

namespace Andreapozza\YouSign\Requests\Signer;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Contracts\Body\HasBody;
use Saloon\Traits\Body\HasJsonBody;
use Saloon\Repositories\Body\JsonBodyRepository;

/**
 * patch-signature_requests-signatureRequestId-signers-signerId
 *
 * Updates a given Signer.
 * Any parameters not provided are left unchanged.
 */
class PatchSignatureRequestsSignatureRequestIdSignersSignerId extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::PATCH;


	public function resolveEndpoint(): string
	{
		return "/signature_requests/{$this->signatureRequestId}/signers/{$this->signerId}";
	}


	/**
	 * @param string $signatureRequestId Signature Request Id
	 * @param string $signerId Signer Id
	 */
	public function __construct(
		protected string $signatureRequestId,
		protected string $signerId,
        array $body = []
	) {
        $this->body = new JsonBodyRepository($body);
	}
}

<?php

namespace Andreapozza\YouSign\Requests\SignatureRequest;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Contracts\Body\HasBody;
use Saloon\Traits\Body\HasJsonBody;
use Saloon\Repositories\Body\JsonBodyRepository;

/**
 * post-signature_requests-signatureRequestId-reactivate
 *
 * Reactivates a Signature Request when it is in `expired` status.
 */
class PostSignatureRequestsSignatureRequestIdReactivate extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/signature_requests/{$this->signatureRequestId}/reactivate";
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

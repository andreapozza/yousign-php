<?php

namespace Andreapozza\YouSign\Requests\SignatureRequest;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Contracts\Body\HasBody;
use Saloon\Traits\Body\HasJsonBody;
use Saloon\Repositories\Body\JsonBodyRepository;

/**
 * post-signature_requests-signatureRequestId-activate
 *
 * Activates a Signature request, so it is not in `draft` status anymore.
 * If the `delivery_mode` is not
 * `null`, activating the Signature Request will trigger the notifications to
 * Approvers/Followers/Signers.
 */
class PostSignatureRequestsSignatureRequestIdActivate extends Request
{

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/signature_requests/{$this->signatureRequestId}/activate";
	}


	/**
	 * @param string $signatureRequestId Signature Request Id
	 */
	public function __construct(
		protected string $signatureRequestId,
	) {
	}
}

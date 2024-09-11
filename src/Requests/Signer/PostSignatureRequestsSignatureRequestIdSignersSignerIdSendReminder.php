<?php

namespace Andreapozza\YouSign\Requests\Signer;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Contracts\Body\HasBody;
use Saloon\Traits\Body\HasJsonBody;
use Saloon\Repositories\Body\JsonBodyRepository;

/**
 * post-signature_requests-signatureRequestId-signers-signerId-send_reminder
 *
 * Sends a reminder to a given signer to complete their Signature Request.
 * Only possible when the
 * Signature Request status is `ongoing` and the Signer status is `notified`.
 */
class PostSignatureRequestsSignatureRequestIdSignersSignerIdSendReminder extends Request
{

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/signature_requests/{$this->signatureRequestId}/signers/{$this->signerId}/send_reminder";
	}


	/**
	 * @param string $signatureRequestId Signature Request Id
	 * @param string $signerId Signer Id
	 */
	public function __construct(
		protected string $signatureRequestId,
		protected string $signerId,
	) {
	}
}

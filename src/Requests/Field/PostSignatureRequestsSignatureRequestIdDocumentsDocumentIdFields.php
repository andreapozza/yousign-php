<?php

namespace Andreapozza\YouSign\Requests\Field;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Contracts\Body\HasBody;
use Saloon\Traits\Body\HasJsonBody;
use Saloon\Repositories\Body\JsonBodyRepository;

/**
 * post-signature_requests-signatureRequestId-documents-documentId-fields
 *
 * Adds a Field to a given Document.
 */
class PostSignatureRequestsSignatureRequestIdDocumentsDocumentIdFields extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/signature_requests/{$this->signatureRequestId}/documents/{$this->documentId}/fields";
	}


	/**
	 * @param string $signatureRequestId Signature Request Id
	 * @param string $documentId Document ID
	 */
	public function __construct(
		protected string $signatureRequestId,
		protected string $documentId,
        array $body = []
	) {
        $this->body = new JsonBodyRepository($body);
	}
}

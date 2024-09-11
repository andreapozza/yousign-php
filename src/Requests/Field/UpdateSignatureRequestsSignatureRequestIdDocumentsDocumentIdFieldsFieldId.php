<?php

namespace Andreapozza\YouSign\Requests\Field;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Contracts\Body\HasBody;
use Saloon\Traits\Body\HasJsonBody;
use Saloon\Repositories\Body\JsonBodyRepository;

/**
 * update-signature_requests-signatureRequestId-documents-documentId-fields-fieldId
 *
 * Updates a given Field. Any parameters not provided are left unchanged.
 */
class UpdateSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsFieldId extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::PATCH;


	public function resolveEndpoint(): string
	{
		return "/signature_requests/{$this->signatureRequestId}/documents/{$this->documentId}/fields/{$this->fieldId}";
	}


	/**
	 * @param string $signatureRequestId Signature Request Id
	 * @param string $documentId Document Id
	 * @param string $fieldId Field Id
	 */
	public function __construct(
		protected string $signatureRequestId,
		protected string $documentId,
		protected string $fieldId,
        array $body = []
	) {
        $this->body = new JsonBodyRepository($body);
	}
}

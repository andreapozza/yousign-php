<?php

namespace Andreapozza\YouSign\Requests\Document;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Data\MultipartValue;
use Saloon\Contracts\Body\HasBody;
use Saloon\Traits\Body\HasMultipartBody;
use Saloon\Repositories\Body\JsonBodyRepository;
use Saloon\Repositories\Body\MultipartBodyRepository;

/**
 * post-signature_requests-signatureRequestId-documents
 *
 * Adds a Document to a given Signature Request.
 */
class PostSignatureRequestsSignatureRequestIdDocumentsUpload extends Request implements HasBody
{
	use HasMultipartBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/signature_requests/{$this->signatureRequestId}/documents";
	}


	/**
	 * @param string $signatureRequestId Signature Request Id
	 */
	public function __construct(
		protected string $signatureRequestId,
		protected string $filePath,
        array $body = []
    ) {
        $this->body = new MultipartBodyRepository([
            new MultipartValue(name: 'contract', value: $this->filePath)
        ]);

        foreach ($body as $key => $value) {
            $this->body->add($key, $value);
        }
    }
}

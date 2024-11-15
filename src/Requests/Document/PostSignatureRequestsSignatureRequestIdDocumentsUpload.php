<?php

namespace Andreapozza\YouSign\Requests\Document;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Data\MultipartValue;
use Saloon\Contracts\Body\HasBody;
use Psr\Http\Message\StreamInterface;
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
     * @param array<string, \Psr\Http\Message\StreamInterface|resource|string> $body
	 */
	public function __construct(
		protected string $signatureRequestId,
		protected string $filePath,
        protected bool $signable_document = false,
        protected bool $parse_anchors = false,
        array $body = []
    ) {
        $this->body = new MultipartBodyRepository($this->defaultBody());

        foreach ($body as $key => $value) {
            $this->body->add($key, $this->parseValue($value));
        }
    }

    protected function defaultBody(): array
    {
        return [
            new MultipartValue(name: 'file', value: $this->filePath),
            new MultipartValue(name: 'nature', value: $this->signable_document ? 'signable_document' : 'attachment'),
            new MultipartValue(name: 'parse_anchors', value: $this->parse_anchors ? 'true' : 'false'),
        ];
    }

    private function parseValue($value)
    {
        if (! $value instanceof StreamInterface && ! is_resource($value) && ! is_string($value) && ! is_numeric($value)) {
            return json_encode($value);
        }

        return $value;
    }
}

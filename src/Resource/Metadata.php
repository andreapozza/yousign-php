<?php

namespace Andreapozza\YouSign\Resource;

use Andreapozza\YouSign\Requests\Metadata\DeleteSignatureRequestsSignatureRequestIdMetadata;
use Andreapozza\YouSign\Requests\Metadata\GetSignatureRequestsSignatureRequestIdMetadata;
use Andreapozza\YouSign\Requests\Metadata\PostSignatureRequestsSignatureRequestIdMetadata;
use Andreapozza\YouSign\Requests\Metadata\PutSignatureRequestsSignatureRequestIdMetadata;
use Andreapozza\YouSign\Resource;
use Saloon\Http\Response;

class Metadata extends Resource
{
	/**
	 * @param string $signatureRequestId Signature Request Id
	 */
	public function get(string $signatureRequestId): Response
	{
		return $this->connector->send(new GetSignatureRequestsSignatureRequestIdMetadata($signatureRequestId));
	}


	/**
	 * @param string $signatureRequestId Signature Request Id
	 */
	public function update(string $signatureRequestId, array $data): Response
	{
		return $this->connector->send(new PutSignatureRequestsSignatureRequestIdMetadata($signatureRequestId, $data));
	}


	/**
	 * @param string $signatureRequestId Signature Request Id
	 */
	public function attach(string $signatureRequestId, array $data): Response
	{
		return $this->connector->send(new PostSignatureRequestsSignatureRequestIdMetadata($signatureRequestId, $data));
	}


	/**
	 * @param string $signatureRequestId Signature Request Id
	 */
	public function delete(string $signatureRequestId): Response
	{
		return $this->connector->send(new DeleteSignatureRequestsSignatureRequestIdMetadata($signatureRequestId));
	}
}

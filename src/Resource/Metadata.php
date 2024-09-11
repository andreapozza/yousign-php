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
	public function getSignatureRequestsSignatureRequestIdMetadata(string $signatureRequestId): Response
	{
		return $this->connector->send(new GetSignatureRequestsSignatureRequestIdMetadata($signatureRequestId));
	}


	/**
	 * @param string $signatureRequestId Signature Request Id
	 */
	public function putSignatureRequestsSignatureRequestIdMetadata(string $signatureRequestId): Response
	{
		return $this->connector->send(new PutSignatureRequestsSignatureRequestIdMetadata($signatureRequestId));
	}


	/**
	 * @param string $signatureRequestId Signature Request Id
	 */
	public function postSignatureRequestsSignatureRequestIdMetadata(string $signatureRequestId): Response
	{
		return $this->connector->send(new PostSignatureRequestsSignatureRequestIdMetadata($signatureRequestId));
	}


	/**
	 * @param string $signatureRequestId Signature Request Id
	 */
	public function deleteSignatureRequestsSignatureRequestIdMetadata(string $signatureRequestId): Response
	{
		return $this->connector->send(new DeleteSignatureRequestsSignatureRequestIdMetadata($signatureRequestId));
	}
}

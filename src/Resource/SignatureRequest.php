<?php

namespace Andreapozza\YouSign\Resource;

use Andreapozza\YouSign\Requests\SignatureRequest\DeleteSignatureRequestsSignatureRequestId;
use Andreapozza\YouSign\Requests\SignatureRequest\GetSignatureRequests;
use Andreapozza\YouSign\Requests\SignatureRequest\GetSignatureRequestsSignatureRequestId;
use Andreapozza\YouSign\Requests\SignatureRequest\PatchSignatureRequestsSignatureRequestId;
use Andreapozza\YouSign\Requests\SignatureRequest\PostSignatureRequests;
use Andreapozza\YouSign\Requests\SignatureRequest\PostSignatureRequestsSignatureRequestIdActivate;
use Andreapozza\YouSign\Requests\SignatureRequest\PostSignatureRequestsSignatureRequestIdCancel;
use Andreapozza\YouSign\Requests\SignatureRequest\PostSignatureRequestsSignatureRequestIdReactivate;
use Andreapozza\YouSign\Resource;
use Saloon\Http\Response;

class SignatureRequest extends Resource
{
	/**
	 * @param string $status Filter by status
	 * @param int $limit The limit of items count to retrieve.
	 * @param string $externalId Filter by external_id
	 * @param array $source Filter by source
	 * @param string $q Search on name
	 */
	public function list(
		?string $status = null,
		?int $limit = null,
		?string $externalId = null,
		?array $source = null,
		?string $q = null,
	): Response
	{
		return $this->connector->send(new GetSignatureRequests($status, $limit, $externalId, $source, $q));
	}


	public function create(array $data): Response
	{
		return $this->connector->send(new PostSignatureRequests($data));
	}


	/**
	 * @param string $signatureRequestId Signature Request Id
	 */
	public function get(string $signatureRequestId): Response
	{
		return $this->connector->send(new GetSignatureRequestsSignatureRequestId($signatureRequestId));
	}


	/**
	 * @param string $signatureRequestId Signature Request Id
	 * @param bool $permanentDelete If true it will permanently delete the Signature Request. It will no longer be retrievable.
	 */
	public function delete(
		string $signatureRequestId,
		?bool $permanentDelete,
	): Response
	{
		return $this->connector->send(new DeleteSignatureRequestsSignatureRequestId($signatureRequestId, $permanentDelete));
	}


	/**
	 * @param string $signatureRequestId Signature Request Id
	 */
	public function update(string $signatureRequestId, array $data): Response
	{
		return $this->connector->send(new PatchSignatureRequestsSignatureRequestId($signatureRequestId, $data));
	}


	/**
	 * @param string $signatureRequestId Signature Request Id
	 */
	public function activate(string $signatureRequestId): Response
	{
		return $this->connector->send(new PostSignatureRequestsSignatureRequestIdActivate($signatureRequestId));
	}


	/**
	 * @param string $signatureRequestId Signature Request Id
	 */
	public function cancel(string $signatureRequestId, array $body): Response
	{
		return $this->connector->send(new PostSignatureRequestsSignatureRequestIdCancel($signatureRequestId, $body));
	}


	/**
	 * @param string $signatureRequestId Signature Request Id
	 */
	public function reactivate(string $signatureRequestId, array $body): Response
	{
		return $this->connector->send(new PostSignatureRequestsSignatureRequestIdReactivate($signatureRequestId, $body));
	}
}

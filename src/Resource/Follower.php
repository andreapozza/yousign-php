<?php

namespace Andreapozza\YouSign\Resource;

use Andreapozza\YouSign\Requests\Follower\GetSignatureRequestsSignatureRequestIdFollowers;
use Andreapozza\YouSign\Requests\Follower\PostSignatureRequestsSignatureRequestIdFollowers;
use Andreapozza\YouSign\Resource;
use Saloon\Http\Response;

class Follower extends Resource
{
	/**
	 * @param string $signatureRequestId Signature Request Id
	 */
	public function list(string $signatureRequestId): Response
	{
		return $this->connector->send(new GetSignatureRequestsSignatureRequestIdFollowers($signatureRequestId));
	}


	/**
	 * @param string $signatureRequestId Signature Request Id
	 */
	public function create(string $signatureRequestId, array $data): Response
	{
		return $this->connector->send(new PostSignatureRequestsSignatureRequestIdFollowers($signatureRequestId, $data));
	}
}

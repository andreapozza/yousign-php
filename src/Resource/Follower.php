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
	public function getSignatureRequestsSignatureRequestIdFollowers(string $signatureRequestId): Response
	{
		return $this->connector->send(new GetSignatureRequestsSignatureRequestIdFollowers($signatureRequestId));
	}


	/**
	 * @param string $signatureRequestId Signature Request Id
	 */
	public function postSignatureRequestsSignatureRequestIdFollowers(string $signatureRequestId): Response
	{
		return $this->connector->send(new PostSignatureRequestsSignatureRequestIdFollowers($signatureRequestId));
	}
}

<?php

namespace Andreapozza\YouSign\Resource;

use Andreapozza\YouSign\Requests\Signer\DeleteSignatureRequestsSignatureRequestIdSignersSignerId;
use Andreapozza\YouSign\Requests\Signer\GetSignatureRequestsSignatureRequestIdSigners;
use Andreapozza\YouSign\Requests\Signer\GetSignersSignersId;
use Andreapozza\YouSign\Requests\Signer\PatchSignatureRequestsSignatureRequestIdSignersSignerId;
use Andreapozza\YouSign\Requests\Signer\PostSignatureRequestsSignatureRequestIdSigners;
use Andreapozza\YouSign\Requests\Signer\PostSignatureRequestsSignatureRequestIdSignersSignerIdSendOtp;
use Andreapozza\YouSign\Requests\Signer\PostSignatureRequestsSignatureRequestIdSignersSignerIdSendReminder;
use Andreapozza\YouSign\Requests\Signer\PostSignatureRequestsSignatureRequestIdSignersSignerIdSign;
use Andreapozza\YouSign\Resource;
use Saloon\Http\Response;

class Signer extends Resource
{
	/**
	 * @param string $signatureRequestId Signature Request Id
	 */
	public function list(string $signatureRequestId): Response
	{
		return $this->connector->send(new GetSignatureRequestsSignatureRequestIdSigners($signatureRequestId));
	}


	/**
	 * @param string $signatureRequestId Signature Request Id
	 */
	public function create(string $signatureRequestId, array $data): Response
	{
		return $this->connector->send(new PostSignatureRequestsSignatureRequestIdSigners($signatureRequestId, $data));
	}


	/**
	 * @param string $signatureRequestId Signature Request Id
	 * @param string $signerId Signer Id
	 */
	public function get(string $signatureRequestId, string $signerId): Response
	{
		return $this->connector->send(new GetSignersSignersId($signatureRequestId, $signerId));
	}


	/**
	 * @param string $signatureRequestId Signature Request Id
	 * @param string $signerId Signer Id
	 */
	public function delete(
		string $signatureRequestId,
		string $signerId,
	): Response
	{
		return $this->connector->send(new DeleteSignatureRequestsSignatureRequestIdSignersSignerId($signatureRequestId, $signerId));
	}


	/**
	 * @param string $signatureRequestId Signature Request Id
	 * @param string $signerId Signer Id
	 */
	public function update(
		string $signatureRequestId,
		string $signerId,
        array $data
	): Response
	{
		return $this->connector->send(new PatchSignatureRequestsSignatureRequestIdSignersSignerId($signatureRequestId, $signerId, $data));
	}


	/**
	 * @param string $signatureRequestId Signature Request Id
	 * @param string $signerId Signer Id
	 */
	public function sendOtp(
		string $signatureRequestId,
		string $signerId,
	): Response
	{
		return $this->connector->send(new PostSignatureRequestsSignatureRequestIdSignersSignerIdSendOtp($signatureRequestId, $signerId));
	}


	/**
	 * @param string $signatureRequestId Signature Request Id
	 * @param string $signerId Signer Id
	 */
	public function sendReminder(
		string $signatureRequestId,
		string $signerId,
	): Response
	{
		return $this->connector->send(new PostSignatureRequestsSignatureRequestIdSignersSignerIdSendReminder($signatureRequestId, $signerId));
	}


	/**
	 * @param string $signatureRequestId Signature Request Id
	 * @param string $signerId Signer Id
	 */
	public function sign(
		string $signatureRequestId,
		string $signerId,
        array $data,
	): Response
	{
		return $this->connector->send(new PostSignatureRequestsSignatureRequestIdSignersSignerIdSign($signatureRequestId, $signerId, $data));
	}
}

<?php

namespace Andreapozza\YouSign\Resource;

use Andreapozza\YouSign\Requests\AuditTrail\GetSignatureRequestsSignatureRequestIdAuditTrailsDownload;
use Andreapozza\YouSign\Requests\AuditTrail\GetSignatureRequestsSignatureRequestIdSignersSignerIdAuditTrails;
use Andreapozza\YouSign\Requests\AuditTrail\GetSignersSignerIdAuditTrailsDownload;
use Andreapozza\YouSign\Resource;
use Saloon\Http\Response;

class AuditTrail extends Resource
{
	/**
	 * @param string $signatureRequestId Signature Request Id
	 * @param bool $merge Download all Audit Trails merged as a single PDF file
	 */
	public function downloadAll(
		string $signatureRequestId,
		?bool $merge,
	): Response
	{
		return $this->connector->send(new GetSignatureRequestsSignatureRequestIdAuditTrailsDownload($signatureRequestId, $merge));
	}


	/**
	 * @param string $signatureRequestId Signature Request Id
	 * @param string $signerId Signer Id
	 */
	public function get(
		string $signatureRequestId,
		string $signerId,
	): Response
	{
		return $this->connector->send(new GetSignatureRequestsSignatureRequestIdSignersSignerIdAuditTrails($signatureRequestId, $signerId));
	}


	/**
	 * @param string $signatureRequestId Signature Request Id
	 * @param string $signerId Signer Id
	 */
	public function download(string $signatureRequestId, string $signerId): Response
	{
		return $this->connector->send(new GetSignersSignerIdAuditTrailsDownload($signatureRequestId, $signerId));
	}
}

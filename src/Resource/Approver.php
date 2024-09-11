<?php

namespace Andreapozza\YouSign\Resource;

use Andreapozza\YouSign\Requests\Approver\DeleteSignatureRequestsSignatureRequestIdApproversApproverId;
use Andreapozza\YouSign\Requests\Approver\GetSignatureRequestsSignatureRequestIdApproversApproverId;
use Andreapozza\YouSign\Requests\Approver\PatchSignatureRequestsSignatureRequestIdApproversApproverId;
use Andreapozza\YouSign\Requests\Approver\PostSignatureRequestsSignatureRequestIdApprovers;
use Andreapozza\YouSign\Requests\Approver\PostSignatureRequestsSignatureRequestIdApproversApproverIdSendReminder;
use Andreapozza\YouSign\Resource;
use Saloon\Http\Response;

class Approver extends Resource
{
	/**
	 * @param string $signatureRequestId Signature Request Id
	 */
	public function create(string $signatureRequestId, array $data): Response
	{
		return $this->connector->send(new PostSignatureRequestsSignatureRequestIdApprovers($signatureRequestId, $data));
	}


	/**
	 * @param string $signatureRequestId Signature Request Id
	 * @param string $approverId Approver Id
	 */
	public function get(
		string $signatureRequestId,
		string $approverId,
	): Response
	{
		return $this->connector->send(new GetSignatureRequestsSignatureRequestIdApproversApproverId($signatureRequestId, $approverId));
	}


	/**
	 * @param string $signatureRequestId Signature Request Id
	 * @param string $approverId Approver Id
	 */
	public function delete(
		string $signatureRequestId,
		string $approverId,
	): Response
	{
		return $this->connector->send(new DeleteSignatureRequestsSignatureRequestIdApproversApproverId($signatureRequestId, $approverId));
	}


	/**
	 * @param string $signatureRequestId Signature Request Id
	 * @param string $approverId Approver Id
	 */
	public function update(
		string $signatureRequestId,
		string $approverId,
        array $data,
	): Response
	{
		return $this->connector->send(new PatchSignatureRequestsSignatureRequestIdApproversApproverId($signatureRequestId, $approverId, $data));
	}


	/**
	 * @param string $signatureRequestId Signature Request Id
	 * @param string $approverId Approver Id
	 */
	public function sendReminder(
		string $signatureRequestId,
		string $approverId,
        array $data,
	): Response
	{
		return $this->connector->send(new PostSignatureRequestsSignatureRequestIdApproversApproverIdSendReminder($signatureRequestId, $approverId, $data));
	}
}

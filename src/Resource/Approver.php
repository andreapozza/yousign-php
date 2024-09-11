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
	public function postSignatureRequestsSignatureRequestIdApprovers(string $signatureRequestId): Response
	{
		return $this->connector->send(new PostSignatureRequestsSignatureRequestIdApprovers($signatureRequestId));
	}


	/**
	 * @param string $signatureRequestId Signature Request Id
	 * @param string $approverId Approver Id
	 */
	public function getSignatureRequestsSignatureRequestIdApproversApproverId(
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
	public function deleteSignatureRequestsSignatureRequestIdApproversApproverId(
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
	public function patchSignatureRequestsSignatureRequestIdApproversApproverId(
		string $signatureRequestId,
		string $approverId,
	): Response
	{
		return $this->connector->send(new PatchSignatureRequestsSignatureRequestIdApproversApproverId($signatureRequestId, $approverId));
	}


	/**
	 * @param string $signatureRequestId Signature Request Id
	 * @param string $approverId Approver Id
	 */
	public function postSignatureRequestsSignatureRequestIdApproversApproverIdSendReminder(
		string $signatureRequestId,
		string $approverId,
	): Response
	{
		return $this->connector->send(new PostSignatureRequestsSignatureRequestIdApproversApproverIdSendReminder($signatureRequestId, $approverId));
	}
}

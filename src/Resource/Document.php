<?php

namespace Andreapozza\YouSign\Resource;

use Andreapozza\YouSign\Requests\Document\DeleteSignatureRequestsSignatureRequestIdDocumentsDocumentId;
use Andreapozza\YouSign\Requests\Document\GetSignatureRequestsSignatureRequestIdDocuments;
use Andreapozza\YouSign\Requests\Document\GetSignatureRequestsSignatureRequestIdDocumentsDocumentId;
use Andreapozza\YouSign\Requests\Document\GetSignatureRequestsSignatureRequestIdDocumentsDocumentsIdDownload;
use Andreapozza\YouSign\Requests\Document\GetSignatureRequestsSignatureRequestIdDocumentsDownload;
use Andreapozza\YouSign\Requests\Document\PatchSignatureRequestsSignatureRequestIdDocumentsDocumentId;
use Andreapozza\YouSign\Requests\Document\PostDocuments;
use Andreapozza\YouSign\Requests\Document\PostSignatureRequestsSignatureRequestIdDocuments;
use Andreapozza\YouSign\Requests\Document\PostSignatureRequestsSignatureRequestIdDocumentsDocumentIdReplace;
use Andreapozza\YouSign\Resource;
use Saloon\Http\Response;

class Document extends Resource
{
	public function postDocuments(): Response
	{
		return $this->connector->send(new PostDocuments());
	}


	/**
	 * @param string $signatureRequestId Signature Request Id
	 * @param string $nature Filter by nature
	 */
	public function getSignatureRequestsSignatureRequestIdDocuments(
		string $signatureRequestId,
		?string $nature,
	): Response
	{
		return $this->connector->send(new GetSignatureRequestsSignatureRequestIdDocuments($signatureRequestId, $nature));
	}


	/**
	 * @param string $signatureRequestId Signature Request Id
	 */
	public function postSignatureRequestsSignatureRequestIdDocuments(string $signatureRequestId): Response
	{
		return $this->connector->send(new PostSignatureRequestsSignatureRequestIdDocuments($signatureRequestId));
	}


	/**
	 * @param string $signatureRequestId Signature Request Id
	 * @param string $version Specify Documents version to download, `completed` is only available when the Signature Request status is `done`.
	 * @param bool $archive Force zip archive download
	 */
	public function getSignatureRequestsSignatureRequestIdDocumentsDownload(
		string $signatureRequestId,
		?string $version,
		?bool $archive,
	): Response
	{
		return $this->connector->send(new GetSignatureRequestsSignatureRequestIdDocumentsDownload($signatureRequestId, $version, $archive));
	}


	/**
	 * @param string $signatureRequestId Signature Request Id
	 * @param string $documentId Document Id
	 */
	public function getSignatureRequestsSignatureRequestIdDocumentsDocumentId(
		string $signatureRequestId,
		string $documentId,
	): Response
	{
		return $this->connector->send(new GetSignatureRequestsSignatureRequestIdDocumentsDocumentId($signatureRequestId, $documentId));
	}


	/**
	 * @param string $signatureRequestId Signature Request Id
	 * @param string $documentId Document Id
	 */
	public function deleteSignatureRequestsSignatureRequestIdDocumentsDocumentId(
		string $signatureRequestId,
		string $documentId,
	): Response
	{
		return $this->connector->send(new DeleteSignatureRequestsSignatureRequestIdDocumentsDocumentId($signatureRequestId, $documentId));
	}


	/**
	 * @param string $signatureRequestId Signature Request Id
	 * @param string $documentId Document Id
	 */
	public function patchSignatureRequestsSignatureRequestIdDocumentsDocumentId(
		string $signatureRequestId,
		string $documentId,
	): Response
	{
		return $this->connector->send(new PatchSignatureRequestsSignatureRequestIdDocumentsDocumentId($signatureRequestId, $documentId));
	}


	/**
	 * @param string $signatureRequestId Signature Request Id
	 * @param string $documentId Document Id
	 */
	public function getSignatureRequestsSignatureRequestIdDocumentsDocumentsIdDownload(
		string $signatureRequestId,
		string $documentId,
	): Response
	{
		return $this->connector->send(new GetSignatureRequestsSignatureRequestIdDocumentsDocumentsIdDownload($signatureRequestId, $documentId));
	}


	/**
	 * @param string $signatureRequestId Signature Request Id
	 * @param string $documentId Document Id
	 */
	public function postSignatureRequestsSignatureRequestIdDocumentsDocumentIdReplace(
		string $signatureRequestId,
		string $documentId,
	): Response
	{
		return $this->connector->send(new PostSignatureRequestsSignatureRequestIdDocumentsDocumentIdReplace($signatureRequestId, $documentId));
	}
}

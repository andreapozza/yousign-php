<?php

namespace Andreapozza\YouSign\Resource;

use Andreapozza\YouSign\Requests\Document\DeleteSignatureRequestsSignatureRequestIdDocumentsDocumentId;
use Andreapozza\YouSign\Requests\Document\GetSignatureRequestsSignatureRequestIdDocuments;
use Andreapozza\YouSign\Requests\Document\GetSignatureRequestsSignatureRequestIdDocumentsDocumentId;
use Andreapozza\YouSign\Requests\Document\GetSignatureRequestsSignatureRequestIdDocumentsDocumentsIdDownload;
use Andreapozza\YouSign\Requests\Document\GetSignatureRequestsSignatureRequestIdDocumentsDownload;
use Andreapozza\YouSign\Requests\Document\PatchSignatureRequestsSignatureRequestIdDocumentsDocumentId;
use Andreapozza\YouSign\Requests\Document\PostSignatureRequestsSignatureRequestIdDocuments;
use Andreapozza\YouSign\Requests\Document\PostSignatureRequestsSignatureRequestIdDocumentsDocumentIdReplace;
use Andreapozza\YouSign\Resource;
use Saloon\Http\Response;

class Document extends Resource
{
	/**
	 * @param string $signatureRequestId Signature Request Id
	 * @param string $nature Filter by nature
	 */
	public function list(
		string $signatureRequestId,
		?string $nature,
	): Response
	{
		return $this->connector->send(new GetSignatureRequestsSignatureRequestIdDocuments($signatureRequestId, $nature));
	}


	/**
	 * @param string $signatureRequestId Signature Request Id
	 */
	public function create(string $signatureRequestId, array $data): Response
	{
		return $this->connector->send(new PostSignatureRequestsSignatureRequestIdDocuments($signatureRequestId, $data));
	}


	/**
	 * @param string $signatureRequestId Signature Request Id
	 * @param string $version Specify Documents version to download, `completed` is only available when the Signature Request status is `done`.
	 * @param bool $archive Force zip archive download
	 */
	public function downloadAll(
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
	public function get(
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
	public function delete(
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
	public function update(
		string $signatureRequestId,
		string $documentId,
        array $data,
	): Response
	{
		return $this->connector->send(new PatchSignatureRequestsSignatureRequestIdDocumentsDocumentId($signatureRequestId, $documentId, $data));
	}


	/**
	 * @param string $signatureRequestId Signature Request Id
	 * @param string $documentId Document Id
	 */
	public function download(
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
	public function replace(
		string $signatureRequestId,
		string $documentId,
        array $data,
	): Response
	{
		return $this->connector->send(new PostSignatureRequestsSignatureRequestIdDocumentsDocumentIdReplace($signatureRequestId, $documentId, $data));
	}
}

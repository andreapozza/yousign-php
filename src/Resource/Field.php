<?php

namespace Andreapozza\YouSign\Resource;

use Andreapozza\YouSign\Requests\Field\DeleteSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsFieldId;
use Andreapozza\YouSign\Requests\Field\GetSignatureRequestsSignatureRequestIdDocumentsDocumentIdFields;
use Andreapozza\YouSign\Requests\Field\PostSignatureRequestsSignatureRequestIdDocumentsDocumentIdFields;
use Andreapozza\YouSign\Requests\Field\UpdateSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsFieldId;
use Andreapozza\YouSign\Resource;
use Saloon\Http\Response;

class Field extends Resource
{
	/**
	 * @param string $signatureRequestId Signature Request Id
	 * @param string $documentId Document ID
	 * @param array $types Filter by Field type.
	 * @param int $limit The limit of items count to retrieve.
	 */
	public function list(
		string $signatureRequestId,
		string $documentId,
		?array $types,
		?int $limit,
	): Response
	{
		return $this->connector->send(new GetSignatureRequestsSignatureRequestIdDocumentsDocumentIdFields($signatureRequestId, $documentId, $types, $limit));
	}


	/**
	 * @param string $signatureRequestId Signature Request Id
	 * @param string $documentId Document ID
	 */
	public function create(
		string $signatureRequestId,
		string $documentId,
        array $data,
	): Response
	{
		return $this->connector->send(new PostSignatureRequestsSignatureRequestIdDocumentsDocumentIdFields($signatureRequestId, $documentId, $data));
	}


	/**
	 * @param string $signatureRequestId Signature Request Id
	 * @param string $documentId Document Id
	 * @param string $fieldId Field Id
	 */
	public function delete(
		string $signatureRequestId,
		string $documentId,
		string $fieldId,
	): Response
	{
		return $this->connector->send(new DeleteSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsFieldId($signatureRequestId, $documentId, $fieldId));
	}


	/**
	 * @param string $signatureRequestId Signature Request Id
	 * @param string $documentId Document Id
	 * @param string $fieldId Field Id
	 */
	public function update(
		string $signatureRequestId,
		string $documentId,
		string $fieldId,
        array $data,
	): Response
	{
		return $this->connector->send(new UpdateSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsFieldId($signatureRequestId, $documentId, $fieldId, $data));
	}
}

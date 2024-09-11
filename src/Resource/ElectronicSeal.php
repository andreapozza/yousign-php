<?php

namespace Andreapozza\YouSign\Resource;

use Andreapozza\YouSign\Requests\ElectronicSeal\DeleteElectronicSealImage;
use Andreapozza\YouSign\Requests\ElectronicSeal\DownloadElectronicSealAuditTrail;
use Andreapozza\YouSign\Requests\ElectronicSeal\DownloadElectronicSealDocument;
use Andreapozza\YouSign\Requests\ElectronicSeal\DownloadElectronicSealImage;
use Andreapozza\YouSign\Requests\ElectronicSeal\GetElectronicSeal;
use Andreapozza\YouSign\Requests\ElectronicSeal\GetElectronicSealAuditTrail;
use Andreapozza\YouSign\Requests\ElectronicSeal\ListElectronicSealImages;
use Andreapozza\YouSign\Requests\ElectronicSeal\PostElectronicSeals;
use Andreapozza\YouSign\Requests\ElectronicSeal\UploadElectronicSealDocument;
use Andreapozza\YouSign\Requests\ElectronicSeal\UploadElectronicSealImage;
use Andreapozza\YouSign\Resource;
use Saloon\Http\Response;

class ElectronicSeal extends Resource
{
	public function createDocument(array $data): Response
	{
		return $this->connector->send(new UploadElectronicSealDocument($data));
	}


	/**
	 * @param string $electronicSealDocumentId
	 */
	public function downloadDocument(string $electronicSealDocumentId): Response
	{
		return $this->connector->send(new DownloadElectronicSealDocument($electronicSealDocumentId));
	}


	/**
	 * @param int $limit The limit of items count to retrieve.
	 */
	public function listImages(?int $limit): Response
	{
		return $this->connector->send(new ListElectronicSealImages($limit));
	}


	public function createImage(array $data): Response
	{
		return $this->connector->send(new UploadElectronicSealImage($data));
	}


	/**
	 * @param string $electronicSealImageId
	 */
	public function deleteImage(string $electronicSealImageId): Response
	{
		return $this->connector->send(new DeleteElectronicSealImage($electronicSealImageId));
	}


	/**
	 * @param string $electronicSealImageId
	 */
	public function downloadImage(string $electronicSealImageId): Response
	{
		return $this->connector->send(new DownloadElectronicSealImage($electronicSealImageId));
	}


	public function create(array $data): Response
	{
		return $this->connector->send(new PostElectronicSeals($data));
	}


	/**
	 * @param string $electronicSealId
	 */
	public function get(string $electronicSealId): Response
	{
		return $this->connector->send(new GetElectronicSeal($electronicSealId));
	}


	/**
	 * @param string $electronicSealId
	 */
	public function getAuditTrail(string $electronicSealId): Response
	{
		return $this->connector->send(new GetElectronicSealAuditTrail($electronicSealId));
	}


	/**
	 * @param string $electronicSealId
	 */
	public function downloadAuditTrail(string $electronicSealId): Response
	{
		return $this->connector->send(new DownloadElectronicSealAuditTrail($electronicSealId));
	}
}

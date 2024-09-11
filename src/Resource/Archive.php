<?php

namespace Andreapozza\YouSign\Resource;

use Andreapozza\YouSign\Requests\Archive\GetArchivesArchivedFileIdDownload;
use Andreapozza\YouSign\Requests\Archive\PostArchives;
use Andreapozza\YouSign\Resource;
use Saloon\Http\Response;

class Archive extends Resource
{
	public function postArchives(array $data): Response
	{
		return $this->connector->send(new PostArchives($data));
	}


	/**
	 * @param string $archivedFileId ArchivedFileId
	 */
	public function getArchivesArchivedFileIdDownload(string $archivedFileId): Response
	{
		return $this->connector->send(new GetArchivesArchivedFileIdDownload($archivedFileId));
	}
}

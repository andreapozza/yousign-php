<?php

namespace Andreapozza\YouSign\Resource;

use Andreapozza\YouSign\Requests\Contact\DeleteContactsContactId;
use Andreapozza\YouSign\Requests\Contact\GetContacts;
use Andreapozza\YouSign\Requests\Contact\GetContactsContactId;
use Andreapozza\YouSign\Requests\Contact\PatchContactsContactId;
use Andreapozza\YouSign\Requests\Contact\PostContact;
use Andreapozza\YouSign\Resource;
use Saloon\Http\Response;

class Contact extends Resource
{
	/**
	 * @param int $limit The limit of items count to retrieve.
	 */
	public function list(?int $limit): Response
	{
		return $this->connector->send(new GetContacts($limit));
	}


	public function create(array $data): Response
	{
		return $this->connector->send(new PostContact($data));
	}


	/**
	 * @param string $contactId Contact Id
	 */
	public function get(string $contactId): Response
	{
		return $this->connector->send(new GetContactsContactId($contactId));
	}


	/**
	 * @param string $contactId Contact Id
	 */
	public function delete(string $contactId): Response
	{
		return $this->connector->send(new DeleteContactsContactId($contactId));
	}


	/**
	 * @param string $contactId Contact Id
	 */
	public function update(string $contactId, array $data): Response
	{
		return $this->connector->send(new PatchContactsContactId($contactId, $data));
	}
}

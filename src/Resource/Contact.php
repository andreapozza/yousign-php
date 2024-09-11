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
	public function getContacts(?int $limit): Response
	{
		return $this->connector->send(new GetContacts($limit));
	}


	public function postContact(): Response
	{
		return $this->connector->send(new PostContact());
	}


	/**
	 * @param string $contactId Contact Id
	 */
	public function getContactsContactId(string $contactId): Response
	{
		return $this->connector->send(new GetContactsContactId($contactId));
	}


	/**
	 * @param string $contactId Contact Id
	 */
	public function deleteContactsContactId(string $contactId): Response
	{
		return $this->connector->send(new DeleteContactsContactId($contactId));
	}


	/**
	 * @param string $contactId Contact Id
	 */
	public function patchContactsContactId(string $contactId): Response
	{
		return $this->connector->send(new PatchContactsContactId($contactId));
	}
}

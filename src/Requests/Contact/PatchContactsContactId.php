<?php

namespace Andreapozza\YouSign\Requests\Contact;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Repositories\Body\JsonBodyRepository;
use Saloon\Traits\Body\HasJsonBody;

/**
 * patch-contacts-contactId
 *
 * Updates a given Contact.
 * Any parameters not provided are left unchanged.
 */
class PatchContactsContactId extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::PATCH;


	public function resolveEndpoint(): string
	{
		return "/contacts/{$this->contactId}";
	}


	/**
	 * @param string $contactId Contact Id
	 */
	public function __construct(
		protected string $contactId,
        array $body = []
	) {
        $this->body = new JsonBodyRepository($body);
	}
}

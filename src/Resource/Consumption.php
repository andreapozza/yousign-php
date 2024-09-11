<?php

namespace Andreapozza\YouSign\Resource;

use Andreapozza\YouSign\Requests\Consumption\GetConsumptions;
use Andreapozza\YouSign\Requests\Consumption\GetConsumptionsExport;
use Andreapozza\YouSign\Resource;
use Saloon\Http\Response;

class Consumption extends Resource
{
	/**
	 * @param string $from The "from" date must not be more than 1 year in the past
	 * @param string $to The "to" date must be more recent than the "from" date
	 * @param string $authenticationKey
	 */
	public function getConsumptions(string $from, string $to, ?string $authenticationKey): Response
	{
		return $this->connector->send(new GetConsumptions($from, $to, $authenticationKey));
	}


	/**
	 * @param string $from The "from" date must not be more than 1 year in the past
	 * @param string $to The "to" date must be more recent than the "from" date
	 * @param string $authenticationKey
	 */
	public function getConsumptionsExport(string $from, string $to, ?string $authenticationKey): Response
	{
		return $this->connector->send(new GetConsumptionsExport($from, $to, $authenticationKey));
	}
}

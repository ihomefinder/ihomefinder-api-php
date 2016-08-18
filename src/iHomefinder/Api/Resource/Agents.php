<?php

namespace iHomefinder\Api\Resource;

use iHomefinder\Api\Resources;

class Agents extends Resources {
	
	protected function getElementClass(): string {
		return Agent::class;
	}
	
}
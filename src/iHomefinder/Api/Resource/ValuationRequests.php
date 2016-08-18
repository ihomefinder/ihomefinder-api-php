<?php

namespace iHomefinder\Api\Resource;

use iHomefinder\Api\Resources;

class ValuationRequests extends Resources {
	
	protected function getElementClass(): string {
		return ValuationRequest::class;
	}
	
}
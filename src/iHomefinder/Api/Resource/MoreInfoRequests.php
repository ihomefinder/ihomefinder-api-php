<?php

namespace iHomefinder\Api\Resource;

use iHomefinder\Api\Resources;

class MoreInfoRequests extends Resources {
	
	protected function getElementClass(): string {
		return MoreInfoRequest::class;
	}
	
}
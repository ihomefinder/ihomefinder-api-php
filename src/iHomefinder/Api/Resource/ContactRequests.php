<?php

namespace iHomefinder\Api\Resource;

use iHomefinder\Api\Resources;

class ContactRequests extends Resources {
	
	protected function getElementClass(): string {
		return ContactRequest::class;
	}
	
}
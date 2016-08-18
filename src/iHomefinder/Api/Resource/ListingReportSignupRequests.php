<?php

namespace iHomefinder\Api\Resource;

use iHomefinder\Api\Resources;

class ListingReportSignupRequests extends Resources {
	
	protected function getElementClass(): string {
		return ListingReportSignupRequest::class;
	}
	
}
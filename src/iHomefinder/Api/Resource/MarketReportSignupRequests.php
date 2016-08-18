<?php

namespace iHomefinder\Api\Resource;

use iHomefinder\Api\Resources;

class MarketReportSignupRequests extends Resources {
	
	protected function getElementClass(): string {
		return MarketReportSignupRequest::class;
	}
	
}
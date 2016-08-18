<?php

namespace iHomefinder\Api\Resource;

use iHomefinder\Api\Resources;

class OpenHomeReportSignupRequests extends Resources {
	
	protected function getElementClass(): string {
		return OpenHomeReportSignupRequest::class;
	}
	
}
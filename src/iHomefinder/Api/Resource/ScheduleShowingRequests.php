<?php

namespace iHomefinder\Api\Resource;

use iHomefinder\Api\Resources;

class ScheduleShowingRequests extends Resources {
	
	protected function getElementClass(): string {
		return ScheduleShowingRequest::class;
	}
	
}
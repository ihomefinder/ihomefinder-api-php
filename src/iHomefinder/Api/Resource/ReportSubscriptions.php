<?php

namespace iHomefinder\Api\Resource;

use iHomefinder\Api\Resources;

class ReportSubscriptions extends Resources {
	
	protected function getElementClass(): string {
		return ReportSubscription::class;
	}
	
}
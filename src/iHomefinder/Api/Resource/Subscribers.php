<?php

namespace iHomefinder\Api\Resource;

use iHomefinder\Api\Resources;

class Subscribers extends Resources {
	
	protected function getElementClass(): string {
		return Subscriber::class;
	}
	
}
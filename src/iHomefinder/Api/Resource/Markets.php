<?php

namespace iHomefinder\Api\Resource;

use iHomefinder\Api\Resources;

class Markets extends Resources {
	
	protected function getElementClass(): string {
		return Market::class;
	}
	
}
<?php

namespace iHomefinder\Api\Resource;

use iHomefinder\Api\Resources;

class Offices extends Resources {
	
	protected function getElementClass(): string {
		return Office::class;
	}
	
}
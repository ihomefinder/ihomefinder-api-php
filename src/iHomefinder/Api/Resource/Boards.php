<?php

namespace iHomefinder\Api\Resource;

use iHomefinder\Api\Resources;

class Boards extends Resources {
	
	protected function getElementClass(): string {
		return Board::class;
	}
	
}
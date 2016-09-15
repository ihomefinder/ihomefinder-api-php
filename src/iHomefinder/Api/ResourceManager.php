<?php

namespace iHomefinder\Api;

class ResourceManager {
	
	private static $instance;
	private $resources = [];
	
	private function __construct() {
		
	}
	
	public static function getInstance(): ResourceManager {
		if(self::$instance === null) {
			self::$instance = new self();
		}
		return self::$instance;
	}
	
	public function addResource(Resource $resource) {
		$this->resources[] = $resource;
	}
	
	public function getPersistedResource(string $href) {
		$result = null;
		if(!empty($href)) {
			foreach($this->resources as $resource) {
				if($resource->getUrl() === $href) {
					$result = $resource;
				}
			}
		}
		return $result;
	}
	
	public function getOrCreateInstance(Authentication $auth, string $class_, $value): Resource {
		$result = null;
		if($value === null) {
			
		} else if(is_subclass_of($class_, Resource::class)) {
			$resource = null;
			$data = $value;
			$href = $this->getHref($data);
			$resource = $this->getPersistedResource($href);
			if($resource === null) {
				$resource = $this->createResource($class_, $auth);
			}
			$resource->hydrate($data);
			$result = $resource;
		} else {
			$result = $value;
		}
		return $result;
	}
	
	private function getHref(\stdClass $data) {
		$href = null;
		$links = $data->links;
		foreach($links as $link) {
			if("self" === $link->rel) {
				$href = $link->href;
				break;
			}
		}
		return $href;
	}
	
	private function createResource(string $class_, Authentication $auth): Resource {
		$result = null;
		$class = new \ReflectionClass($class_);
		$result = $class->newInstanceArgs([
			$auth
		]);
		return $result;
	}
	
}
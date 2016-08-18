<?php

namespace iHomefinder\Api;

class ResourceManager {
	
	private static $instance;
	
	private function __construct() {
		
	}
	
	public static function getInstance(): self {
		if(self::$instance === null) {
			self::$instance = new self();
		}
		return self::$instance;
	}
	
	/**
	 * Numericallay indexed array of all Resources, whether they're transient or persisted
	 */
	private $resources = [];
	
	/**
	 * Href indexed array of all persisted Resources
	 */
	private $persistedResources = [];
	
	public function addResource($resource) {
		$this->resources[] = $resource;
	}
	
	public function setPersistedResource($href, Resource $resource) {
		$this->persistedResources[$href] = $resource;
	}
	
	public function getPersistedResource($href) {
		if($this->hasPersistedResource($href)) {
			return $this->persistedResources[$href];
		}
	}
	
	public function hasPersistedResource($href) {
		return array_key_exists($href, $this->persistedResources);
	}
	
	public function load($className, $object) {
		$resource = null;
// 		var_dump($object);
		foreach($object->links as $link) {
			if($link->rel === "self") {
				$href = $link->href;
				if($this->hasPersistedResource($href)) {
					$resource = $this->getPersistedResource($href);
				} else {
					$class = new \ReflectionClass($className);
					$resource = $class->newInstance();
					$wrapper = ResourceWrapper::getInstance($resource);
					foreach($object as $name => $value) {
						if(!$wrapper->isHydratedField($name)) {
							$wrapper->setHydratedField($name, $value);
						}
					}
					$wrapper->setTransient(false);
					$this->setPersistedResource($href, $resource);
				}
				break;
			}
		}
		return $resource;
	}
	
	public function save() {
		foreach($this->resources as $resource) {
			$wrapper = ResourceWrapper::getInstance($resource);
			if(!$wrapper->isTransient()) {
				$wrapper->save();
			}
		}
	}
	
}
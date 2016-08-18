<?php

namespace iHomefinder\Api;

class ResourceWrapper {
	
	private $resource;
	private $class;
	private $manager;
	private $dirtyFields = [];
	private $hydratedFields = [];
	private $transient = true;
	private static $instances = [];
	
	private function __construct(Resource $resource) {
		$this->resource = $resource;
		$this->class = new \ReflectionClass($resource);
		$this->manager = ResourceManager::getInstance();
		ResourceManager::getInstance()->addResource($resource);
	}
	
	public static function getInstance(Resource $resource): self {
		$key = spl_object_hash($resource);
		if(array_key_exists($key, self::$instances)) {
			$instance = self::$instances[$key];
		} else {
			$instance = new self($resource);
			self::$instances[$key] = $instance;
		}
		return $instance;
	}
	
	public function isTransient() {
		return $this->transient;
	}
	
	public function setTransient($transient) {
		$this->transient = $transient;
	}
	
	public function getHydratedFields() {
		return array_keys($this->hydratedFields);
	}
	
	public function getHydratedField($name) {
		if($this->isHydratedField($name)) {
			return $this->hydratedFields[$name];
		}
	}
	
	public function setHydratedField($name, $value) {
		$this->hydratedFields[$name] = $value;
	}
	
	public function isHydratedField($name) {
		return array_key_exists($name, $this->hydratedFields);
	}
	
	public function getDirtyFields() {
		return array_keys($this->dirtyFields);
	}
	
	public function getDirtyFieldsValues() {
		$results = [];
		$names = $this->getDirtyFields();
		foreach($names as $name) {
			$value = $this->getHydratedField($name);
			$results[$name] = $value;
		}
		return $results;
	}
	
	public function addDirtyField($name) {
		$this->dirtyFields[$name] = true;
	}
	
	public function isDirtyField($name) {
		return array_key_exists($name, $this->dirtyFields);
	}
	
	public function hasDirtyFields() {
		return count($this->dirtyFields) > 0;
	}
	
	public function getAllFieldsValues() {
		$results = [];
		$names = $this->getFieldNames();
		foreach($names as $name) {
			if(!$this->isHydratedField($name)) {
				$this->hydrate();
			}
			$value = $this->getHydratedField($name);
			$results[$name] = $value;
		}
		return $results;
	}
	
	public function getFieldNames(): array {
		return $this->invoke("getFieldNames");
	}
	
	public function getLinks() {
		return $this->getHydratedField("links");
	}
	
	public function getHref() {
		$links = $this->getLinks();
		foreach($links as $link) {
			if($link->rel === "self") {
				return $link->href;
			}
		}
	}
	
	public function save() {
		$this->invoke("save");
	}
	
	public function hydrate($object = null) {
		$this->invoke("hydrate", $object);
	}
	
	private function invoke($name, ...$values) {
		$method = $this->class->getMethod($name);
		$method->setAccessible(true);
		return $method->invokeArgs($this->resource, $values);
	}
	
}
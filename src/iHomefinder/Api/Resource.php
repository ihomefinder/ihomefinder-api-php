<?php

namespace iHomefinder\Api;

use iHomefinder\Api\Request;
use iHomefinder\Api\Exception\ResourceUnavailableException;

abstract class Resource {
	
	protected $wrapper;
	
	protected $requestParameters = [];
	
	protected abstract function getFieldNames(): array;
	
	public function __construct() {
		$this->wrapper = ResourceWrapper::getInstance($this);
	}
	
	protected function getter(string $name, $className = null) {
		if(!$this->wrapper->isTransient() && !$this->wrapper->isHydratedField($name)) {
			$this->wrapper->hydrate();
		}
		$value = $this->wrapper->getHydratedField($name);
		if($className !== null) {
			if($value === null) {
				throw new ResourceUnavailableException();
			}
			if(!is_a($value, $className)) {
				$value = ResourceManager::getInstance()->load($className, $value);
				$this->wrapper->setHydratedField($name, $value);
			}
		}
		return $value;
	}
	
	protected function setter(string $name, $value) {
		if($this->wrapper->getHydratedField($name) !== $value) {
			$this->wrapper->addDirtyField($name);
			$this->wrapper->setHydratedField($name, $value);
		}
	}
	
	protected function hydrate($object = null) {
		$wrapper = $this->wrapper;
		if($object === null) {
			$url = $wrapper->getHref();
			if($url !== null) {
				$object = (new Request())
					->setUrl($url)
					->setMethod("GET")
					->setParameters($this->requestParameters)
					->getResponse()
					->getData()
				;
			}
		}
		if($object !== null) {
			//Hydrate fields with value from object
			foreach($object as $name => $value) {
				if(!$wrapper->isDirtyField($name)) {
					$wrapper->setHydratedField($name, $value);
				}
			}
			//Hydrate remaining known fields with null. This prevents repeated attempts to hydrate object.
			foreach($this->wrapper->getFieldNames() as $name) {
				if(!$wrapper->isDirtyField($name)) {
					if(!property_exists($object, $name)) {
						$wrapper->setHydratedField($name, null);
					}
				}
			}
			$wrapper->setTransient(false);
		}
	}
	
	protected function save() {
		if($this->wrapper->hasDirtyFields()) {
			$url = $this->wrapper->getHref();
			$object = (new Request())
				->setUrl($url)
				->setMethod("PUT")
				->setParameters($this->wrapper->getDirtyFieldsValues())
				->setParameter("fields", join(",", $this->wrapper->getDirtyFields()))
				->getResponse()
				->getData()			;
			$this->wrapper->hydrate($object);
		}
	}
	
	public function __debugInfo() {
		return $this->wrapper->getAllFieldsValues();
	}
	
}
<?php

namespace iHomefinder\Api;

use iHomefinder\Api\Request;
use iHomefinder\Api\Exception\InvalidArgumentException;
use iHomefinder\Api\Exception\ApiException;
use iHomefinder\Api\Query;

abstract class Resources extends Resource implements \ArrayAccess, \Iterator, \Countable {
	
	private $initialized = false;
	private $results = [];
	private $position = 0;
	private $query;
	
	protected abstract function getElementClass(): string;
	
// 	private function initialize() {
// 		if(!$this->initialized) {
// 			$this->initialized = true;
// 			$results = $this->getter("results");
// 			if($results != null) {
// 				foreach($results as $result) {
// 					$this->results[] = ResourceManager::getInstance()->load($this->getElementClass(), $result);
// 				}
// 			}
// 		}
// 	}

	private function initialize() {
		if(!$this->initialized) {
			$this->initialized = true;
			$href = $this->wrapper->getHref();
			$object = (new Request())
				->setUrl($href)
				->setMethod("GET")
				->addQuery($this->query)
				->getResponse()
				->getData()
			;
			$this->wrapper->hydrate($object);
			$results = $this->getter("results");
			if($results != null) {
				foreach($results as $result) {
					$resource = ResourceManager::getInstance()->load($this->getElementClass(), $result);
					$this->results[] = $resource;
				}
			}
		}
	}
	
	public function offsetSet($offset, $resource) {
		if($offset !== null) {
			throw new ApiException("Setting array index is not supported");
		}
		if(!is_a($resource, $this->getElementClass())) {
			throw new InvalidArgumentException($resource, $this->getElementClass());
		}
		$this->create($resource);
		$this->results[] = $resource;
	}
	
	public function offsetExists($offset) {
		$this->initialize();
		return isset($this->results[$offset]);
	}
	
	public function offsetUnset($offset) {
		$this->initialize();
		unset($this->results[$offset]);
	}
	
	public function offsetGet($offset) {
		$this->initialize();
		return isset($this->results[$offset]) ? $this->results[$offset] : null;
	}
	
	public function rewind() {
		$this->position = 0;
	}
	
	public function current() {
		$this->initialize();
		return $this->results[$this->position];
	}
	
	public function key() {
		return $this->position;
	}
	
	public function next() {
		++$this->position;
	}
	
	public function valid() {
		$this->initialize();
		return isset($this->results[$this->position]);
	}
	
	public function count() {
		$this->initialize();
		return $this->getter("total");
	}
	
	protected function getFieldNames(): array {
		return [
			"results",
		];
	}
	
	protected function save() {
		//do nothing
	}
	
	private function create(Resource $resource) {
		$wrapper = ResourceWrapper::getInstance($resource);
		if($wrapper->isTransient()) {
			$url = $this->wrapper->getHref();
			$object = (new Request)
				->setUrl($url)
				->setMethod("POST")
				->setParameters($wrapper->getDirtyFieldsValues())
				->setParameter("fields", join(",", $wrapper->getDirtyFields()))
				->getResponse()
				->getData()
			;
			$wrapper->hydrate($object);
		} else if($wrapper->hasDirtyFields()) {
		
		}
	}
	
	public function query(Query $query): self {
		if($this->initialized) {
			throw new ApiException("Cannot change query after object is accessed");
		}
		$this->query = $query;
		return $this;
	}
	
	public function __debugInfo() {
		$this->initialize();
		return $this->results;
	}
	
}
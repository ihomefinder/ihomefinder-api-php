<?php

namespace iHomefinder\Api;

abstract class Resources extends Resource implements \Iterator, \Countable {
	
	private $cursor = 0;
	
	private $results = [];
	
	private $query;
	
	protected abstract function getElementClass(): string;
	
	public function __construct(Authentication $auth) {
		parent::__construct($auth);
		$this->query = $this->setQueryDefaults(new Query());
	}
	
	public function rewind() {
		$this->cursor = 0;
	}
	
	public function current() {
		$result = null;
		if($this->cursor >= count($this->results) && $this->count() > count($this->results)) {
			$this->query
				->offset($this->cursor)
			;
			$this->init($this->getUrl(), $this->query);
		}
		if($this->cursor < count($this->results)) {
			$result = $this->results[$this->cursor];
		}
		return $result;
	}
	
	public function key(): int {
		return $this->cursor;
	}
	
	public function next() {
		++$this->cursor;
	}
	
	public function valid(): bool {
		$result = false;
		if($this->cursor < $this->count()) {
			$result = true;
		}
		return $result;
	}
	
	public function count(): int {
		$result = $this->getter("total", "int");
		if($result === null) {
			$result = 0;
		}
		return $result;
	}
	
	protected function init($url, Query $query = null) {
		if($query !== null) {
			$this->query = $this->setQueryDefaults($query);
		}
		$data = (new HttpRequest($this->auth))
			->setUrl($url)
			->setMethod("GET")
			->addQuery($this->query)
			->getResponse()
			->getData()
		;
		$this->hydrate($data);
	}
	
	public function hydrate($data) {
		parent::hydrate($data);
		$results = $data->results;
		if($results !== null) {
			foreach($results as $result) {
				$resource = ResourceManager::getInstance()->getOrCreateInstance($this->auth, $this->getElementClass(), $result);
				$this->results[] = $resource;
			}
		}
	}
	
	private function setQueryDefaults(Query $query): Query {
		if($query === null) {
			$query = new Query();
		}
		$query
			->select("*")
			->limit(50)
		;
		return $query;
	}
	
	protected function getFieldNames(): array {
		return [];
	}
	
}
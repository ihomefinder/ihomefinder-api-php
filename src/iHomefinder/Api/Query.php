<?php

namespace iHomefinder\Api;

class Query {
	
	protected $fields = [];
	protected $where = [];
	protected $limit;
	protected $offset;
	
	public function select(...$fields): Query {
		$this->fields = array_merge($this->fields, $fields);
		return $this;
	}
	
	public function where(string $fieldName, $fieldValue): Query {
		$this->where[$fieldName] = $fieldValue;
		return $this;
	}
	
	public function whereAll(array $fields): Query {
		$this->where = array_merge($this->where, $fields);
		return $this;
	}
	
	public function example(Resource $resource): Query {
		$fields = $resource->getHydratedFieldsValues();
		$this->whereAll($fields);
		return $this;
	}
	
	public function limit($limit): Query {
		$this->limit = $limit;
		return $this;
	}
	
	public function offset($offset): Query {
		$this->offset = $offset;
		return $this;
	}
	
	public function loadRequest(HttpRequest $request) {
		$request->setParameters($this->where);
		if($this->offset !== null) {
			$request->setParameter("offset", $this->offset);
		}
		if($this->limit !== null) {
			$request->setParameter("limit", $this->limit);
		}
		if(!empty($this->fields)) {
			$request->setParameter("fields", implode(",", $this->fields));
		}
	}
	
}
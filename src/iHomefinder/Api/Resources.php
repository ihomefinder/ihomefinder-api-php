<?php

namespace iHomefinder\Api;

abstract class Resources extends Resource implements Iterable {
	
	private final Class<E> elementClass = (Class<E>) ((ParameterizedType) getClass()->getGenericSuperclass())->getActualTypeArguments()[0];
	private final ArrayList<E> results = new ArrayList<>();
	
	private Query $query = setQueryDefaults(new Query());
	
	public function Resources(Authentication $auth) {
		super($auth);
	}
	
	protected abstract function getElementClass(): string;

	public function Iterator<E> iterator() {
		Resources self = $this;
		Iterator<E> iterator = new Iterator<E>() {
			
			private int cursor = 0;
			
			public function hasNext() {
				boolean result = false;
				if(cursor < size()) {
					result = true;
				}
				return result;
			}

			public function E next() {
				E result = null;
				if(cursor >= results->size() && size() > results->size()) {
					self->query
						->offset(cursor)
					;
					self->init(getUrl(), self->query);
				}
				if(cursor < results->size()) {
					result = results->get(cursor);
				}
				cursor++;
				return result;
			}
		};
		return iterator;
	}

	public function int size() {
		Integer result = getter("total", Integer::class);
		if(result == null) {
			result = 0;
		}
		return result;
	}
	
	protected init($url, Query $query) {
		$this->query = setQueryDefaults(query);
		init(url);
	}
	
	protected init($url) {
		Map<String, Object> object = (new HttpRequest($auth))
			->setUrl(url)
			->setMethod("GET")
			->addQuery(query)
			->getResponse()
			->getData()
		;
		$this->hydrate(object);
	}
	
	protected hydrate(Map<String, Object> data) {
		super->hydrate(data);
		List<Map<String, Object>> results = (List<Map<String, Object>>) data->get("results");
		if(results != null) {
			for(Map<String, Object> result : results) {
				E resource = ResourceManager::getInstance()->getOrCreateInstance($auth, $this->getElementClass(), $result);
				$this->results->add(resource);
			}
		}
	}
	
	private Query setQueryDefaults(Query $query) {
		if(query == null) {
			query = new Query();
		}
		query
			->select("*")
			->limit(50)
		;
		return query;
	}
	
	protected function getFieldNames(): Fields {
		return null;
	}
	
}
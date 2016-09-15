<?php

namespace iHomefinder\Api;

use \Unirest\Request as UnirestRequest;

class HttpRequest {

	private $url;
	private $method;
	private $auth;
	private $headers = [];
	private $pathParameters = [];
	private $parameters = [];
	
	public function HttpRequest(Authentication $auth) {
		$this->auth = $auth;
		$this->headers["User-Agent"] = Constants::USER_AGENT;
		if(Constants::DEBUG) {
			$this->parameters["debug"] = true;
		}
	}
	
	public function setUrl($url): self {
		$this->url = $url;
		return $this;
	}
	
	public function setMethod($method): self {
		$this->method = $method;
		return $this;
	}
	
	public function setPathParameters(array $pathParameters): self {
		$this->pathParameters = array_merge($this->pathParameters, $pathParameters);
		return $this;
	}
	
	public function setPathParameter(string $name, $value): self {
		$this->pathParameters[$name] = $value;
		return $this;
	}
	
	public function setParameters(array $parameters): self {
		$this->parameters = array_merge($this->parameters, $parameters);
		return $this;
	}
	
	public function setParameter(string $name, $value): self {
		$this->parameters[$name] = $value;
		return $this;
	}
	
	public function addQuery(Query $query): self {
		if($query != null) {
			$query->loadRequest($this);
		}
		return $this;
	}
	
	public function getResponse(): HttpResponse {
		$debug = [
			"url" => $this->url,
			"method" => $this->method,
			"headers" => $this->headers,
			"parameters" => $this->parameters,
			"pathParameters" => $this->pathParameters,
		];

		Log::debug($debug);
		$httpResponse = null;
		try {
			switch($this->method) {
				case "GET":
					$httpResponse = $this->getRequest();
					break;
				case "POST":
					$httpResponse = $this->postRequest();
					break;
				case "PUT":
					$httpResponse = $this->putRequest();
					break;
				case "DELETE":
					$httpResponse = $this->deleteRequest();
					break;
			}
		} catch(UnirestException $e) {
			throw new HttpException($e);
		}
		$status = $httpResponse->getStatus();
		if($status < 200 || $status > 299) {
			Log::debug($httpResponse->getBody());
			throw new HttpException("Status " + status);
		}
		return new HttpResponse($httpResponse);
	}
	
	private function getRequest(): UnirestRequest {
		$request = UnirestRequest
			::get($this->url)
			->basicAuth($auth->getUsername(), $auth->getPassword())
			->headers($this->headers)
		;
		$request = $this->replacePathParameters($request);
		return $request
			->queryString($this->parameters)
			->asString()
		;
	}
	
	private function postRequest(): UnirestRequest {
		$request = UnirestRequest
			::post(url)
			->basicAuth($auth->getUsername(), $auth->getPassword())
			->headers(headers)
		;
		$request = $this->replacePathParameters($request);
		return $request
			->fields($this->parameters)
			->asString()
		;
	}
	
	private function putRequest(): UnirestRequest {
		$request = UnirestRequest
			::put($this->url)
			->basicAuth($auth->getUsername(), $auth->getPassword())
			->headers($this->headers)
		;
		$request = $this->replacePathParameters($request);
		return $request
			->fields($this->parameters)
			->asString()
		;
	}
	
	private function deleteRequest(): UnirestRequest {
		$request = UnirestRequest
			::delete($this->url)
			->basicAuth($auth->getUsername(), $auth->getPassword())
			->headers(headers)
		;
		$request = $this->replacePathParameters($request);
		return $request
			->fields($this->parameters)
			->asString()
		;
	}
	
	private function replacePathParameters(UnirestRequest $request): UnirestRequest {
		foreach($this->pathParameters as $name => $value) {
			$request = $request->routeParam($name, $value);
		}
		return $request;
	}
	
}